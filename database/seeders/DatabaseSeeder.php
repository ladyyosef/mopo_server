<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wallet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([

            UsertypeSeeder::class,
            UsersSeeder::class,
            CurrencySeeder::class,
            WalletSeeder::class,
            AccountSeeder::class,
            CardSeeder::class,
            CurrencypriceSeeder::class,
            // TradeSeeder::class,
            // BuySeeder::class,
            // TransductionSeeder::class,
            // SendSeeder::class,
            BestCurrencySeeder::class


        ]);
    }
}
