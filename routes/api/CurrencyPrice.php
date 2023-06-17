<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyPriceController ;

Route::apiResource('/currencyprice', CurrencyPriceController::class);

