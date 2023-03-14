<?php

namespace App\Http\Controllers\Frontend\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\ValidateEmail;
use App\Http\Requests\ValidateOtpcode;
use App\Http\Requests\ValidationPassword;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Modules\Accounts\Entities\User;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.auth-front.login');
    }

    public function customLogin(LoginValidation $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->to(route('home'));
        }

        return redirect(route('frontend.login'))->with('errors','بيانات الدخول غير صحيحة');
    }

    public function registration()
    {
        return view('frontend.auth-front.register');
    }

    public function customRegistration(RegisterValidation $request)
    {
        $data = $request->all();
        $user = $this->create($data);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $user->addMediaFromRequest('photo')->toMediaCollection('avatars');
        }

        Auth::login($user);
        return redirect()->to(route('home'));
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'dob' => $data['date'],
            'kind' => $data['type'] == 0 ? 'client' : 'provider',
            'communication_type' => $data['communication'],
            'password' => Hash::make($data['password']),
            'bio' => $data['userDetails'],
        ]);
    }



    public function dashboard()
    {
        if (Auth::check()) {
            return view('home');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->to(route('frontend.login'));
    }
}
