<?php

use App\Http\Controllers\Frontend\Auth\FacebookController;
use App\Http\Controllers\Frontend\Auth\PasswordResetController;
use App\Http\Controllers\Frontend\MyAccount\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get('user/login', 'index')->name('frontend.login');
    Route::post('custom-login', 'customLogin')->name('login.custom');
    Route::get('registration', 'registration')->name('register-user');
    Route::post('custom-registration', 'customRegistration')->name('register.custom');
    Route::get('signout',  'signOut')->name('signout');
    Route::get('getallcategories', 'getallcategories')->name('getallcategories');

});
Route::get('forgetPassword', [PasswordResetController::class,'forgetPassword'])->name('forgetPassword');
Route::any('send-otp', [PasswordResetController::class, 'store'])->name('send-otp');
Route::get('confirm-otp', [PasswordResetController::class, 'index'])->name('confirm-otp');
Route::post('check-code/{id}', [PasswordResetController::class, 'checkValid'])->name('check-code');
Route::get('reset-password', [PasswordResetController::class, 'resetPassword'])->name('reset-password');
Route::post('reset-password/{id}', [PasswordResetController::class, 'setNewPassword'])->name('set-new-password');
Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});
