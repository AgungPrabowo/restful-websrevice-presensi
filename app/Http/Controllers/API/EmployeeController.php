<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Employee;
use Validator;

class EmployeeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id'           => 'required|integer',
            'location_id'       => 'required|integer',
            'employee_ktp'      => 'required|string',
            'employee_firstName'=> 'required|string',  
            'employee_lastName' => 'required|string',
            'employee_position' => 'required|string',
            'employee_IMEI'     => 'required|string',
            'employee_phone'    => 'required|string',
            'employee_gender'   => 'required|string',
            'employee_birthDate'=> 'required|string',
            'employee_address'  => 'required|string',
            'employee_city'     => 'required|string',
            'employee_region'   => 'required|string'
        ]);

        if($validator->fails()){
            return $this->sendError('Validator Error.', $validator->errors());
        }

        $employee = Employee::create($input);
        
        return $this->sendResponse($employee->toArray(), 'Seccessfuly created employee!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Employee::find($id);

        if(is_null($data)) {
            return $this->sendError('Data not found');
        }

        return $this->sendResponse($data->toArray(), 'Employee retrieved successfully.');
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id'           => 'required|integer',
            'location_id'       => 'required|integer',
            'employee_ktp'      => 'required|string',
            'employee_firstName'=> 'required|string',  
            'employee_lastName' => 'required|string',
            'employee_position' => 'required|string',
            'employee_IMEI'     => 'required|string',
            'employee_phone'    => 'required|string',
            'employee_gender'   => 'required|string',
            'employee_birthDate'=> 'required|string',
            'employee_address'  => 'required|string',
            'employee_city'     => 'required|string',
            'employee_region'   => 'required|string'
        ]);

        if($validator->fails()){
            return $this->sendError('Validator Error.', $validator->errors());
        }

        $data = Employee::find($id);
        $data->user_id              = $request->get('user_id');
        $data->location_id          = $request->get('location_id');
        $data->employee_ktp         = $request->get('employee_ktp');
        $data->employee_firstName   = $request->get('employee_firstName');
        $data->employee_lastName    = $request->get('employee_lastName');
        $data->employee_position    = $request->get('employee_position');
        $data->employee_IMEI        = $request->get('employee_IMEI');
        $data->employee_phone       = $request->get('employee_phone');
        $data->employee_gender      = $request->get('employee_gender');
        $data->employee_birthDate   = $request->get('employee_birthDate');
        $data->employee_address     = $request->get('employee_address');
        $data->employee_city        = $request->get('employee_city');
        $data->employee_region      = $request->get('employee_region');
    
        $data->save();
        
        return $this->sendResponse($data->toArray(), 'Seccessfuly updated employee!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
