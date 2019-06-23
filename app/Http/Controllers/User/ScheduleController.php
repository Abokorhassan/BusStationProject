<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Station;
use App\User;
use App\Schedule;
use App\Queue;
use Sentinel;
class ScheduleController extends Controller
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

            $stationschedule = Schedule::latest()
                                ->where('station_id', $stations_id)
                                ->paginate(4);
            // $stationschedule = Station::find($stations_id)->schedule()->paginate(4);
            return view('schedule.index')->with('schedules',$stationschedule);
        }
        $schedules = null;  
        return view('schedule.index', compact('schedules'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.create'); 
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
            'schedule_number' => array('required', 'regex:/(Sch_[a-z]{2,3})[0-9]{2,4}$/','unique:schedules,schedule_number'),
        ]);

        $schedule = new Schedule();
        $schedule->schedule_number =$request->input('schedule_number');

            $id= Sentinel::getUser()->id;
            $schedule->user_id = $id;
            $user = User::find($id);
            $s_id = $user->station_id; 
            $station = Station::find($s_id);
            $stations_id = $station->id;
            $schedule->station_id = $stations_id;

            // ReStoring the all bus from the softDelete

            //getting the Station of the user
            $id= Sentinel::getUser()->id;
            $user = User::find($id);
            $s_id = $user->station_id; 
            $station = Station::find($s_id);
            $stations_id = $station->id;

            // getting the latest schedule saved 
            $schedules = Schedule::select('*')
                            ->where('station_id', $stations_id)
                            ->latest()
                            ->first();
                      
            if($schedules != null ){
                $schedule_id = $schedules->id;
                Queue::withTrashed()
                ->where('schedule_id',  $schedule_id)
                ->restore();
            }          

        $schedule->save();

        return redirect('schedule')->with('success', 'Schedule Created'); 
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
        $schedule = Schedule::find($id);

        return view('schedule.edit', compact('schedule'));
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
            'schedule_number' => array('required', 'regex:/(Sch_[a-z]{2,3})[0-9]{2,4}$/','unique:schedules,schedule_number,'.$id),
        ]);

        $schedule = Schedule::find($id);
        $schedule->schedule_number =$request->input('schedule_number');

        $schedule->save();

        return redirect('schedule')->with('success', 'Schedule Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect('schedule')->with('success', 'Schedule Deleted');
    }
}
