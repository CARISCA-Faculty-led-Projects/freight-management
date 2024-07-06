<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Broker>
 */
class BrokerFactory extends Factory
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
            'name' => fake()->company,
            'description' => fake()->text,
            'email' => fake()->email,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'mask' => Str::orderedUUId(),
            'password' => Hash::make('helloworld'),
            'status' => "Approved",
            'created_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
