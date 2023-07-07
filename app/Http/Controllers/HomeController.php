<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeCurrencyResource;
use App\Models\Currency;

class HomeController extends Controller
{
    public function index()
    {
        $currencies = Currency::trending(priceCount: 3, perPage: 2);

        return HomeCurrencyResource::collection($currencies);
    }

    public function watchlist()
    {
        $currencies = Currency::with([
            'prices'
            => fn ($query) => $query->orderBy('id', 'desc')->limit(3)
        ])
            ->get();

        return HomeCurrencyResource::collection($currencies);
    }

    public function bestValue()
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
            ->get();

        return HomeCurrencyResource::collection($currencies);
    }

    public function trending()
    {
        $currencies = Currency::trending(1000, priceCount: 3);

        return HomeCurrencyResource::collection($currencies);
    }
}
