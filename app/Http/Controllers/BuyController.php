<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Currency;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Resources\BuyResource;
use App\Http\Requests\Request\api\BuyRequest;
use App\Models\Wallet;
class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buy = Buy::with('currency', 'user')->get();
        return BuyResource::collection($buy);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BuyRequest $request)
    {
        $buy = Buy::create(array_merge($request->validated(), ['user_id' => auth()->id()]));
        Wallet::create(array_merge($request->validated(), ['user_id' => auth()->id()]));
        return new BuyResource($buy);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buy = Buy::with('currency', 'currencyOut')->find($id);
        return new BuyResource($buy);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buy $buy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buy $buy)
    {
        $buy->delete();
        return response(null, 204);
    }
}
