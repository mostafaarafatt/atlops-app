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
        // $request->validate([
        //     'email' => 'required|exists:users',
        //     'password' => 'required',
        // ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //dd(true);
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
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
            $user->addMediaFromRequest('photo')->toMediaCollection('user_image');
        }

        Auth::login($user);
        return view('home');
    }

    public function create(array $data)
    {
        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'date' => $data['date'],
            'type' => $data['type'],
            'communication' => $data['communication'],
            'password' => Hash::make($data['password']),
            'userDetails' => $data['userDetails'],
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
        return Redirect('login');
    }
}
