<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trip;
use App\Http\Resources\TripResource;

use Illuminate\Support\Facades\DB;
class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all();
        $trips = TripResource::collection($trips);
        return response()->json([
            'trips' => $trips
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip = Trip::find($id);
        $trip = TripResource::make($trip);
        return response()->json([
            'trip' => $trip
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
        //
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

     public function searchTrip(Request $request)
    {
        $departure_time = request('departure_time');
      
        $route = request('route');
        $trips = DB::table('trips')
                ->select('trips.*')
                ->where('trips.departure_time','>','%'.$departure_time.'%')
                ->where('trips.route_id', '=', $route)
                ->get();
            if ( count($trips) > 0) {
                return response()->json([
            'trips' => $trips 
             ]);   
            }else{
                 return response()->json([
            'trips' => " No ticket available on the selected date. Please try searching for other dates."
             ]);   
            }
           
       
     
             
    }
}
