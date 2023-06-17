<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usertype;

class UsertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $userty = usertype :: create([
        'name' => 'Admain'
       ]);

       $userty = usertype :: create([
        'name' => 'User'
       ]);

}
}

