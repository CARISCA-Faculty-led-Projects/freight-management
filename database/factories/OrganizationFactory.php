<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => "66641bbd3d79f.png",
            'country' => 'Ghana',
            'region' => 'Greater Accra',
            'load_type' => json_encode(['General Cargo','Retail Goods']),
            'name' => fake()->company,
            'description' => fake()->text,
            'email' => fake()->email,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'registration_docs' => '666f82eb6a374.pdf',
            'insurance_docs' => "666f81d695112.pdf",
            'mask' => Str::orderedUUId(),
            'account_id' => fake()->randomNumber(),
            "tax_id" => fake()->randomNumber(),
            'password' => Hash::make('helloworld'),
            'status' => "Approved",
            'created_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
