<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\caestmiddleware;

Route::middleware('auth:sanctum')->get('/ur', [App\Http\Controllers\UserController::class,'Pofile']);
Route::apiResource('/user', UserController::class);

?>
