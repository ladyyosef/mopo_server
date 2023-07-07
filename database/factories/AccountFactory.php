<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Account;
use App\Models\User;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'User_id' => rand(2, User::where('User_Type_id', 2)->count()),
            'Status' => $this->faker->boolean,
            'account_number' => $this->faker->unique->regexify('[0-9]{12}'),

        ];
    }
}
