<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Accounts\Entities\User;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user['id'])->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->to(route('home'));
            } else {
                $newUser = User::updateOrCreate(
                    ['email' => $user['email']],
                    [
                        'name' => $user['name'],
                        'facebook_id' => $user['id'],
                        'kind' => 'client'
                    ]
                );
                Auth::login($newUser);
                return redirect()->to(route('home'));
            }
        } catch (\Throwable $th) {
            session()->flash('error_facebook', 'حدث خطأ ما ، من فضلك حاول مرة أخرى');
            Log::error($th->getMessage());
            return redirect()->to(route('frontend.login'));
        }
    }
}
