<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function() {
    // Route::resource('attendance', 'AttendanceController');
    // Route::resource('employee', 'EmployeeController');
    Route::resource('role', 'RoleController');
    
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::post('attendance/in', 'API\AttendanceController@store');
        Route::post('attendance/out/{id}', 'API\AttendanceController@update');
        Route::get('auth/logout', 'API\AuthController@logout');
        Route::get('auth/user', 'API\AuthController@user');
        Route::post('employee', 'API\EmployeeController@store');
        Route::post('employee/{id}', 'API\EmployeeController@update');
        Route::get('employee/{id}', 'API\EmployeeController@show');
    });

    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::post('login', 'API\AuthController@login');
        Route::post('signup', 'API\AuthController@signup');
    });
});