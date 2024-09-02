<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'brokers_percentage_pl' => 5,
            'organizations_percentage_pl' => 5,
            'system_percentage_pl' => 5,
            'price_per_km' => 70,
        ]);
    }
}
