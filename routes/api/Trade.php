<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TradeController;
use App\Http\Middleware\caestmiddleware;

Route::apiResource('/trade',TradeController::class);
Route::delete('/trade/{trade}', [TradeController::class, 'destroy'])->name('trade.destroy');
?>
