<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\MaintenanceTasksSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            LoadtypesSeeder::class,
            VehicleCategorySeeder::class,
            VehicleSubCategorySeeder::class,
            MaintenanceTasksSeeder::class,
            MaintenanceProvidersSeeders::class,
            SettingsSeeder::class,
            // OrganizationsSeeder::class,
            // DriverSeeder::class,
            // SenderSeeder::class,
            // LoadSeeder::class,
            // ShipmentSeeder::class,
            // BrokerSeeder::class,
            // VehicleSeeder::class
        ]);
    }
}
