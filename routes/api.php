<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('', 'show')->name('show');
        Route::get('logout', 'logout')->name('logout');
    });
});
