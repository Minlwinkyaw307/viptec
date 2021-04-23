<?php

use App\Http\Controllers\Front\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('api')->name('api.')->group(function() {
    Route::post('service/register-news-letter', [ApiController::class, 'register_news_letter'])
        ->name('register_news_letter');
    Route::post('service/get-free-quote', [ApiController::class, 'get_free_quote'])
        ->name('get_free_quote');
});
