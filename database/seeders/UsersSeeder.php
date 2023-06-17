<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User::factory()->count(5)->create();
        $usar = User :: create ([
            'user_name' => 'Admain admian',
            'phone' => '0977584398',
            'email' => 'admin@admin.com',
            'password' => '111aaa',
            'postal_code' => '730816886',
            'City' => '20337339211',
            'User_Type_id' => '1',
            'Profile_image' => 'C:\Users\LENOVO\Downloads\image1\undraw_Designer_re_5v95 (1)'
        ]);


        $usar = User :: create ([
            'user_name' => 'User userr ',
            'phone' => '0966433721',
            'email' => 'user@email.com',
            'postal_code' => '339866466',
            'City' => '884442291',
            'password' => '123aa',
            'User_Type_id' => '2',
            'Profile_image' => 'C:\Users\LENOVO\Downloads\image1\undraw_Designer_re_5v95 (1)'
        ]);

        $usar = User :: create ([
            'user_name' => 'Reem Naif',
            'phone' => '09775290133',
            'email' => 'reemsalem@email.com',
            'postal_code' => '33992001466',
            'City' => '8844820013',
            'password' => '111reem',
            'User_Type_id' => '2',
            'Profile_image' => 'C:\Users\LENOVO\Downloads\image1\undraw_Multitasking_re_ffpb'
        ]);
    }

}
