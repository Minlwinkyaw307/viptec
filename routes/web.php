<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('front.')->group(function() {
    Route::multilingual('/', [HomeController::class, 'index'])->name('index');
    Route::multilingual('/corporate', [HomeController::class, 'corporate'])->name('corporate');
    Route::multilingual('/certificates', [HomeController::class, 'certificates'])->name('certificates');
    Route::multilingual('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::multilingual('/contact', [HomeController::class, 'post_contact'])->name('post_contact')->method('post');

    Route::name('blog.')->group(function() {
        Route::multilingual('/blog', [BlogController::class, 'index'])->name('index');
        Route::multilingual('/blog/{slug}', [BlogController::class, 'detail'])->name('detail');
    });

    Route::name('product.')->group(function() {
        Route::multilingual('/product', [ProductController::class, 'index'])->name('index');
        Route::multilingual('/product/{slug}', [ProductController::class, 'detail'])->name('detail');
    });

    Route::multilingual('login', [AuthController::class, 'login'])->name('login');
    Route::multilingual('login', [AuthController::class, 'post_login'])->method('post')->name('post_login');
    Route::multilingual('logout', [AuthController::class, 'logout'])->method('post')->name('logout');

    Route::get('/auth/redirect', [AuthController::class, 'redirectToProvider'])->name('auth.redirect');
    Route::get('/auth/callback', [AuthController::class, 'handleProviderCallback'])->name('auth.callback');

});

