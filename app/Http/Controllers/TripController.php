<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Car;
use App\Route;
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
        $cars = Car::all();
        $routes = Route::all();
        return view('trip.index',compact('trips','cars','routes'));
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
            'class_name' => 'required|min:3|max:30',
            'local_price' => 'required|min:2|max:30',
            'foregin_price' => 'required|min:2|max:30',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'car' => 'required',
            'route' => 'required'
        ]);

         Trip::create([
            'class_name' => request('class_name'),
            'local_price' => request('local_price'),
            'foregin_price' => request('foregin_price'),
            'departure_time' => request('departure_time'),
            'arrival_time' => request('arrival_time'),
            'car_id' => request('car'),
            'route_id' => request('route')
         ]);


         return redirect()->route('trip.index');
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
        $trip = Trip::find($id);
        $cars = Car::all();
        $routes = Route::all();
        return view('trip.edit',compact('trip','cars','routes'));
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
            'class_name' => 'required|min:3|max:30',
            'local_price' => 'required|min:2|max:30',
            'foregin_price' => 'required|min:2|max:30',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'car' => 'required',
            'route' => 'required'
        ]);


        $trip = Trip::find($id);

        $trip->class_name = $request->class_name;
        $trip->local_price = $request->local_price;
        $trip->foregin_price = $request->foregin_price;
        $trip->departure_time = $request->departure_time;
        $trip->arrival_time = $request->arrival_time;
        $trip->car_id = $request->car;
        $trip->route_id = $request->route; 
        $trip->save(); 
        return redirect()->route('trip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trip::find($id);
        $trip->delete();
        return redirect()->route('trip.index');
    }

    public function searchTrip(Request $request)
    {
        $departure_time = request('departure_time');
        echo $departure_time;
        $route = request('route');
        $trips = DB::table('trips')
                ->select('trips.*')
                ->where('trips.departure_time', '=', $departure_time)
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

    public function getTrip($value='')
    {
        $routes = Route::all();
        
        return view('trip.search',compact('routes'));
    }


}
