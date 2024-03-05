<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoadtypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('load_types')->insert([
            ['name'=>'General Cargo'],
            ['name'=>'Refrigerated Goods'],
            ['name'=>'Harzardous Materials'],
            ['name'=>'Bulk Cargo'],
            ['name'=>'Overweight Cargo'],
            ['name'=>'Automobile Tranport'],
        ]);
    }
}
