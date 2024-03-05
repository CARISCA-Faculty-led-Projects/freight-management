<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicle_categories')->insert([
            ['name'=>'Trucks'],
            ['name'=>'Trailers'],
            ['name'=>'Specialized Vehicles'],
            ['name'=>'Vans'],
            ['name'=>'Buses'],
            ['name'=>'Specialty Vehicles'],
            ['name'=>'Intermodal Vehicles'],
            ['name'=>'Motorbike'],
            ['name'=>'Tri-cycle'],
            ['name'=>'Airfreight Containers'],
        ]);
    }
}
