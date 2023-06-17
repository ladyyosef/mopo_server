<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

Route::apiResource('/card',CardController::class);
//Route::get('/card',[App\Http\Controllers\CardController::class,'index']);
Route::delete('/card/{card}', [App\Http\Controllers\CardController::class, 'destroy'])->name('card.destroy');
?>


