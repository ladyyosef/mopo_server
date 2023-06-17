<?php

namespace Database\Seeders;

use App\Models\Transduction;
use Illuminate\Database\Seeder;

class TransductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transduction::factory()->count(5)->create();
    }
}
