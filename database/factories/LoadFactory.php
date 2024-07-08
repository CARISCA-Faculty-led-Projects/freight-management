<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Load>
 */
class LoadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lat1 = (float) fake()->numberBetween(5,7).'.'.fake()->numberBetween(1403004030403,148620999999999);
        $lng1 = (float)'-'.fake()->numberBetween(0,1).'.'.fake()->numberBetween(1434858839999,148620999999999);

        $lat = (float)fake()->numberBetween(5,7).'.'.fake()->numberBetween(1403004030403,148620999999999);
        $lng = (float)'-'.fake()->numberBetween(0,1).'.'.fake()->numberBetween(1434858839999,148620999999999);

        $mask = fake()->numberBetween(129188,991829);
        $handling = fake()->word.','.fake()->word;

        $pick = [
            'name'=> $mask.' pickup',
            'location'=>['lat'=>$lat1,'lng'=>$lng1]
        ];

        $drop = [
            'name'=> $mask.' pickup',
            'location'=>['lat'=>$lat,'lng'=>$lng]
        ];
        return [
            'image' => "66641bbd3d79f.png",
            'load_type' => 'General Cargo',
            'description' => fake()->text,
            'budget' => fake()->numberBetween(1000,5600),
            'quantity' => fake()->numberBetween(1,10),
            'length' => fake()->numberBetween(1,10),
            'weight' => fake()->numberBetween(1,10),
            'breadth' => fake()->numberBetween(1,10),
            'height' => fake()->numberBetween(1,10),
            'handling' => $handling,
            'insurance_docs' => "666f81d695112.pdf",
            'pickup_address' => json_encode($pick),
            'dropoff_address' => json_encode($drop),
            'mask' => $mask,
            'status' => "Completed",
            'created_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
