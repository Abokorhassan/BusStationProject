<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\User;
use App\Station;
use App\Bus;
use App\Route;
use App\Schedule;
use App\Queue;
use App\Reserve;
use Sentinel;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
    }

    public function showHome()
    {
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;

        $station = Station::find($stations_id);
        // return $station;

        //total users
        $user_count = User::
                        where('station_id', $stations_id)
                        ->count();
         
        //total Route
        $route_count = Route::
                        where('station_id', $stations_id)
                        ->count();

        // total bus
        $bus_count = Bus::
                        where('station_id', $stations_id)
                        ->count();

        //total driver
        $driver_count = Driver::
                            where('station_id', $stations_id)
                            ->count();
        // return $driver_count;

        $routes = Route::select('id','name')
                        ->where('station_id', $stations_id)
                        ->get();

        if(Sentinel::check())
            return view('index',compact('station', 'routes'),['user_count'=>$user_count, 'driver_count'=>$driver_count, 'bus_count'=>$bus_count, 'route_count'=>$route_count]);
        else
            return redirect('login')->with('error', 'You must be logged in!');
    }

    public function getId(Request $request)
    {
        $id = $request->id;

        $user_id= Sentinel::getUser()->id;
        $user = User::find($user_id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
       
        // getting the latest schedule saved 
        $schedule = Schedule::select('*')
                        ->where('station_id', $stations_id)
                        ->where('route_id', $id)
                        ->latest()
                        ->first();
        $schedule_id = $schedule->id;

        $tabQueue = Queue::select('*')
                            ->where('station_id', $stations_id)
                            ->where('schedule_id', $schedule_id)
                            ->oldest()
                            ->get();
        $data = $tabQueue;
        // $data = $id;

        return Response()->json($data);
    }

    public function getBusSeat($id)
    {
        $queue = Queue::find($id);
        $reserves = Reserve::select('*')
                        ->where('queue_id', $id)
                        ->get(); 
        return view('busSeat', compact('reserves', 'queue'));
    }

    public function getSchedule(Request $request)
    {
        $id = $request->id;

        $user_id= Sentinel::getUser()->id;
        $user = User::find($user_id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
       
        // getting the latest schedule saved 
        $schedule = Schedule::select('*')
                        ->where('station_id', $stations_id)
                        ->where('route_id', $id)
                        ->latest()
                        ->first();
        $data = $schedule;

        return Response()->json($data);
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
        //
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
}
