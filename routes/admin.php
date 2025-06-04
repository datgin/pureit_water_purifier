<?php

use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\AttributeValueController;
use App\Http\Controllers\Backend\BulkActionController;
use App\Http\Controllers\Backend\ConfigController;
use App\Http\Controllers\Backend\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KeywordController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReviewController;
use App\Models\AboutUs;

Route::name('admin.')->group(function () {
    Route::middleware(\App\Http\Middleware\AdminAuthenticate::class)->group(function () {

        Route::post('handle-bulk-action', [BulkActionController::class, 'handleBulkAction']);

        Route::get('/', [DashboardController::class, 'getRevenueChart'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('save/{id?}', [CategoryController::class, 'save'])->name('save');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
            Route::put('{id}', [CategoryController::class, 'update'])->name('update');
        });

        Route::group([
            'prefix' => 'attributes',
            'controller' => AttributeController::class,
            'as' => 'attributes.'
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('save/{id?}', 'save')->name('save');
            Route::post('/', 'store');
            Route::put('/{id}', 'update');
        });

        Route::prefix('news')->name('news.')->group(function () {
            Route::get('', [NewsController::class, 'index'])->name('index');
            Route::get('create', [NewsController::class, 'create'])->name('create');
            Route::post('/', [NewsController::class, 'store'])->name('store');
            Route::get('{id}', [NewsController::class, 'edit'])->name('edit');
            Route::put('{id}', [NewsController::class, 'update'])->name('update');        
        });

        Route::group([
            'prefix' => 'products',
            'controller' => ProductController::class,
            'as' => 'products.'
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('save/{id?}', 'save')->name('save');
            Route::post('/', 'store');
            Route::put('/{id}', 'update');
            Route::get('search', 'searchProducts')->name('search');
        });

        Route::prefix('configs')->name('config.')->group(function () {
            Route::get('/', [ConfigController::class, 'index'])->name('index');
            Route::post('update', [ConfigController::class, 'store'])->name('update');
            Route::get('seo', [ConfigController::class, 'seo'])->name('seo');
            Route::post('seo', [ConfigController::class, 'storeSeo'])->name('store');
            Route::get('slider', [ConfigController::class, 'slider'])->name('slider');
            Route::post('slider', [ConfigController::class, 'sliderUpdate'])->name('slider.update');
        });

        Route::resource('reviews', ReviewController::class);
        Route::resource('aboutus', AboutUsController::class);
    });

    Route::middleware(\App\Http\Middleware\AdminRedirectIfAuthenticated::class)->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'authenticate']);
    });
});


