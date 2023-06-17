<?php

namespace App\Http\Controllers;

use App\Models\trade;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Currency;
use App\Http\Controllers\Resources\TradeResource;
use App\Http\Requests\Request\api\TradeRequest;
class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trade = Trade::with('currency','currencyOut','account')->get();
        return TradeResource::collection($trade);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TradeRequest $request)
    {
        return new TradeResource(Trade::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $trade = Trade::with('currency','currencyOut','account')->find($id);
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
    public function destroy(trade $trade)
    {
        $trade->delete();
        return response(null,204);
    }
}
