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
            'User_out' => rand(1, User::count()),
            'User_in' => rand(1, User::count()),
            'trade_id' => rand(1, Trade::count()),
            'Wallet_id' => rand(1, Wallet::count()),
        ];
    }
}