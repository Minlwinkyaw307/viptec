<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\PackageTypeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductPackageTypeController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/')->name('admin.')->group(function() {

    Route::get('', [AdminController::class, 'index'])->name('index');

    Route::delete('product-image/{id}', [ProductImageController::class, 'destroy'])->name('product_image.destroy');
    Route::delete('product-package-type/{id}', [ProductPackageTypeController::class, 'destroy'])->name('product-package-type.destroy');

    Route::resource('product', ProductController::class)->except(['update', 'show']);
    Route::post('product/{product}', [ProductController::class, 'update'])->name('product.update');

    Route::resource('category', CategoryController::class)->except(['show']);
    Route::resource('feature', FeatureController::class)->except(['show']);
    Route::resource('package-type', PackageTypeController::class)->except(['show']);
    Route::resource('faq', FAQController::class)->except(['show']);
    Route::resource('blog', BlogController::class)->except(['show']);
    Route::resource('certificate', CertificateController::class)->except(['show']);
});
