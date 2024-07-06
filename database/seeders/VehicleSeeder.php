<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drivers = DB::table('drivers')->get(['organization_id','mask']);

        foreach($drivers as $driver){
            Vehicle::factory()->create(['driver_id'=>$driver->mask,'organization_id'=>$driver->organization_id]);
        }
    }
}
