<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyController;

Route::middleware('auth:sanctum')->apiResource('/buy',BuyController::class);
Route::delete('/buy/{buy}', [BuyController::class, 'destroy'])->name('buy.destroy');
