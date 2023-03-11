<?php

namespace App\Http\Controllers;

use App\Events\OtpSent;
use App\Http\Requests\ConfirmCodeRequest;
use App\Http\Requests\NewPasswordRequest;
use App\Http\Requests\ValidateEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function index()
    {
        $user = session('user');
        $remainingTime  = now()->diffInSeconds(session('expires_at'));
        if (!$user) {
            return redirect()->route('forgetPassword');
        }
        return view('forgetPassword.confirm', compact('user', 'remainingTime'));
    }
    public function store(ValidateEmail $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->firstOrFail();
        $code = rand(10000, 99999);
        $otp = $user->otps()->updateOrCreate(
            [
                'target' => $validated['email'],
            ],
            [
                'target' => $validated['email'],
                'code' => $code,
                'expires_at' => now()->addSeconds(123),
            ]
        );
        event(new OtpSent($user, $code));
        if (session()->has('error_otp_mail')) {
            return redirect()->back()->withInput();
        }
        session()->put('user', $user);
        session()->put('expires_at', $otp->expires_at);
        session()->save();
        return redirect()->route('confirm-otp');
    }
    public function checkValid($id, ConfirmCodeRequest $request)
    {

        $user = User::findOrFail($id);
        $otp = $user->otps()->valid($user->email)->first();
        if ($otp?->code == $request?->code) {
            session()->save();
            return redirect()->route('reset-password')->with('id', $id);
        }
        return redirect()->back()->with('otp_error', 'otp expired or not valid, please try again');
    }
    public function resetPassword()
    {
        $id = session('id');
        return view('forgetPassword.newPassword', compact('id'));
    }
    public function setNewPassword($id, NewPasswordRequest $request)
    {
        $password = $request['password'];
        $user = User::findOrFail($id);
        $user->update(['password' => Hash::make($password)]);
        session()->forget(['user', 'expires_at', 'id']);
        return redirect()->route('login');
    }
}
