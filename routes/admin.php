<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BannerAdsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HeadlineController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeaderMenuController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StylingController;
use App\Http\Controllers\Admin\UploadFileController;
use App\Http\Controllers\Admin\UserController;

//Main App
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('/user', UserController::class);
    Route::get('user/show/{id}', [UserController::class, 'show']);
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/header-menu', HeaderMenuController::class);
    Route::resource('/banner-ads', BannerAdsController::class);
    Route::get('/headline', [HeadlineController::class, 'index']);
    Route::resource('/file', UploadFileController::class);
    Route::get('/media', [MediaController::class, 'index']);
});

//Main Web
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('/article', ArticleController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/page', PagesController::class);
    Route::get('/styling', [StylingController::class, 'index']);
    Route::get('/settings', [SettigController::class, 'index']);

    //Settings
    Route::resource('styling', StylingController::class);
    Route::resource('setting', SettingController::class);
});

//Login Admin
Route::get('/root', [\App\Http\Controllers\Auth\Backend\AuthController::class, 'index']);
Route::get('/admin', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('auth');
