<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BestController;

Route::apiResource('/bestCurrency',BestController::class);
Route::delete('/bestCurrency/{bestCurrency}', [BestController::class, 'destroy'])->name('bestCurrency.destroy');
?>
