<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Route;
class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        $routes = Route::all();
        return view('route.index',compact('locations','routes'));
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
            "from" => "required",
            "to"   => "required"
        ]);

        Route::create([
            "from" => request('from'),
            "to"   => request('to')
        ]);

        return redirect()->route('route.index');
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
        $locations = Location::all();
        $route = Route::find($id);
        return view('route.edit',compact('locations','route'));
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
            "from" => "required",
            "to"   => "required"
        ]);

          $route = Route::find($id);
          $route->from =  $request->from;
          $route->to = $request->to;
          $route->save();

           return redirect()->route('route.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();
         return redirect()->route('route.index');
    }
}
