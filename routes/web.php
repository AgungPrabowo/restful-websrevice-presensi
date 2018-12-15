<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/location', 'LocationController@index')->name('location');
Route::post('/location', 'LocationController@store');
Route::post('/location/update/{id}', 'LocationController@update');
Route::post('/location/destroy/{id}', 'LocationController@destroy');

Route::get('/karyawan', 'EmployeeController@index')->name('employee');
Route::post('/karyawan', 'EmployeeController@store');
Route::post('/karyawan/update/{id}', 'EmployeeController@update');
Route::post('/karyawan/destroy/{id}', 'EmployeeController@destroy');

Route::get('/absen', 'AttendanceController@index')->name('attendance');

Route::get('/user', 'UserController@index')->name('user');