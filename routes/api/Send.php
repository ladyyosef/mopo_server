<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendController;

Route::middleware('auth:sanctum')->apiResource('/send',SendController::class);
Route::delete('/send/{send}', [SendController::class, 'destroy'])->name('send.destroy');
