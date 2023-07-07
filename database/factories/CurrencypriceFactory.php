<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Currency;
use App\Models\currencyprice;

class CurrencypriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Currencyprice::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(0, 0, 1000),
            'currency_id' => rand(1, Currency::count()),
        ];
    }
}
