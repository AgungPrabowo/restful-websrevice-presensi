<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->role_name = 'employee';
        $role_employee->created_at = date('Y-m-d H:i:s');
        $role_employee->updated_at = date('Y-m-d H:i:s');
        $role_employee->save();

        $role_admin = new Role();
        $role_admin->role_name = 'admin';
        $role_employee->created_at = date('Y-m-d H:i:s');
        $role_employee->updated_at = date('Y-m-d H:i:s');
        $role_admin->save();
    }
}