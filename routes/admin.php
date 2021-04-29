<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\PackageTypeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductPackageTypeController;
use App\Http\Controllers\Admin\SiteConfigController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CorporateController;
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
    Route::resource('gallery', GalleryController::class)->except(['show']);
    Route::resource('slider', SliderController::class)->except(['show']);
    Route::resource('contact-message', ContactMessageController::class)->except(['create', 'store', 'edit', 'update']);

    Route::get('language/{lang}', [\App\Http\Controllers\Admin\LanguageController::class, 'change_language'])->name('language.change');

    Route::prefix('configs/')->name('config.')->group(function () {
        Route::get('home', [HomePageController::class, 'edit'])->name('home.edit');
        Route::put('home', [HomePageController::class, 'update'])->name('home.update');

        Route::get('corporate', [CorporateController::class, 'edit'])->name('corporate.edit');
        Route::put('corporate', [CorporateController::class, 'update'])->name('corporate.update');

        Route::get('setting', [SiteConfigController::class, 'edit'])->name('setting.edit');
        Route::put('setting', [SiteConfigController::class, 'update'])->name('setting.update');
    });
});
