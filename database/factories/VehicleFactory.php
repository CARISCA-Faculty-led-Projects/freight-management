<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VehicleFactory extends Factory
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
            'load_type' => json_encode(['General Cargo','Retail Goods']), //["Specialized Equipment","General Cargo","Refrigerated Goods"]
            'number' => fake()->numberBetween(12983,89200),
            'vehicle_category_id' =>fake()->numberBetween(1,10),
            'vehicle_subcategory_id' =>fake()->numberBetween(1,2),
            'make' => fake()->company,
            'model' => fake()->word,
            'year' => fake()->year(),
            'color' => fake()->hexColor(),
            'engine_type' => 'Petrol',
            'transmission' => 'Manual',
            'fuel_consumption' => 300,
            'axle_type' => 300,
            'weight' => 300,
            'length' => 20,
            'gps' => 'No',
            'height' => 30,
            'width' => 13,
            'max_load_weight' => 300,
            'mask' => Str::orderedUUId(),
            'created_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
