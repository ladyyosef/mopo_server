<?php

namespace Database\Seeders;

use App\Models\Currencyprice;
use Illuminate\Database\Seeder;

class CurrencypriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currencyprice::factory()->count(5)->create();

    }
}
