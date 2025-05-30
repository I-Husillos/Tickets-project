<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserDataController;

Route::prefix('admin')->group(function () {
    // Rutas públicas
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Rutas protegidas con Passport
    Route::middleware('auth:api')->group(function () {
        Route::get('/user', [AuthController::class, 'me']);

        Route::get('/me', [AuthController::class, 'me']);

        Route::get('/users', [UserDataController::class, 'index'])->name('api.admin.users');
    });

});

