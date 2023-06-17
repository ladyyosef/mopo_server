<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Middleware\caestmiddleware;

Route::apiResource('/account', AccountController::class);
//Route::middleware('auth:sanctum')->get('/account', [App\Http\Controllers\AccountController::class,'index']);

?>

