<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('location','Api\LocationController');
Route::apiResource('car','Api\CarController');
Route::apiResource('route','Api\RouteController');
Route::apiResource('trip','Api\TripController');
Route::post('/searchTrip','Api\TripController@searchTrip')->name('searchTrip');
