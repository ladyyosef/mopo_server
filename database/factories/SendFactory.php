<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Currency;
use App\Models\Sand;


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
            'currency_id' => Currency::factory(),
            'email' => fake()->unique()->safeEmail(),
            'account_number' => $this->faker->unique->regexify('[0-9]{12}'),
        ];
    }
}
