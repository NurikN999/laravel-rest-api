<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'name' => 'Almaty',
            'code' => 'ALA',
            'country_id' => 1
        ]);

        Location::create([
            'name' => 'Astana',
            'code' => 'NQZ',
            'country_id' => 1
        ]);

        Location::create([
            'name' => 'Bangkok',
            'code' => 'BKK',
            'country_id' => 2
        ]);
    }
}
