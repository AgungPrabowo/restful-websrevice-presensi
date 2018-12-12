<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = array('location_name','location_latitude','location_longitude','location_distance');
    
    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }
}
