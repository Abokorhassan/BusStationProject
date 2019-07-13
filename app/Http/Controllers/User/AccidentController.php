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

        $buses = Bus::select('id','bus_number')
                    ->where('station_id', $stations_id)
                    ->whereNotNull('Driver_id')
                    ->get();        
        return view('accident.create', compact('buses')); 
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
            'bus_number' => 'required | numeric',
            'accident_latitude' => 'required | numeric',
            'accident_longitude' => 'required | numeric',
        ]);

        $accident = new Accident();

        $accident->bus_id = $request->input('bus_number');
        $bus = Bus::find($accident->bus_id);
        $accident->bus_number = $bus->bus_number;
        $accident->driver_id = $bus->Driver_id;
        $accident->driver_number= $bus->driver_number;

        $accident->acc_lat = $request->input('accident_latitude');
        $accident->acc_long = $request->input('accident_longitude');

        // get station id of the current user 
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $accident->station_id = $station->id;
        $station = Station::find($accident->station_id);
        $accident->station_name = $station->name;

        $accident->user_id = Sentinel::getUser()->id;
        $user = User::find($accident->user_id);
        $accident->user_first = $user->first_name;
        $accident->user_last = $user->last_name;

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

        $buses = Bus::select('id','bus_number')
                    ->where('station_id', $stations_id)
                    ->whereNotNull('Driver_id')
                    ->get();      
        $opBuses = $buses->pluck('bus_number', 'id')->toArray();  

        return view('accident.edit', compact('buses', 'accident', 'opBuses')); 
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
            'bus_id' => 'required | numeric',
            'accident_latitude' => 'required | numeric',
            'accident_longitude' => 'required | numeric',
        ]);

        $accident = Accident::find($id);

        $accident->bus_id = $request->input('bus_id');
        $bus = Bus::find($accident->bus_id);
        $accident->bus_number = $bus->bus_number;
        $accident->driver_id = $bus->Driver_id;
        $accident->driver_number= $bus->driver_number;
        
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
