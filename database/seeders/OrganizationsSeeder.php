<?php

namespace Database\Seeders;

use App\Http\Livewire\Organisation;
use App\Models\Organization;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker)
    {
        // \App\Models\User::factory(10)->create();
        Organization::factory()->count(10)->create();
    }
}
