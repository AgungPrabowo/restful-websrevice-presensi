<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        
        return view('home', compact('locations'));
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
        $data = new Location();
        $data->location_name        = $request->name;
        $data->location_latitude    = $request->latitude;
        $data->location_longitude   = $request->longitude;
        $data->location_distance    = $request->distance;
        $data->save();
        return redirect()->route('home')->with('info', 'Lokasi berhasil ditambahkan');
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
        $data = Location::find($id);
        $data->location_name       = $request->get('name');
        $data->location_latitude   = $request->get('latitude');
        $data->location_longitude  = $request->get('longitude');
        $data->location_distance   = $request->get('distance');
        $data->save();
        return redirect()->route('home')->with('info', 'Lokasi berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = Location::find($id);
        $data->delete();
        return redirect()->route('home')->with('info', 'Lokasi berhasil dihapus');
    }
}
