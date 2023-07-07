<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/home')->group(function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/watchlist', [HomeController::class, 'watchlist']);
    Route::get('/best-value', [HomeController::class, 'bestValue']);
    Route::get('/trending', [HomeController::class, 'trending']);
});
