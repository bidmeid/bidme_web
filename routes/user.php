<?php

use Illuminate\Support\Facades\Route;

Route::middleware('isUser')->group(function () {
    Route::controller(\App\Http\Controllers\User\UserController::class)->prefix('user')->group(function () {
        Route::get('/account', 'index');
    });

    Route::get('user/bidding', [\App\Http\Controllers\User\BiddingController::class, 'index']);
    Route::get('/payment', [\App\Http\Controllers\User\PaymentController::class, 'index']);
});

Route::controller(\App\Http\Controllers\Auth\UserController::class)->group(function () {
    Route::get('/user/auth/signup', 'signup')->name('signup');
    Route::get('/user/auth/login', 'sigin')->name('login');
});
