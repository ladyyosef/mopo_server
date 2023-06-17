<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Middleware\caestmiddleware;

Route::apiResource('/wallet', WalletController::class);


?>
