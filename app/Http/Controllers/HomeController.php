<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeSearchRequest;
use App\Http\Resources\HomeCurrencyResource;
use App\Models\Currency;

/**
 * @group Home
 */
class HomeController extends Controller
{
    public function index()
    {
        $currencies = Currency::trending(priceCount: 3, perPage: 2);

        return HomeCurrencyResource::collection($currencies);
    }

    public function show(Currency $currency)
    {
        return new HomeCurrencyResource($currency);
    }

    public function watchlist(HomeSearchRequest $request)
    {
        $currencies = Currency::with([
            'prices'
            => fn ($query) => $query->orderBy('id', 'desc')->limit(3)
        ])
            ->whereRaw('LOWER(Currency_name) LIKE (?)', ['%' . $request->search . '%'])
            ->get();

        return HomeCurrencyResource::collection($currencies);
    }

    public function bestValue(HomeSearchRequest $request)
    {
        $currencies = Currency::with([
            'prices'
            => fn ($query) => $query->orderBy('id', 'desc')->limit(3)
        ])
            ->withSum([
                'prices'
                => fn ($query) => $query->orderBy('id', 'desc')->limit(2)
            ], 'price')
            ->orderBy('prices_sum_price', 'desc')
            ->whereRaw('LOWER(Currency_name) LIKE (?)', ['%' . $request->search . '%'])
            ->get();

        return HomeCurrencyResource::collection($currencies);
    }

    public function trending(HomeSearchRequest $request)
    {
        $currencies = Currency::trending(1000, priceCount: 3, search: $request->search);

        return HomeCurrencyResource::collection($currencies);
    }
}
