<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee();
        $employee->user_id = 2;
        $employee->location_id = 1;
        $employee->role_id = 2;
        $employee->employee_ktp = '3374071106960002';
        $employee->employee_firstName = 'agung';
        $employee->employee_lastName = 'prabowo';
        $employee->employee_position = '1';
        $employee->employee_IMEI = '865591032069983';
        $employee->employee_phone = '085815806885';
        $employee->employee_gender = 'L';
        $employee->employee_birthDate = '1996-06-11';
        $employee->employee_address = 'jl. bendungan 1135 rt/rw 05/05';
        $employee->employee_city = 'semarang';
        $employee->employee_region = 'jawa tengah';
        $employee->employee_religion = '0';
        $employee->created_at = date('Y-m-d H:i:s');
        $employee->updated_at = date('Y-m-d H:i:s');
        $employee->save();
    }
}