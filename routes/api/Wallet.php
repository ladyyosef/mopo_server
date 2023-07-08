<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Middleware\caestmiddleware;

Route::middleware('auth:sanctum')->apiResource('/wallet', WalletController::class);