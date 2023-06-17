<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Send;
class SendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $send = send::create([
        'email' => 'user133@gmail.com',
        'account_number' => 333991872061,
        'quantity' => 112.399,
        'currency_id' => 1


       ]);


       $send = send::create([
        'email' => 'user453@gmail.com',
        'account_number' => 324567809865,
        'quantity' => 123.455,
        'currency_id' => 3


       ]);
       $send = send::create([
        'email' => 'user443@gmail.com',
        'account_number' => 234576128976,
        'quantity' =>345.67,
        'currency_id' => 4


       ]);
    }
}
