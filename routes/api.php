<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', \App\Http\Controllers\Admin\Auth\LoginController::class);
        Route::post('logoff', \App\Http\Controllers\Admin\Auth\LogoutController::class);
    });

    Route::apiResource(
        'customers',
        \App\Http\Controllers\Admin\CustomerController::class
    );

    Route::apiResource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::apiResource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::apiResource('product-categories', \App\Http\Controllers\Admin\ProductCategoryController::class);
});
