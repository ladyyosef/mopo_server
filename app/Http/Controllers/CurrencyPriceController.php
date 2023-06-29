<?php

namespace App\Http\Controllers;

use App\Models\Currencyprice;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\CurrencyPriceCollection;
use App\Http\Controllers\Resources\CurrencyPriceResource;
use App\Filters\V1\CurrencypriceFilter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Resources\CurrencyResource;
use App\Http\Requests\Request\api\PriceRequest;


class CurrencyPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currencyprice = Currencyprice::all();
        return CurrencyPriceResource::collection($currencyprice);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PriceRequest $request)
    {
        return new CurrencyPriceResource(Currencyprice::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $currencyprice = Currencyprice::with('Currency')->find($id);
        return new CurrencypriceResource($currencyprice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, currencyprice $currencyprice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(currencyprice $currencyprice)
    {
        //
    }
}
