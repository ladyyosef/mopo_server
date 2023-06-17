<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

Route::apiResource('/currency',CurrencyController::class);

?>

