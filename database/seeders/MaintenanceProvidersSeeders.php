<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MaintenanceProvidersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maintenance_providers')->insert([
            ['name' => 'Craftman Mechanics', 'email' => "craftman@gmail.com", 'phone' => '0554858348'],
            ['name' => 'AutoPro Services', 'email' => "autopro@gmail.com", 'phone' => '0554668348'],
        ]);
    }
}
