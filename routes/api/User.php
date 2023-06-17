<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\caestmiddleware;

Route::middleware('auth:sanctum')->get('/user', [App\Http\Controllers\UserController::class,'index']);
Route::apiResource('/user', UserController::class);

?>
