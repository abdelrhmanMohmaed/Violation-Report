<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => '5S']);
        Category::create(['name' => 'Work at Height']);
        Category::create(['name' => 'Access']);
        Category::create(['name' => 'Working Environment']);
        Category::create(['name' => 'Services']);
        Category::create(['name' => 'Welfare']);
        Category::create(['name' => 'Fire Precautions']);
        Category::create(['name' => 'Work Equipment']);
        Category::create(['name' => 'Manual & Mechanical Handling']);
        Category::create(['name' => 'Vehicles']);
        Category::create(['name' => 'Dangerous Substances']);
        Category::create(['name' => 'Hazardous substances']);
        Category::create(['name' => 'PPE Management']);
        Category::create(['name' => 'Inventory System ']);
        Category::create(['name' => 'Emergency']);
        Category::create(['name' => 'People Behavior']);
    }
}
