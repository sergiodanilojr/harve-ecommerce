<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function (){
    Route::prefix('auth')->group(function (){
        Route::post('login', \App\Http\Controllers\Admin\Auth\LoginController::class);
        Route::post('logoff', \App\Http\Controllers\Admin\Auth\LogoutController::class);
    });
});
