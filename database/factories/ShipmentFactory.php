<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lat1 = fake()->numberBetween(5,7).'.'.fake()->numberBetween(1403004030403,148620999999999);
        $lng1 = '-'.fake()->numberBetween(0,1).'.'.fake()->numberBetween(1434858839999,148620999999999);
        

        $lat = fake()->numberBetween(5,7).'.'.fake()->numberBetween(1403004030403,148620999999999);
        $lng = '-'.fake()->numberBetween(0,1).'.'.fake()->numberBetween(1434858839999,148620999999999);

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
            'loads' => json_encode(['General Cargo','Retail Goods']),
            'description' => fake()->text,
            'pickup_address' => json_encode($pick),
            'dropoff_address' => json_encode($drop),
            'mask' => $mask,
            'shipment_status' => "Assigned",
            'created_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
