<?php

namespace Database\Seeders;

use App\Models\Load;
use App\Models\Shipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senders = DB::table('senders')->get(['mask']);
        $orgs = DB::table('organizations')->pluck('mask')->toArray();
        foreach ($orgs as $index => $org) {
            $drivers = DB::table('drivers')->where('organization_id', $org)->get(["organization_id", 'mask']);

            foreach ($drivers as $driver) {
                for ($s = 0; $s < 4; $s++) {
                    $tmp = [];
                    for ($l = 0; $l < 4; $l++) {
                        $mask = fake()->numberBetween(129188, 991829);
                        Load::factory()->create(['sender_id' => $senders[$s]->mask, 'organization_id' => $org, 'mask' => $mask]);
                        array_push($tmp, $mask);
                    }
                    $loads = json_encode($tmp);
                    Shipment::factory()->create(['driver_id' => $driver->mask, 'organization_id' => $driver->organization_id, 'loads' => json_encode($loads)]);
                }
            }
        }
    }
}
