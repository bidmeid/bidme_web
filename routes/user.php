<?php

use Illuminate\Support\Facades\Route;

Route::middleware('isUser')->group(function () {
    Route::controller(\App\Http\Controllers\User\UserController::class)->prefix('user')->group(function () {
        Route::get('/account', 'index');
        Route::get('/bidding', [\App\Http\Controllers\User\BiddingController::class, 'index']);
        Route::get('/payment', [\App\Http\Controllers\User\PaymentController::class, 'index']);
        Route::get('/checkout', [\App\Http\Controllers\User\CheckoutController::class, 'index']);
		
        Route::get('/profile', [\App\Http\Controllers\User\UserController::class, 'index']);
		Route::get('/bantuan', [\App\Http\Controllers\User\UserController::class, 'bantuan']);
		
        Route::get('/layanan', [\App\Http\Controllers\User\LayananController::class, 'index']);
        Route::get('/my_order', [\App\Http\Controllers\User\LayananController::class, 'myOrder']);
		Route::get('/layanan/detail', [\App\Http\Controllers\User\LayananController::class, 'detail']);
    });
});

Route::controller(\App\Http\Controllers\Auth\UserController::class)->group(function () {
    Route::get('/user/auth/signup', 'signup')->name('signup');
    Route::get('/user/auth/login', 'sigin')->name('login');
});
