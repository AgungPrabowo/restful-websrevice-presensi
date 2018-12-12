
application/x-httpd-php UserTableSeeder.php ( C++ source, ASCII text )
<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new User();
        $employee->role_id = 1;
        $employee->location_id = 1;
        $employee->employee_id = 1;
        $employee->name     = 'Gawong Prabu';
        $employee->email    =  'gawong@gmail.com';
        $employee->password = bcrypt('secret');
        $employee->created_at = date('Y-m-d H:i:s');
        $employee->updated_at = date('Y-m-d H:i:s');
        $employee->save();

        $admin = new User();
        $admin->role_id = 2;
        $admin->location_id = 1;
        $admin->employee_id = 2;
        $admin->name    = 'Agung Prabowo';
        $admin->email   = 'agungprabowo112@gmail.com';
        $admin->password= bcrypt('secret');
        $admin->created_at = date('Y-m-d H:i:s');
        $admin->updated_at = date('Y-m-d H:i:s');
        $admin->save();
    }
}