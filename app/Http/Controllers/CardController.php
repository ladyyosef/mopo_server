<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\Resources\CardResource;
use App\Http\Controllers\Resources\UserResource;
use App\Http\Requests\Request\api\StoreRequest;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $card = card::with('wallet')->get();
        return CardResource::collection($card);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $array = array_merge($request->validated(), ['user_id' => auth()->id()]);
        $card = Card::create($array);
        return new CardResource($card);
    }


    /**
     * Display the specified resource.
     */
    public function show(card $card)
    {
        return new CardResource($card);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, card $card)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(card $card)
    {
        $card->delete();
        return response(null, 204);
    }
}
