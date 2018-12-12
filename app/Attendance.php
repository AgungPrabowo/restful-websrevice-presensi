<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id',
        'attendance_check',
        'attendance_info',
        'attendance_latitude',
        'attendance_longitude'
    ];
    
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
