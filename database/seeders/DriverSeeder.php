<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orgs = DB::table('organizations')->get(['mask']);

        foreach($orgs as $org){
            Driver::factory()->count(4)->create(['organization_id' => $org->mask]);
        }
    }
}
