<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // for level user
        // $request->user()->authorizeRoles(['admin', 'employee']);
        $locations = Location::all();
        
        return view('home', compact('locations'));
    }

    // public function welcome(Request $request)
    // {
    //     $request->user()->authorizeRoles('admin');

    //     return view('welcome');
    // }
}
