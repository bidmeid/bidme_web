<?php

use Illuminate\Support\Facades\Route;


Route::get('pushSession', [\App\Http\Controllers\FrontEnd\SessPush::class, 'index']);
Route::post('payments/midtrans-notification', [MidtransController::class, 'receive']);
Route::post('payments/midtrans-success', [MidtransController::class, 'success']);

Route::controller(\App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/gabung-mitra', 'mitra')->name('mitra');
    Route::get('/posts', 'posts')->name('posts');
    Route::get('/post/{article:slug}', 'post')->name('post');
    Route::get('contact', 'contact')->name('contact');
    Route::get('order', 'orderStep1')->name('order');
    Route::get('/order/next-step2', 'orderStep2')->name('next-order-step2');
    Route::get('/order/next-step3', 'orderStep3')->name('order-step-3');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

Route::get('/auth/signout', function () {
    setcookie("access_tokenku", null);
    return redirect(url('/root'));
});

Route::get('/set_cookie', function () {
    $token = request('token');
    setcookie("access_tokenku", $token);
    return redirect('/user/account');
});

Route::controller(\App\Http\Controllers\Frontend\NotifikasiController::class)->group(function () {
    Route::get('/user/notifikasi/pembayaran-gagal', 'pembayaranGagal');
    Route::get('/user/notifikasi/pembayaran-sukses', 'pembayaranSukses');
});
