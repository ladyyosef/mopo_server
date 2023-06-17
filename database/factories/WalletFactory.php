<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Currency;
use App\Models\User;
use App\Models\wallet;

class WalletFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wallet::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Quantity' => $this->faker->randomFloat(0, 0, 9999999999.),
            'User_id' => User::factory(),
            'currency_id' => Currency::factory(),
        ];
    }
}
