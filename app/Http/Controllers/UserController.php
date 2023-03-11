<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\ValidateEmail;
use App\Http\Requests\ValidateOtpcode;
use App\Http\Requests\ValidationPassword;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        return view('auth.login', compact('user'));
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
        return view('auth.registration');
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


    public function forgetPassword()
    {
        return view('forgetPassword.forgetPassword');
    }

    public function getOtpCode(ValidateEmail $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $request->email)->first();
        $otpCode = rand(1000, 9999);
        $user->update(['otpCode' => $otpCode]);
        return view('forgetPassword.confirm', compact('user'));
        // return redirect()->route('comfirmation')->with(['user' => $user->id]);
    }

    public function setNewPassword(ValidateOtpcode $request, $id)
    {
        // return $id;
        $validated = $request->validated();
        if ($request->otpCode === $request->otpCode_DB) {
            return view('forgetPassword.newPassword', compact('id'));
        } else {
            return back();
        }
    }

    public function setPasswordDone(ValidationPassword $request)
    {
        $validated = $request->validated();
        $user = User::where('id', $request->user_id);
        // dd($user);
        if ($request->password === $request->confirm_password) {
            $user->update(['password' => Hash::make($request->password)]);
            return redirect()->route('login');
        } else {
            return back();
        }
        // return $request;
    }





    public function getallcategories()
    {
        //dd(true);
        $categories = Category::all();
        //dd($categories);
        return view('categ.showCategories', compact('categories'));
    }
}
