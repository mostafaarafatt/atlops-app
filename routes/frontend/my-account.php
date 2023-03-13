<?php

use App\Http\Controllers\Frontend\MyAccount\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('profile');
    Route::get('profileUpdate/{id}', 'profileUpdate')->name('profileUpdate');
    Route::post('saveEditProfile', 'saveEditProfile')->name('saveEditProfile');
    Route::get('changePassword', 'changePassword')->name('changePassword');
    Route::post('changePasswordDone', 'changePasswordDone')->name('changePasswordDone');
});

