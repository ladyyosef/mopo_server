<?php

namespace Database\Seeders;

use App\Models\Buy;
use Illuminate\Database\Seeder;
use Database\Factories\currencyprice;

class BuySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buy::factory()->count(5)->create();
    }
}
