<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\caestmiddleware;

Route::middleware(caestmiddleware::class)->group(function () {
    Route::post('/login', [App\Http\Controllers\Api\AuthenticationController::class , 'login']);
    Route::post('/login-admin', [App\Http\Controllers\Api\AuthenticationController::class , 'loginAdmin']);
    Route::post('/register', [App\Http\Controllers\Api\AuthenticationController::class , 'register']);

});

Route::middleware('auth:sanctum')->post('/logout', [App\Http\Controllers\Api\AuthenticationController::class , 'logout']);
Route::middleware('auth:sanctum')->post('/authenticate-card', [App\Http\Controllers\Api\AuthenticationController::class , 'authenticateCard']);
