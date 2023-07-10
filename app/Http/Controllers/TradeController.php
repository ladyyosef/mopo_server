<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use Illuminate\Http\Request;
use App\Http\Controllers\Resources\TradeResource;
use App\Http\Requests\Request\api\TradeRequest;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trade = Trade::with([
            'currency', 'currency.prices' => fn ($query) => $query->limit(3)->orderBy('id', 'desc'),
            'currencyOut', 'currencyOut.prices' => fn ($query) => $query->limit(3)->orderBy('id', 'desc'), 'userIn'
        ])->whereNot('user_in_id', auth()->id())->get();
        return TradeResource::collection($trade);
    }


    public function my_trades()
    {
        $trade = Trade::with([
            'currency', 'currency.prices' => fn ($query) => $query->limit(3)->orderBy('id', 'desc'),
            'currencyOut', 'currencyOut.prices' => fn ($query) => $query->limit(3)->orderBy('id', 'desc'), 'userIn'
        ])->where('user_id_in', auth()->id())->get();
        return TradeResource::collection($trade);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TradeRequest $request)
    {
        return new TradeResource(Trade::create(array_merge($request->validated(), ['user_id_in' => auth()->id()])));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $trade = Trade::with('currency', 'currencyOut', 'account')->find($id);
        return new TradeResource($trade);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, trade $trade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trade $trade)
    {
        $trade->delete();
        return response(null, 204);
    }
}
