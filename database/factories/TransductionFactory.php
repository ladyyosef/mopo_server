<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Trade;
use App\Models\Wallet;
use App\Models\transduction;

class TransductionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transduction::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'User_out' => User::factory(),
            'User_in' => User::factory(),
            'trade_id' => Trade::factory(),
            'Wallet_id' => Wallet::factory(),
        ];
    }
}
