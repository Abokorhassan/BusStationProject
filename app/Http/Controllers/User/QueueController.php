<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Station;
use App\User;
use App\Queue;
use App\Bus;
use DB;
use App\Schedule;
use Sentinel;

class QueueController extends Controller
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

            // getting the latest schedule saved 
            $schedules = Schedule::select('*')
                            ->where('station_id', $stations_id)
                            ->latest()
                            ->first();
            if($schedules == null){
                return redirect('schedule')->with('error', 'You need to create a Schedule');
            }

            $schedule_id = $schedules->id;

            // $stationqueue = Station::find($stations_id)->queue()->paginate(4);
            $stationqueue = Queue::withTrashed()
                                ->latest()
                                ->where('schedule_id', $schedule_id)
                                ->paginate(4);
           
            return view('queue.index')->with('queues',$stationqueue);
        }
        $queues = null;  
        return view('queue.index', compact('queues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //getting the bus of that station
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
        
        return view('queue.create', compact('schedules')); 
    }

    public function getBusQueue(Request $request)
    {
        $id = $request->id; // id of the targert schedule

        // getting the target station id;
        $schedule = Schedule::find($id);
        $stations_id = $schedule->station_id;

        // getting the buses that are not in queues table
        $buses = DB::table("buses")->select('id', 'bus_number')
                    ->whereNotIn('bus_number',function($query) use($id) {
                        $query->select('bus_number')
                            ->from('queues')
                            ->where('schedule_id', $id);
                    })
                    ->where('station_id', $stations_id)
                    ->get();

        $data = $buses;  
        return Response()->json($data);
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
            'schedule' => 'required | numeric',
            'bus_number' => 'required | numeric',
        ]);

        $queue = new Queue();
        $queue->Schedule_id = $request->input('schedule'); // saving schedule_id
        $queue->bus_id = $request->input('bus_number'); // saving bus_id
        // return $queue->bus_id; 

        //saving bus_number and staion
        $bus =Bus::find($queue->bus_id);

        $queue->bus_number = $bus->bus_number; // saving bus_number
        $queue->station_id = $bus->station_id; // saving station_id
        $queue->station_id;

        $queue->user_id = Sentinel::getUser()->id;// saving user_id
        $queue->save();

        return redirect('queue')->with('success', 'Bus Added To The Queue');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
        // {
        //     $queue = Queue::find($id);

        //     //getting the bus of that station
        //     $id= Sentinel::getUser()->id;
        //     $user = User::find($id);
        //     $s_id = $user->station_id; 
        //     $station = Station::find($s_id);
        //     $stations_id = $station->id;
            
        //     $buses = Bus::select('id','bus_number')
        //                 ->where('station_id', $stations_id)
        //                 ->get();
        //     $opBuses = $buses->pluck('bus_number', 'id')->toArray();

        //     return view('queue.edit', compact('queue','buses', 'opBuses'));   
    // }

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
        $user_id= Sentinel::getUser()->id;
        $user = User::find($user_id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;

        // getting the latest schedule saved 
        $schedules = Schedule::select('*')
                        ->where('station_id', $stations_id)
                        ->latest()
                        ->first();

        $schedule_id = $schedules->id;

        $stationqueue = Queue::withTrashed()
                            ->where('schedule_id', $schedule_id)
                            ->where('id', $id)
                            ->first();
                            
        // return $stationqueue.' '.$id;
        $schedule_id = $stationqueue->schedule_id;
        $queue_id = $stationqueue->id;
        $bus_number = $stationqueue->bus_number;
        // return  $queue_id.'  '.$schedule_id.'  '.$bus_number;

        // return $queue;
        $stationqueue->forceDelete();
        $stationqueue->reserve()->forceDelete();
        return redirect('queue')->with('success', 'Bus Deleted from the Queue');
    }
}
