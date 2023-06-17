<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BestCurrency;
class BestCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $best = BestCurrency :: create ([
             'User_id' => 6,
             'currency_id' => 2
        ]);


        $best = BestCurrency :: create ([
            'User_id' => 5,
            'currency_id' => 1
       ]);

       $best = BestCurrency :: create ([
        'User_id' => 5,
        'currency_id' => 7
       ]);
       $best = BestCurrency :: create ([
        'User_id' => 8,
        'currency_id' => 3
       ]);
       $best = BestCurrency :: create ([
        'User_id' => 9,
        'currency_id' => 7
       ]);
    }
}
