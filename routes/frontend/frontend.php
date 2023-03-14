<?php

use App\Http\Controllers\Frontend\MyAccount\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('frontend.guest')->group(function () {
    include __DIR__ . '/auth.php';
});
include __DIR__ . '/general.php';
Route::get('frontend/signout',[UserController::class , 'signOut'])->name('frontend.signout');

Route::middleware('frontend.auth')->group(function () {
    include __DIR__ . '/order.php';
    include __DIR__ . '/chat.php';
    include __DIR__ . '/my-account.php';
    include __DIR__ . '/notification.php';
});
