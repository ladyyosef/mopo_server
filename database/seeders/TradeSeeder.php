<?php

namespace Database\Seeders;

use App\Models\Trade;
use Illuminate\Database\Seeder;

class TradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trade::factory()->count(5)->create();
    }
}
