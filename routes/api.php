<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Auth\Backend\AuthController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\HeadlineController;
use App\Http\Controllers\Api\BannerAdsController;
use App\Http\Controllers\Api\CategoryListController;
use App\Http\Controllers\Api\HeaderMenuController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\TagsController;
use App\Http\Controllers\Api\AllMenuController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\StyleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(\App\Http\Controllers\Auth\Backend\AuthController::class)->prefix('auth')->group(function () {
    Route::post('signup', 'signup');
    Route::post('login', 'login');
});

Route::group(['middleware' => 'auth:api', 'admin'], function () {
    Route::prefix('admin')->group(function () {

        //User
        Route::resource('/user', \App\Http\Controllers\Api\UserController::class);
        Route::get('/users', [\App\Http\Controllers\Api\UserController::class, 'index']);

        //Main App
        Route::get('/home', [HomeController::class, 'index']);
        Route::resource('/slider', SliderController::class);
        Route::resource('/header-menu', HeaderMenuController::class);
        Route::get('/header-menu-list', [AllMenuController::class, 'index']);
        Route::get('/header-menu-create', [AllMenuController::class, 'store']);
        Route::resource('/banner-ads', BannerAdsController::class);
        Route::resource('/headline', HeadlineController::class);
        Route::resource('/file', FileController::class);
        Route::resource('/media', MediaController::class);

        //Main Web
        Route::resource('/article', ArticleController::class);
        Route::resource('/category', CategoryController::class);
        Route::get('/categories', [CategoryListController::class, 'categories']);
        Route::resource('/tag', TagController::class);
        Route::get('/tags', [TagsController::class, 'tags']);
        Route::resource('/page', PageController::class);

        //Setting
        Route::controller(StyleController::class)->group(function () {
            Route::get('/style', 'index');
            Route::post('style/update/{id}', 'update');
        });
        Route::resource('/setting', SettingController::class);
    });
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('admin/user', [AuthController::class, 'user']);
});

Route::group(['middleware' => ['cors']], function () {
    Route::post('/auth/signup', [AuthController::class, 'signup']);
});

Route::get('/posts', [\App\Http\Controllers\Frontend\FrontendController::class, 'posts']);

Route::post('/contact', [ContactController::class, 'store'])->name('contactStore');
