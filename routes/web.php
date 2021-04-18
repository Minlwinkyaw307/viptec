<?php

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

    Route::name('blog.')->group(function() {
        Route::multilingual('/blog', [BlogController::class, 'index'])->name('index');
    });

    Route::name('product.')->group(function() {
        Route::multilingual('/product', [ProductController::class, 'index'])->name('index');
    });
});

