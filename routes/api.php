<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Model\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

require_once  'api/Authentication.php';

require_once  'api/Account.php';

require_once  'api/User.php';

require_once  'api/Currency.php';

require_once  'api/CurrencyPrice.php';

require_once  'api/Card.php';

require_once  'api/Send.php';

require_once  'api/Wallet.php';

require_once  'api/Trade.php';

require_once  'api/Buy.php';

require_once  'api/Transduction.php';

require_once  'api/BestCurrency.php';
Route::middleware('auth:sanctum')->get('/User', function (Request $request) {
    return $request->user();
});

Route::get('getCurrencyPrice/{curName}', [App\Http\Controllers\CurrencyController::class , 'getCurrencyPrice']);




