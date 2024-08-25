<?php

namespace Database\Seeders;

use App\Models\Broker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orgs = DB::table('organizations')->get();
        foreach ($orgs as $org) {
            Broker::factory()->count(6)->create(['organization_id' => $org->mask]);
        }
        Broker::factory()->count(4)->create();
    }
}
