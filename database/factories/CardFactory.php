<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\card;
use App\Models\User;
use App\Models\wallet;
use Carbon\carbon;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Card_number' => $this->faker->numberBetween(-10000, 10000),
            'Holder_Name' => $this->faker->word,
            'type'  => $this->faker->randomElement(['visa', 'master']),
            'Cvc' => $this->faker->numberBetween(-10000, 10000),
            'Expire_Date' => Carbon::parse($this->faker->date()),
            'password' => 'password',
            'user_id' => rand(2, User::count())
        ];
    }
}
