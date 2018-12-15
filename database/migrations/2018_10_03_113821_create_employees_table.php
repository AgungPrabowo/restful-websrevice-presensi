<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->string('employee_ktp');
            $table->string('employee_firstName');
            $table->string('employee_lastName');
            $table->string('employee_position');
            $table->string('employee_IMEI');
            $table->string('employee_phone');
            $table->enum('employee_gender', array('L', 'P'));
            $table->string('employee_birthDate');
            $table->string('employee_address');
            $table->string('employee_city');
            $table->string('employee_region');
            $table->string('employee_religion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
