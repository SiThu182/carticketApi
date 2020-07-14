<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Car;
use App\Http\Resources\CarResource;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        
        $cars = CarResource::collection($cars);
        return response()->json([
            'cars' => $cars
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
            'car_no' => 'required|min:3|max:30',
            'type' => 'required|min:3|max:30',
            'seat_no' => 'required|max:30',
            'car_image' => 'required'
        ]);

        
        
        if($request->hasfile('car_image')){
            $photo=$request->file('car_image');
            $name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/photos/',$name);
            $image='/storage/photos/'.$name;
             
         }

         $car = Car::create([
            'car_no' => request('car_no'),
            'seat_no' => request('seat_no'),
            'type' => request('type'),
            'car_image' => $image
         ]);

         return response()->json([
            'message' => "Insert Sucessfully",
            'car' => $car
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
        $car = Car::find($id);
        $car= CarResource::make($car);
        return response()->json([
            'cars' => $car
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
            'car_no' => 'required|min:3|max:30',
            'type' => 'required|min:3|max:30',
            'seat_no' => 'required|max:30',
             
        ]);

        
     
        if($request->hasfile('car_image')){
            $photo=$request->file('car_image');
            $name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/photos/',$name);
            $image='/storage/photos/'.$name;
             
         }else{
            $image = $request->old_image;
         }

         $car = Car::find($id);
         $car->car_no = $request->car_no;
         $car->seat_no = $request->seat_no;
         $car->type = $request->type;
         $car->car_image = $image;
         $car->save();


         return response()->json([
            'message' => "Update Sucessfully"
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
        $car = Car::find($id);
        $car->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ]);
    }
}
