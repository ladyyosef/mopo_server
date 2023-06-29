<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Currencyprice;
use Illuminate\Http\Request;
use App\Http\Requests\Request\api\CurrencyRequest;
use App\Http\Controllers\CurrencyCollection;
use App\Http\Controllers\CurrencyPriceCollection;
use App\Http\Controllers\Resources\CurrencyResource;
use App\Http\Controllers\Resources\CurrencyPriceResource;
use App\Filters\V1\CurrencyFilter;
use Illuminate\Support\Facades\DB;
class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CurrencyFilter();
        $queryItem = $filter->transform($request);
        if (count($queryItem)==0){
           return CurrencyResource::collection(Currency::all());
        }

        else{
          //CurrenceyPrice::where(['column','operator','value']) =>queryItem;
           return  CurrencyResource::collection(Currency::where($queryItem));
       }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyRequest $request)
    {
        return new CurrencyResource(Currency::create($request->all()));
    }
    /**
     * Get a currency price and details from name of currency
     */
    public function getCurrencyPrice(string $curName)
     {

        $xx = Currency::find(1);
        $xx = Currencyprice::find(1);

        $xx = Currency::join('currencyprices', 'currencies.id', '=', 'currencyprices.currency_id')
        ->where('Currency_name','=',$curName)->get()->first();
         //['yesterday_price','Currency_name','today_price','percentage','Date_Time'];
          return $xx;
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        return new CurrencyResource($currency);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        //
    }
    /**
     * Search about Currency
     */
    public function Search(Request $request)
    {
        $currency = Currency::join('currencyprices','currencies.id', '=', 'currencyprices.currency_id')
       ->where('Currency_name','Like','%'.$request->searchTerm.'%')
        ->select ('currencies.Abbrevation','currencyprices.today_price',
        'currencyprices.percentage','currencyprices.Date_Time')->get();

         return response()->json($currency);

    }
}
