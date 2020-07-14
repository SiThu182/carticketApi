<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
use App\Http\Resources\LocationResource;
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
        $locations = LocationResource::collection($locations);
        return response()->json([
            'loctions' => $locations
        ]);
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
            'city' => 'required|min:3|max:30'
        ]);

        $location = Location::create([
            'city' => request('city')
        ]);

        return response()->json([
            'message' => 'Insert Successful',
            'location' => $location
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = Location::find($id);
        $city = LocationResource::make($city);
        return response()->json([
            'city' => $city
        ]);
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
            'city' => 'required|min:3|max:30'
        ]);

            $location = Location::find($id);
            $location->city = $request->city;
            $location->save();
       

        return response()->json([
            'message' => "Update Successful"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();

        return response()->json(["message" => "Delete Successful....."]);
    }
}
