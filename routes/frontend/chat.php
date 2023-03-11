<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::post('/new-chat', [ChatController::class, 'getChat'])->name('getChat');
Route::get('/allchats', [ChatController::class, 'index'])->name('getAllChats');
Route::get('/show-chat/{id}', [ChatController::class, 'show'])->name('chats.show');
Route::post('/send-message/{id}', [ChatController::class, 'sendMessage'])->name('chats.send');
