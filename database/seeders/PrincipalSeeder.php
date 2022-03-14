<?php

namespace Database\Seeders;

use App\Models\Principal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrincipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Principal::create([
            'name' => 'AbdelRahman Mohamed',
            'seel_code' => 5495,
            'email' => 'abdelrahman.mohamed@samaya-electronics.com',
        ]);
        Principal::create([
            'name' => 'Ehab',
            'seel_code' =>  4002,
            'email' => 'ehabmahmoud.saeed@samaya-electronics.com',
        ]);
        
        Principal::create([
            'name' => 'Mohamed Adel Ali Mousa',
            'seel_code' => 4239,
            'email' => '1',
        ]);
        Principal::create([
            'name' => 'Bassem Moustafa Abd El Fattah',
            'seel_code' =>  5395,
            'email' => '2',
        ]);
        Principal::create([
            'name' => 'Mahmoud Ahmed Hassan',
            'seel_code' =>  4064,
            'email' => '3',
        ]);
        Principal::create([
            'name' => 'Samuel Magdy',
            'seel_code' =>  4208,
            'email' => '4',
        ]);
        Principal::create([
            'name' => 'Michael Atef Fouad Labib',
            'seel_code' =>  4322,
            'email' => '5',
        ]);
        Principal::create([
            'name' => 'Rommel Angelo Mirones',
            'seel_code' =>  4815,
            'email' => '6',
        ]);
        Principal::create([
            'name' => 'Ramy Refaat',
            'seel_code' =>  5177,
            'email' => '7',
        ]);
        Principal::create([
            'name' => 'John Adel Mounir Kamel',
            'seel_code' =>  9460,
            'email' => '8',
        ]);
        Principal::create([
            'name' => 'David Dalmas',
            'seel_code' =>  1111,
            'email' => '9',
        ]);
        Principal::create([
            'name' => 'Ahmed Medhat',
            'seel_code' =>  10418,
            'email' => '10',
        ]);
        Principal::create([
            'name' => 'Mohamed Samy',
            'seel_code' =>  4050,
            'email' => '11',
        ]);
        Principal::create([
            'name' => 'Abd El Rahman Ebrahim',
            'seel_code' =>  6557,
            'email' => '12',
        ]);
        Principal::create([
            'name' => 'Miller Mahrous',
            'seel_code' =>  4105,
            'email' => '13',
        ]);
        Principal::create([
            'name' => 'Tarek Ahmed',
            'seel_code' =>  10610,
            'email' => '14',
        ]);
        Principal::create([
            'name' => 'Anton Zarif Gaber Attallah',
            'seel_code' =>  4082,
            'email' => '15',
        ]);
        Principal::create([
            'name' => 'Antony Farah',
            'seel_code' =>  10090,
            'email' => 'anthony.farah@samaya-electronics.com',
        ]);
        Principal::create([
            'name' => 'Mohamed Eid',
            'seel_code' =>  10538,
            'email' => '17',
        ]);
        Principal::create([
            'name' => 'Hamza Baydon',
            'seel_code' =>  9855,
            'email' => '18',
        ]);
        Principal::create([
            'name' => 'Paula Ayad',
            'seel_code' =>  10509,
            'email' => '19',
        ]);
    }
}
