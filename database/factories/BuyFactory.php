<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Account;
use App\Models\Currency;
use App\Models\buy;

class BuyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Buy::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'account_number' => Account::factory(),
            'currency_id_in' => Currency::factory(),
            'currency_id_out' => Currency::factory(),
            'quantity' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
