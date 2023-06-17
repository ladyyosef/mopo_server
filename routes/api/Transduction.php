<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransductionController;


Route::apiResource('/transduction',TransductionController::class);
Route::delete('/transduction/{transduction}', [TransductionController::class, 'destroy'])->name('transduction.destroy');
?>
