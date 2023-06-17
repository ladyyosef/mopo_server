<?php

namespace App\Http\Controllers;

use App\Models\BestCurrency;
use Illuminate\Http\Request;
use App\Http\Controllers\Resources\BestCurrencyResource;
use App\Http\Requests\Request\api\BestRequest;
use App\Models\Currency;
class BestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @response 200
     */
    public function index()
    {
        $best = BestCurrency::with('currency')->get();
        return BestCurrencyResource::collection($best);
    }

    /**
     * Store a newly created resource in storage.
     */
    /*
    * Add your favoraite Currency
    * @response 200[
     *"data": [
        [],
    *]
    *]
    *
    */
    public function store(BestRequest $request)
    {
        return new BestCurrencyResource(BestCurrency::create($request->all()));
    }


    /**
     * Display the specified resource.
     */
     public function show($id)
    {
        $best = BestCurrency::with('currency')->find($id);
        return new BestCurrencyResource($best);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BestCurrency $bestCurrency)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * @response 204
     */
    public function destroy(BestCurrency $bestCurrency)
    {
        $bestCurrency->delete();
        return response(null,204);
    }
}
