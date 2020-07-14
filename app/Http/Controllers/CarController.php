<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

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
        return view('car.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


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

         Car::create([
            'car_no' => request('car_no'),
            'seat_no' => request('seat_no'),
            'type' => request('type'),
            'car_image' => $image
         ]);

         return redirect()->route('car.index');

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
        $car = Car::find($id);
        return view('car.edit',compact('car'));
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


         return redirect()->route('car.index');
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
        
         return redirect()->route('car.index');
    }
}
