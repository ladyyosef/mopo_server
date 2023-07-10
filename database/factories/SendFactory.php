<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Currency;
use App\Models\Sand;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Send>
 */
class SendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->randomFloat(0, 0, 9999999999.),
            'currency_id' => rand(1, Currency::count()),
            'email' => fake()->unique()->safeEmail(),
            'user_id' => rand(2, User::count()),
        ];
    }
}
