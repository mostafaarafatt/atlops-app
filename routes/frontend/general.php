<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Frontend\General\BlogController;
use App\Http\Controllers\Frontend\General\HomeController;
use App\Http\Controllers\Frontend\General\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/blogs', [BlogController::class,'index'])->name('blogs');
Route::get('/about-us', [PagesController::class,'aboutUs'])->name('about-us');
Route::get('/terms', [PagesController::class,'termsConditions'])->name('terms');

Route::controller(CategoriesController::class)->group(function () {
    Route::get('categoriess', 'index')->name('categoriess');
    Route::get('orderDetails/{id}', 'orderDetails')->name('orderDetails')->middleware('frontend.auth');
    Route::get('country/{id}', 'gettowns');
});
