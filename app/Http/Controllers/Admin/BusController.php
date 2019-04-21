<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bus;
use Sentinel;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $buses = Bus::all();
        return view('admin.bus.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bus.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'model_type' => 'required | max:50',
            'bus_number' => 'required | max:50|unique:buses',
            'Driver_id' => 'required | numeric',
            'station_id' => 'required | numeric',
        ]);   
        $bus = new Bus();
        $bus->model_type =$request->input('model_type');
        $bus->bus_number =$request->input('bus_number');
        $bus->Driver_id =$request->input('Driver_id');
        $bus->station_id =$request->input('station_id');
        //$bus->user_id = auth()->user()->id;
        $bus->user_id = Sentinel::getUser()->id;

        $bus->save();

        return redirect('admin/bus')->with('success', 'Bus Created');
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
        $bus = Bus::find($id);
        // if(auth()->user()->id !== $bus->user_id){
        //     return redirect('bus')->with('error', 'You\'\re not allowed to edit this');
        // }
        return view('admin.bus.edit', compact('bus'));
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
        $this->validate($request,[
            'model_type' => 'required | max:50',
            'bus_number' => 'required | max:50|',
            'Driver_id' => 'required | numeric',
            'station_id' => 'required | numeric',
        ]);    
        
        $bus = Bus::find($id);
        $bus->model_type =$request->input('model_type');
        // if($bus->bus_number !=$request->input('bus_number')){

        // }
        $bus->bus_number =$request->input('bus_number');
        $bus->Driver_id =$request->input('Driver_id');
        $bus->station_id =$request->input('station_id');
        $bus->save();

        #redirect
        return redirect('admin/bus')->with('success', 'Bus Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus = Bus::find($id);
        $bus->delete();
        return redirect('admin/bus')->with('success', 'Bus Deleted');
    }
}
