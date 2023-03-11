<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('profile');
    Route::get('profileUpdate/{id}', 'profileUpdate')->name('profileUpdate');
    Route::post('saveEditProfile', 'saveEditProfile')->name('saveEditProfile');
    Route::get('changePassword', 'changePassword')->name('changePassword');
    Route::post('changePasswordDone', 'changePasswordDone')->name('changePasswordDone');
});


Route::controller(CategoriesController::class)->group(function () {
    Route::get('categoriess', 'index')->name('categoriess');
    Route::get('orderDetails/{id}', 'orderDetails')->name('orderDetails');
    Route::get('country/{id}', 'gettowns');
});
