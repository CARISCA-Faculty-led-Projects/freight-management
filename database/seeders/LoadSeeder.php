<?php

namespace Database\Seeders;

use App\Models\Load;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senders = DB::table('senders')->get(['mask']);
        $orgs = DB::table('organizations')->get(['mask']);

        foreach($senders as $index => $sender){
            Load::factory()->count(7)->create(['sender_id'=> $sender->mask,'organization_id'=> $orgs[$index]->mask]);
        }
       
        //
    }
}
