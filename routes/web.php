<?php

use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ConfigController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KeywordController;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin.')->group(function () {

        Route::middleware(\App\Http\Middleware\AdminAuthenticate::class)->group(function () {
                Route::get('/', [DashboardController::class, 'getRevenueChart'])->name('dashboard');
                Route::get('logout', [AuthController::class, 'logout'])->name('logout');

                Route::prefix('category')->name('category.')->group(function () {
                        Route::get('/', [CategoryController::class, 'index'])->name('index');
                        Route::get('trash', [CategoryController::class, 'trash'])->name('trash');
                        Route::post('store', [CategoryController::class, 'store'])->name('store');
                        Route::put('{id}', [CategoryController::class, 'update'])->name('update');
                        Route::delete('{id}/soft-delete', [CategoryController::class, 'softDelete'])->name('softDelete');
                        Route::delete('{id}/delete', [CategoryController::class, 'delete'])->name('delete');
                        Route::put('{id}/restore', [CategoryController::class, 'restore'])->name('restore');
                });

                Route::prefix('keywords')->name('keywords.')->group(function () {
                        Route::get('/', [KeywordController::class, 'index'])->name('index');
                        Route::get('trash', [KeywordController::class, 'trash'])->name('trash');
                        Route::post('store', [KeywordController::class, 'store'])->name('store');
                        Route::put('{id}', [KeywordController::class, 'update'])->name('update');
                        Route::delete('{id}/soft-delete', [KeywordController::class, 'softDelete'])->name('softDelete');
                        Route::delete('{id}/delete', [KeywordController::class, 'delete'])->name('delete');
                        Route::put('{id}/restore', [KeywordController::class, 'restore'])->name('restore');

                });

                Route::prefix('product')->name('product.')->group(function () {
                        Route::get('/', [ProductController::class, 'index'])->name('index');
                        Route::get('add', [ProductController::class, 'add'])->name('add');
                        Route::post('store', [ProductController::class, 'store'])->name('store');
                        Route::get('detail/{id}', [ProductController::class, 'edit'])->name('detail');
                        Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
                        Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('delete');

                        // SEO
                        Route::post('{id}/seo-analysis', [ProductController::class, 'getSeoAnalysis'])->name('seo.analysis');
                        Route::post('seo-analysis-live', [ProductController::class, 'getSeoAnalysisLive'])->name('seo.analysis.live');
                });

                Route::prefix('config')->name('config.')->group(function () {
                    Route::get('/', [ConfigController::class, 'index'])->name('index');
                    Route::post('update', [ConfigController::class, 'store'])->name('update');
                    Route::get('seo', [ConfigController::class, 'seo'])->name('seo');
                    Route::post('seo', [ConfigController::class, 'storeSeo'])->name('store');



            });


        });
        Route::middleware(\App\Http\Middleware\AdminRedirectIfAuthenticated::class)->group(function () {
                Route::get('login', [AuthController::class, 'login'])->name('login');
                Route::post('login', [AuthController::class, 'authenticate']);
        });

});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('product', [FrontendProductController::class, 'list'])->name('product.list');
Route::get('product/{slug}', [FrontendProductController::class, 'detail'])->name('product.detail');

