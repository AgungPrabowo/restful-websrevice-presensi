<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Location;
use App\User;
use App\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $locations = Location::all();
        $users     = User::all();
        $roles     = Role::all();
        $religions = array('Islam','Kristen','Katolik','Hindu','Budha','Khong Hu Cu');
        $genders   = ['L'=>'Laki-Laki','P'=>'Perempuan'];
        $positions = array('admin','teknisi');

        return view('employee', compact('employees', 'locations', 'users', 'roles','religions','genders','positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'location_id' => 'required|integer',
            'role_id' => 'required|integer',
            'ktp' => 'required|string',
            'first_name' => 'required|string',  
            'last_name' => 'required|string',
            'position' => 'required|string',
            'imei' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'birth_date' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'religion' => 'required|string'
        ]);
        
        $data = new Employee([
            'user_id' => $request->user_id,
            'location_id' => $request->location_id,
            'role_id' => $request->role_id,
            'employee_ktp' => $request->ktp,
            'employee_firstName' => $request->first_name,
            'employee_lastName' => $request->last_name,
            'employee_position' => $request->position,
            'employee_IMEI' => $request->imei,
            'employee_phone' => $request->phone,
            'employee_gender' => $request->gender,
            'employee_birthDate' => $request->birth_date,
            'employee_address' => $request->address,
            'employee_city' => $request->city,
            'employee_region' => $request->region,
            'employee_religion' => $request->religion
        ]);
        $data->save();

        return redirect()->route('employee')->with('info', 'Karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'location_id' => 'required|integer',
            'role_id' => 'required|integer',
            'ktp' => 'required|string',
            'first_name' => 'required|string',  
            'last_name' => 'required|string',
            'position' => 'required|string',
            'imei' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'birth_date' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'religion' => 'required|string'
        ]);
        
        $data = Employee::find($id);
        $data->user_id              = $request->get('user_id');
        $data->location_id          = $request->get('location_id');
        $data->role_id              = $request->get('role_id');
        $data->employee_ktp         = $request->get('ktp');
        $data->employee_firstName   = $request->get('first_name');
        $data->employee_lastName    = $request->get('last_name');
        $data->employee_position    = $request->get('position');
        $data->employee_IMEI        = $request->get('imei');
        $data->employee_phone       = $request->get('phone');
        $data->employee_gender      = $request->get('gender');
        $data->employee_birthDate   = $request->get('birth_date');
        $data->employee_address     = $request->get('address');
        $data->employee_city        = $request->get('city');
        $data->employee_region      = $request->get('region');
        $data->employee_religion    = $request->get('religion');
    
        $data->save();
        
        return redirect()->route('employee')->with('info', 'Karyawan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('employee')->with('info', 'Karyawan berhasil dihapus');
    }
}
