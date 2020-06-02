<?php

use Illuminate\Database\Seeder;
use App\Stations;

class StationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stations::create([
            'station_name'=>'Dumbarton',
            'river_focus'=>'upstream',
            'image'=>'public/assests/images/01.png'
                           ]);
    }
}
