<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Currency;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BestCurrency>
 */
class BestCurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'User_id' => rand(2, User::where('User_Type_id', 2)->count()),
            'currency_id' => rand(1, Currency::count()),
        ];
    }
}
