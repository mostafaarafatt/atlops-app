<?php

use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get('dashboard', 'dashboard');
    Route::get('login', 'index')->name('login');
    Route::post('custom-login', 'customLogin')->name('login.custom');
    Route::get('registration', 'registration')->name('register-user');
    Route::post('custom-registration', 'customRegistration')->name('register.custom');
    Route::get('signout',  'signOut')->name('signout');
    Route::get('forgetPassword', 'forgetPassword')->name('forgetPassword');
    Route::get('getallcategories', 'getallcategories')->name('getallcategories');
});

Route::any('send-otp', [PasswordResetController::class, 'store'])->name('send-otp');
Route::get('confirm-otp', [PasswordResetController::class, 'index'])->name('confirm-otp');
Route::post('check-code/{id}', [PasswordResetController::class, 'checkValid'])->name('check-code');
Route::get('reset-password', [PasswordResetController::class, 'resetPassword'])->name('reset-password');
Route::post('reset-password/{id}', [PasswordResetController::class, 'setNewPassword'])->name('set-new-password');