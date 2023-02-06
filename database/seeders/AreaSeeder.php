<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create(['name' => "Maintenance Rooms"]);
        Area::create(['name' => "Tooling Area"]);
        Area::create(['name' => "Shipping Area"]);
        Area::create(['name' => "IT offices "]);
        Area::create(['name' => "Supply Chain Offices "]);
        Area::create(['name' => "Outside Premises "]);
        Area::create(['name' => "Programing offices"]);
        Area::create(['name' => "Servers Rooms "]);
        Area::create(['name' => "Others"]);
        Area::create(['name' => "IMD "]);
        Area::create(['name' => "Engineering Rooms"]);
        Area::create(['name' => "Assembly "]);
        Area::create(['name' => "Injection "]);
        Area::create(['name' => "Quality Offices"]);
        Area::create(['name' => "Production Offices"]);
        Area::create(['name' => "Material Scheduling Office"]);
        Area::create(['name' => "Paint line 1 "]);
        Area::create(['name' => "Paint 2 "]);
        Area::create(['name' => "Jigging Area"]);
        Area::create(['name' => "Paint Vault"]);
        Area::create(['name' => "Hetronic "]);
        Area::create(['name' => "Lighting Area"]);
        Area::create(['name' => "CNC"]);
        Area::create(['name' => "SMT"]);
        Area::create(['name' => "Sludge Area "]);
        Area::create(['name' => "Customer Liasian Office"]);
        Area::create(['name' => "Purchasing Office"]);
        Area::create(['name' => "Busbar Fabrication "]);
        Area::create(['name' => "Quality Offline Area"]);
        Area::create(['name' => "Customer Service Office"]);
        Area::create(['name' => "HR office"]);
        Area::create(['name' => "Sludge Area"]);
        Area::create(['name' => "Quality Injection "]);
        Area::create(['name' => "Corridor"]);
        Area::create(['name' => "Busbar Assembly"]);
        Area::create(['name' => "Electricity Rooms"]);
        Area::create(['name' => "Incoming Area "]);
        Area::create(['name' => "Metrology & Calibration Room "]);
        Area::create(['name' => "Miscellaneous Inventory"]);
        Area::create(['name' => "Mezzanine Inventory"]);
        Area::create(['name' => "X-ray "]);
        Area::create(['name' => "Ground Floor"]);
        Area::create(['name' => "First Floor"]);
        Area::create(['name' => "Second Floor"]);
        Area::create(['name' => "Third Floor"]);
        Area::create(['name' => "Fourth Floor"]);
        Area::create(['name' => "Finance Office"]);
        Area::create(['name' => "IMD Area"]);
        Area::create(['name' => "Resin Area"]);
        Area::create(['name' => "Waste Disposal Area"]);
    }
}
