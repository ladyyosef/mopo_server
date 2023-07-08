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

/**
 * @group Card
 *  */
class CardController extends Controller
{
    /**
     * get wallets of a user
     * @response {
    "data": [
        {
            "id": 4,
            "Holder_Name": "dolorem",
            "type": "master",
            "Expire_Date": "2010-04-17T00:00:00.000000Z"
        },
        {
            "id": 5,
            "Holder_Name": "minima",
            "type": "visa",
            "Expire_Date": "1979-03-25T00:00:00.000000Z"
        }
    ]
}
     */
    public function index()
    {
        $cards = auth()->user()->cards;
        return CardResource::collection($cards);
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
