<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'location_id',
        'role_id',
        'employee_ktp',
        'employee_firstName',
        'employee_lastName',
        'employee_position',
        'employee_IMEI',
        'employee_phone',
        'employee_gender',
        'employee_birthDate',
        'employee_address',
        'employee_city',
        'employee_region',
        'employee_religion'
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
