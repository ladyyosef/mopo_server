<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;
use App\Models\Buy;
use App\Models\Currency;

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
            'account_number' => rand(1, Account::count()),
            'currency_id_in' => rand(1, Currency::count()),
            'currency_id_out' => rand(1, Currency::count()),
            'quantity' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
