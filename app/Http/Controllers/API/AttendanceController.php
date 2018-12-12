<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Attendance;
use App\Location;

class AttendanceController extends BaseController
{
    public function store(Request $request)
    {   
        $loc = Location::find($request->location_id);
        (int)$latitude1 = $loc->location_latitude;
        (int)$longitude1 = $loc->location_longitude;
        (int)$latitude2 = $request->latitude;
        (int)$longitude2 = $request->longitude;
        $loc_info = $loc->location_name;

        $distance = $this->getDistance($latitude1, $longitude1, $latitude2, $longitude2);
        // $distance = $this->getDistance(110.4042755, -6.9921788, 110.404294, -6.992102);
        if($distance < $loc->location_distance) //distance 20 meter
        {
            $attendance = new Attendance([
                'employee_id' => $request->employee_id,
                'attendance_check' => $request->check,
                'attendance_info' => $loc_info,
                'attendance_latitude' => $latitude2,
                'attendance_longitude' => $longitude2
            ]);
            $attendance->save();
            
            return $this->sendResponse(
                $attendance->toArray(),
                'Anda berhasil absen di '
            );
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Anda diluar jangkaun absen'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $loc = Location::find($request->location_id);
        (int)$latitude1 = $loc->location_latitude;
        (int)$longitude1 = $loc->location_longitude;
        (int)$latitude2 = $request->latitude;
        (int)$longitude2 = $request->longitude;
        $loc_info = $loc->location_name;
        
        $distance = $this->getDistance($latitude1, $longitude1, $latitude2, $longitude2);
        if($distance < $loc->location_distance) //distance 20 meter
        {
            $attendance = Attendance::find($id);
            $attendance->attendance_check       = $request->get('check');
            $attendance->save();
    
            return $this->sendResponse(
                $attendance->toArray(),
                'Anda berhasil absen pulang di '
            );
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Anda diluar jangkaun absen'
            ]);
        }
    }

    public function getDistance($latitude1, $longitude1, $latitude2, $longitude2) 
    {  
    $earth_radius = 6371;

    $dLat = deg2rad( $latitude2 - $latitude1 );  
    $dLon = deg2rad( $longitude2 - $longitude1 );  

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
    $c = 2 * asin(sqrt($a));  
    $d = $earth_radius * $c;  

    return $d;  
    }

}
