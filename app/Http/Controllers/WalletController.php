<?php

namespace App\Http\Controllers;

use App\Models\wallet;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Request\api\WalletRequest;
use App\Http\Controllers\Resources\WalletResource;

/**
 * @group Wallet
 *  */
class WalletController extends Controller
{
    /**
     * get wallets of a user
     * @response {
    "data": [
        {
            "id": 2,
            "quantity": 9212735699,
            "name": "deleniti",
            "logo": "http://localhost:8000/storage//tmp/9c963e9d725aecb022d022b8103f7b15.png",
            "Abbrevation": "consequatur",
            "price": 248,
            "percentage": 0
        },
        {
            "id": 4,
            "quantity": 7534749832,
            "name": "quaerat",
            "logo": "http://localhost:8000/storage//tmp/41fcb019e899646621ccc8dc9002e92a.png",
            "Abbrevation": "facilis",
            "price": 719,
            "percentage": 0
        }
    ]
}
     */
    public function index()
    {
        $wallets = auth()->user()->wallets()->with(['currency', 'currency.prices' => fn ($query) => $query->limit(3)->orderBy('id', 'desc')])->get();
        return WalletResource::collection($wallets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WalletRequest $request)
    {
        return new WalletResource(Wallet::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    //
    public function show(Wallet $wallet)
    {
        $wallet->load('currency');
        return new WalletResource($wallet);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(wallet $wallet)
    {
        //
    }
}
