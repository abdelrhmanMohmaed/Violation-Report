<?php

namespace Database\Seeders;

use App\Models\Seel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seel::create(['name' => 'Seel 1']);
        Seel::create(['name' => 'Seel 2']);
        Seel::create(['name' => 'Seel 3']);
        Seel::create(['name' => 'Seel 4']);
        Seel::create(['name' => 'Seel 5']);
    }
}
