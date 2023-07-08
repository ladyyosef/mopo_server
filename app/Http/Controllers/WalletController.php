<?php

namespace App\Http\Controllers;

use App\Models\wallet;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Request\api\WalletRequest;
use App\Http\Controllers\Resources\WalletResource;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
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
