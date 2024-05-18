<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PowerSpecificPropertiesSeeder extends Seeder
{
    public function run()
    {
        DB::table('power_specific_properties')->insert([
            ['name' => 'strength', "value" => 10],
            ['name' => 'speed', "value" => 40],
            ['name' => 'reaction_time', "value" => 80],
        ]);
    }
}

