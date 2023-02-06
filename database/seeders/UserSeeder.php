<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Abdelrahman.Mohamed', 
            'email' => 'Abdelrahman@Mohamed.com',
            'password' => Hash::make('123456789'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'SuperAdmin', 
            'email' => 'EPD-Notifications@samaya-electronics.com',
            'password' => Hash::make('admIn!a#'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Ehab', 
            'email' => 'ehabmahmoud.saeed@samaya-electronics.com',
            'password' => Hash::make('2002@2'),
            'role_id' => 2,
        ]); 
        User::create([
            'name' => 'Mahmoud Hussein', 
            'email' => 'mahmoud.hussein@samaya-electronics.com',
            'password' => Hash::make('2002@2'),
            'role_id' => 2,
        ]); 

        
    }
}
