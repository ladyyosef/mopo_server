<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\usertype;

class UsertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userty = usertype::create([
            'name' => 'admin'
        ]);

        $userty = usertype::create([
            'name' => 'user'
        ]);
    }
}
