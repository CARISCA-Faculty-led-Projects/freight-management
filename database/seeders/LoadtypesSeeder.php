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
            ['name'=>'Livestock Transport'],
            ['name'=>'Perishable Goods'],
            ['name'=>'Fragile Goods'],
            ['name'=>'Construction Materials'],
            ['name'=>'Retail Goods'],
            ['name'=>'E-commerce Shipments'],
            ['name'=>'Pharmaceuticals and Medical Supplies'],
            ['name'=>'Agriculture Products'],
            ['name'=>'Textiles and Apparel'],
            ['name'=>'Electronics and Technology Products'],
            ['name'=>'Furniture and Home Goods'],
            ['name'=>'Waste and Recycling Materials'],
            ['name'=>'Specialized Equipment'],
        ]);
    }
}
