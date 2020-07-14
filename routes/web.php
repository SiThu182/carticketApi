<?php

use Illuminate\Support\Facades\Route;

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
    return view('backtemplate');
});


Route::resource('location','LocationController');
Route::resource('car','CarController');
Route::resource('route','RouteController');
Route::resource('trip','TripController');
Route::resource('booking','BookingController');
Route::post('/searchTrip','TripController@searchTrip')->name('searchTrip');
Route::get('/getTrip','TripController@getTrip')->name('getTrip');
