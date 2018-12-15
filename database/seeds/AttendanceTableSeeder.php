<?php

use Illuminate\Database\Seeder;
use App\Attendance;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Attendance();
        $data->employee_id = 1;
        $data->attendance_check = 1;
        $data->attendance_info = 'Genuk';
        $data->attendance_latitude = 110.467985;
        $data->attendance_longitude = -7.029970;
        $data->created_at = date('Y-m-d H:i:s');
        $data->updated_at = date('Y-m-d H:i:s');
        $data->save();
    }
}
