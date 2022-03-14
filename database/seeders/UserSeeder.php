<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'seel_code' => 5495,
            'email' => 'abdelrahman.mohamed@samaya.electronics.com',
            'password' => Hash::make('abdo01111592296'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'superAdmin',
            'seel_code' =>  70000,
            'email' => 'EPD-Notifications@samaya-electronics.com',
            'password' => Hash::make('admin123456'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Ehab',
            'seel_code' =>  4002,
            'email' => 'ehabmahmoud.saeed@samaya-electronics.com',
            'password' => Hash::make('2002@2'),
            'role_id' => 2,
        ]);
    }
}
