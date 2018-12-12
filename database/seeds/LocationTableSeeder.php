<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Location();
        $data->location_name = 'Lemah Gempal';
        $data->location_latitude = 110.404201;
        $data->location_longitude = -6.992139;
        $data->location_distance = 0.02;
        $data->created_at = date('Y-m-d H:i:s');
        $data->updated_at = date('Y-m-d H:i:s');
        $data->save();

        $data1 = new Location();
        $data1->location_name = 'Genuk';
        $data1->location_latitude = 110.467985;
        $data1->location_longitude = -7.029970;
        $data1->location_distance = 0.02;
        $data1->created_at = date('Y-m-d H:i:s');
        $data1->updated_at = date('Y-m-d H:i:s');
        $data1->save();
    }
}
