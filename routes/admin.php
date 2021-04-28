<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductPackageTypeController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/')->name('admin.')->group(function() {

    Route::get('', [AdminController::class, 'index'])->name('index');

    Route::delete('product-image/{id}', [ProductImageController::class, 'destroy'])->name('product_image.destroy');
    Route::delete('product-package-type/{id}', [ProductPackageTypeController::class, 'destroy'])->name('product-package-type.destroy');

    Route::resource('product', ProductController::class);
});
