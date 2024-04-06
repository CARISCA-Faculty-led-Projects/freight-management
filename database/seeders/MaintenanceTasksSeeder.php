<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaintenanceTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maintenance_tasks')->insert([
            ['name'=> "Oil Change"],
            ['name'=> "Tire Rotation"],
            ['name'=> "Brake Inspection"],
            ['name'=> "Air Filter Replacement"],
            ['name'=> "Spark Plug Replacement"],
        ]);
    }
}
