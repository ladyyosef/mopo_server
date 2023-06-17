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
            'today_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'yesterday_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'percentage' => $this->faker->word,
            'Date_Time' => $this->faker->date_format(),
            'currency_id' => Currency::factory(),
        ];
    }
}
