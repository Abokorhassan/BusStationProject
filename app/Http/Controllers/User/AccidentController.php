<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accident;
use App\Station;
use App\User;
use App\Driver;
use App\Bus;
use Sentinel;

class AccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        if(!$station == ''){
            $stations_id = $station->id;
            $stationAccident = Station::find($stations_id)->accident()->paginate(3);
            return view('accident.index')->with('accidents',$stationAccident);
        }
        $accidents = null;  
        return view('accident.index', compact('accidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;

        $drivers = Driver::select('id','driver_number')
                    ->where('station_id', $stations_id)
                    ->get();
        $buses = Bus::select('id','bus_number')
                    ->where('station_id', $stations_id)
                    ->get();        
        return view('accident.create', compact('drivers', 'buses')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'accident_number' => array('required', 'regex:/(Acc_)[0-9]{2,4}$/','unique:accidents,acc_num'),
            'driver_number' => 'required | numeric',
            'bus_number' => 'required | numeric',
            'accident_latitude' => 'required | numeric',
            'accident_longitude' => 'required | numeric',
        ]);

        $accident = new Accident();
        $accident->acc_num = $request->input('accident_number');
        $accident->driver_id = $request->input('driver_number');
        $accident->bus_id = $request->input('bus_number');
        $accident->acc_lat = $request->input('accident_latitude');
        $accident->acc_long = $request->input('accident_longitude');
        $accident->user_id = Sentinel::getUser()->id;

        // get station id of the current user 
        $stations = Station::select('id','name')->get();
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
        $accident->station_id = $stations_id;
        $accident->save();

        return redirect('accident')->with('success', 'Accident Created');
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
        $accident = Accident::find($id);
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;

        $drivers = Driver::select('id','driver_number')
                    ->where('station_id', $stations_id)
                    ->get();
        $opDrivers = $drivers->pluck('driver_number', 'id')->toArray();

        $buses = Bus::select('id','bus_number')
                    ->where('station_id', $stations_id)
                    ->get();     
        $opBuses = $buses->pluck('bus_number', 'id')->toArray();  

        return view('accident.edit', compact('drivers', 'buses', 'accident','opDrivers', 'opBuses')); 
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
        $this->validate($request, [
            'acc_num' => array('required', 'regex:/(Acc_)[0-9]{2,4}$/','unique:accidents,acc_num,'.$id),
            'driver_id' => 'required | numeric',
            'bus_id' => 'required | numeric',
            'accident_latitude' => 'required | numeric',
            'accident_longitude' => 'required | numeric',
        ]);

        $accident = Accident::find($id);
        $accident->acc_num = $request->input('acc_num');
        $accident->driver_id = $request->input('driver_id');
        $accident->bus_id = $request->input('bus_id');
        $accident->acc_lat = $request->input('accident_latitude');
        $accident->acc_long = $request->input('accident_longitude');
        $accident->save();

        return redirect('accident')->with('success', 'Accident Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accident = Accident::find($id);
        $accident->delete();
        return redirect('accident')->with('success', 'Accident Deleted');
    }
}
