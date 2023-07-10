<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TradeController;
use App\Http\Middleware\caestmiddleware;

Route::middleware('auth:sanctum')->apiResource('/trade', TradeController::class);
Route::middleware('auth:sanctum')->get('/my-trade', [TradeController::class, 'my_trades']);
Route::delete('/trade/{trade}', [TradeController::class, 'destroy'])->name('trade.destroy');
