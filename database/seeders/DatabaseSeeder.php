<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        // $this->call([
        //     // UsersSeeder::class,
        //     LoadtypesSeeder::class,
        //     VehicleCategorySeeder::class,
        //     VehicleSubCategorySeeder::class,
        //     MaintenanceTasksSeeder::class
        // ]);

        User::create([
            'name'              => "Super admin",
            'email'             => 'admin@freight.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
