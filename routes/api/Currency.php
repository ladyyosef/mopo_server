<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

Route::apiResource('/currency',CurrencyController::class);
Route::get('/currency',[App\Http\Controllers\CurrencyController::class,'Search']);

?>

