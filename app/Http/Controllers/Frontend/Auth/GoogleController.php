<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Modules\Accounts\Entities\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->to(route('home'));
            } else {
                $newUser = User::updateOrCreate(
                    ['email' => $user['email']],
                    [
                        'name' => $user['name'],
                        'google_id' => $user['id'],
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
