<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::controller(OrderController::class)->group(function () {
    Route::post('createOrder', 'createOrder')->name('createOrder');
    Route::get('peopleOrders', 'peopleOrders')->name('peopleOrders');
    Route::get('getorders', 'getorders')->name('getorders');
    Route::get('orderdetails/{id}', 'orderdetails')->name('orderdetails');
    Route::get('orderNotificationDetails/{id}/{notification_id}', 'orderNotificationDetails')->name('orderNotificationDetails');
    Route::post('orderComment', 'orderComment')->name('orderComment');
    Route::get('allOrders', 'allOrders')->name('allOrders');
    Route::get('companyOrders', 'companyOrders')->name('companyOrders');
    Route::get('endOrder/{id}', 'endOrder')->name('endOrder');
    Route::get('endOrderDone/{id}', 'endOrderDone')->name('endOrderDone');
    Route::get('rePublishOrder/{id}', 'rePublishOrder')->name('rePublishOrder');
    Route::get('addToWishlist/{id}', 'addToWishlist')->name('addToWishlist');
    Route::get('favorites', 'favorites')->name('favorites');
});
