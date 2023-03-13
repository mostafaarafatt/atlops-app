<?php

use Illuminate\Support\Facades\Route;


include __DIR__ . '/auth.php';
include __DIR__ . '/general.php';

Route::middleware('frontend.auth')->group(function () {
    include __DIR__ . '/order.php';
    include __DIR__ . '/chat.php';
    include __DIR__ . '/my-account.php';
    include __DIR__ . '/notification.php';
});
