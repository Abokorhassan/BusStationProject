<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Station;
use App\User;
use App\Queue;
use App\Rider;
use App\Seat;
use App\Reserve;
use App\Bus;
use DB;
use App\Schedule;
use Sentinel;

class ReserveController extends Controller
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

            // $stationreserve = Station::find($stations_id)->reserve()->paginate(4);
            $stationreserve = Reserve::oldest()
                                ->where('schedule_id', $schedule_id)
                                ->paginate(4);

            return view('reserve.index')->with('reserves',$stationreserve);
        }
        $reserves = null;  
        return view('reserve.index', compact('reserves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
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


        // getting the latest schedule_number & schedule_id & station_id of the latest schedule
        $schedule_number = $schedules->schedule_number; 
        // return $schedule_number;
        $schedule_id = $schedules->id;
        // return $schedule_id;
        // return $schedule_id.'   '.$schedules;

        $queues = Queue::select('*')
                    ->where('schedule_id', $schedule_id)        
                    ->oldest()
                    ->first();
        // return $queues;
    
        if($queues == null){
            return redirect('reserve')->with('error', 'You need to Queue a bus');
        }
        // return $schedule_id;

        $bus_id = $queues->bus_id;
        $bus_number = $queues->bus_number;
        // return $bus_number;
        //   getting the seat number
        $seat = DB::table("seats")->select('*')->whereNotIn('seat_number',function($query) use($schedule_id) {
                        $query->select('seat_number')
                            ->from('reserves')
                            ->where('schedule_id', $schedule_id);
                    })
                    ->where('bus_id', $bus_id)
                    ->get();
                    
        if($seat->isEmpty()){
            $queue_id = $queues->id;
            $queue = Queue::find($queue_id);
            // return $queue_id;
            $queue->delete();
            
            
            // again getting the oldest bus in the queue to be savid
            $queues = Queue::select('*')
                        ->where('schedule_id', $schedule_id)        
                        ->oldest()
                        ->first();
            if($queues == null){

                return redirect('reserve')->with('error', 'You nee to Queue a bus');
            }

            $bus_idAgain = $queues->bus_id;
            //   getting the seat number
            $seatAgain = DB::table("seats")->select('*')->whereNotIn('seat_number',function($query) {
                            $query->select('seat_number')->from('reserves');
                        })
                        ->where('bus_id', $bus_id)
                        ->get();
                        
            return view('reserve.create', compact('riders', 'queues')); 
        }   

        // $riders = Rider::select('id','id_number')->get();

        $riders = DB::table("Riders")->select('*')->whereNotIn('id',function($query) use($schedule_id) {
                        $query->select('rider_id')
                            ->from('reserves')
                            ->where('schedule_id', $schedule_id);
                    })
                    ->get();
        // return $seat;

        return view('reserve.create', compact('riders', 'queues')); 
    }

    public function getBusSeat(Request $request)
    {
        $queue_id = $request->id;
        //getting the bus id
        $queue = Queue::find($queue_id);
        $bus_id = $queue->bus_id;
        $schedule_id = $queue->schedule_id;

        //   getting the seat number
        $seat = DB::table("seats")->select('*')->whereNotIn('seat_number',function($query) use($schedule_id) {
                        $query->select('seat_number')
                        ->from('reserves')
                        ->where('schedule_id', $schedule_id);
                    })
                    ->where('bus_id', $bus_id)
                    ->get();

        $data = $seat;
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
            'rider' => 'required',
            'bus_number' => 'required | numeric',
            'seat_number' => 'required'
        ]);
        $reserve = new Reserve();
        $reserve->rider_id = $request->input('rider');
        // $reserve->schedule_id = $request->input('schedule');
        $reserve->queue_id = $request->input('bus_number');

        //saving bus_number and station and schedule
        $queue = Queue::find($reserve->queue_id);
        $reserve->bus_number = $queue->bus_number;
        $reserve->station_id = $queue->station_id;
        $reserve->schedule_id = $queue->schedule_id;


        $reserve->seat_number = $request->input('seat_number');

        $reserve->user_id = Sentinel::getUser()->id;// saving user_id
        // return $reserve->schedule_id;

        $reserve->save();

        return redirect('reserve')->with('success', 'Seat Reserved');

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
        $reserve = Reserve::find($id);
        $rider_id = $reserve->rider_id; //getting the rider_id of the reserve
       
        //getting the Station of the user
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
        $schedule_id = $schedules->id; // getting Schedule_id

        // Excluding Riders that reserved a seat already except this editing one
        $riders = DB::table("Riders")->select('*')
                    ->whereNotIn('id',function($query) use($schedule_id, $rider_id) {
                        $query->select('rider_id')
                            ->from('reserves')
                            ->where('schedule_id', $schedule_id);
                    })
                    ->get();

        $opRiders = $riders->pluck('id_number', 'id')->toArray(); 
        return view('reserve.edit', compact('reserve', 'riders', 'opRiders'));   
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
            'rider_id' => 'required',
        ]);

        $reserve = Reserve::find($id);
        $reserve->rider_id = $request->input('rider_id');
        $reserve->save();

        return redirect('reserve')->with('success', 'Reserved Seat Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserve = Reserve::find($id);
        $reserve->delete();
        return redirect('reserve')->with('success', 'Reserved Seat Deleted');
    }
}