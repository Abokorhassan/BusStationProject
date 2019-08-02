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
use App\Route;
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
            // $schedules = Schedule::select('*')
            //                 ->where('station_id', $stations_id)
            //                 // ->latest()
            //                 // ->first();
            //                 ->get();

            // if($schedules == null){
            //     return redirect('schedule')->with('error', 'You need to create a Schedule');
            // }

            // $schedule_id = $schedules->id;      

            // $stationreserve = Station::find($stations_id)->reserve()->paginate(4);
            $stationreserve = Reserve::oldest()
                                ->where('station_id', $stations_id)
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

        $routes = Route::select('id','name')
                    ->where('station_id', $stations_id)
                    ->get();
        $schedules = [];        
        foreach ($routes as $route) {
                        echo $schedules[] = Schedule::select('id')
                                        ->whereIn('route_id', $route)
                                        ->latest()
                                        ->value('id');  
        }

        if(!$schedules){
            return redirect('schedule')->with('error', 'You need to createSchedule');
        }

        $queues = Queue::select('bus_number')
                    ->whereIn('schedule_id', $schedules)
                    ->get();

        // return $queues;

        if($queues->isEmpty()){
            return redirect('queue')->with('error', 'You need to Queue a bus');
        }

        // return $schedules;

        
        // // getting the latest schedule saved 
        // $schedules = Schedule::select('*')
        //                 ->where('station_id', $stations_id)
        //                 ->latest()
        //                 ->first();

        // // return $schedule_number;
        // $schedule_id = $schedules->id;

        // $queues = Queue::select('*')
        //             ->where('schedule_id', $schedule_id)        
        //             ->oldest()
        //             ->first();
        // // return $queues;
    
        // if($queues == null){
        //     return redirect('reserve')->with('error', 'You need to Queue a bus');
        // }
        // // return $schedule_id;

        // $bus_id = $queues->bus_id;
        // $bus_number = $queues->bus_number;
        // // return $bus_number;
        // //   getting the seat number
        // $seat = DB::table("seats")->select('*')->whereNotIn('seat_number',function($query) use($schedule_id) {
        //                 $query->select('seat_number')
        //                     ->from('reserves')
        //                     ->where('schedule_id', $schedule_id);
        //             })
        //             ->where('bus_id', $bus_id)
        //             ->get();
                    
        // if($seat->isEmpty()){
        //     $queue_id = $queues->id;
        //     $queue = Queue::find($queue_id);
        //     // return $queue_id;
        //     $queue->delete();
            
            
        //     // again getting the oldest bus in the queue to be savid
        //     $queues = Queue::select('*')
        //                 ->where('schedule_id', $schedule_id)        
        //                 ->oldest()
        //                 ->first();
        //     if($queues == null){

        //         return redirect('reserve')->with('error', 'You nee to Queue a bus');
        //     }

        //     $bus_idAgain = $queues->bus_id;
        //     //   getting the seat number
        //     $seatAgain = DB::table("seats")->select('*')->whereNotIn('seat_number',function($query) {
        //                     $query->select('seat_number')->from('reserves');
        //                 })
        //                 ->where('bus_id', $bus_id)
        //                 ->get();
                        
        //     return view('reserve.create', compact('riders', 'queues')); 
        // }   

        $riders = DB::table("Riders")->select('*')->whereNotIn('id',function($query) use($schedules) {
                        $query->select('rider_id')
                            ->from('reserves')
                            ->whereIn('schedule_id', $schedules);
                    })
                    ->get();
        // return $seat;

        $routes = Route::select('id','name')
                    ->where('station_id', $stations_id)
                    ->get();
       

        return view('reserve.create', compact('riders', 'routes')); 
    }

    public function getBusSeat(Request $request)
    {
        $queue_id = $request->id;
        //getting the bus id
        $queue = Queue::find($queue_id);
        $bus_id = $queue->bus_id;
        $schedule_id = $queue->schedule_id;

        //   getting the seat number
        $seat = DB::table("seats")->select('*')
                    ->whereNotIn('id',function($query) use($schedule_id) {
                        $query->select('seat_id')
                        ->from('reserves')
                        ->where('schedule_id', $schedule_id);
                    })
                    ->where('bus_id', $bus_id)
                    ->get();

        $data = $seat;
        return Response()->json($data);
    }

    public function getRouteSchedule(Request $request)
    {
        $id = $request->id; // id of the targert route

        // // getting the target station id;
        // $route = Route::find($id);
        // $stations_id = $route->station_id;

        // // getting the buses that are not in queues table
        //  // getting the latest schedule saved 
        //  $schedules = Schedule::select('*')
        //                 ->where('station_id', $stations_id)
        //                 ->where('route_id', $id)
        //                 ->latest()
        //                 ->first();

        // $data = $schedules;  

        $schedule = Schedule::select('id')
                        ->where('route_id', $id)
                        ->latest()
                        ->first();
        $schedule_id = $schedule->id;

        $queues = Queue::select('*')
                        ->where('schedule_id', $schedule_id)        
                        ->oldest()
                        ->first();
        if(!$queues){
            $data = ""; 
            return Response()->json($data);   
        }

        // $bus_id = $queues->bus_id;
        // //   getting the seat number
        // $seat = DB::table("seats")->select('*')->whereNotIn('seat_number',function($query) use($schedule_id) {
        //                 $query->select('seat_number')
        //                     ->from('reserves')
        //                     ->where('schedule_id', $schedule_id);
        //             })
        //             ->where('bus_id', $bus_id)
        //             ->get();
                    
        // if($seat->isEmpty()){
        //     $queue_id = $queues->id;
        //     $queue = Queue::find($queue_id);
        //     // return $queue_id;
        //     $queue->delete();
            
            
        //     // again getting the oldest bus in the queue to be savid
        //     $queues = Queue::select('*')
        //                 ->where('schedule_id', $schedule_id)        
        //                 ->oldest()
        //                 ->first();
        //     // if($queues == null){

        //     //     return redirect('reserve')->with('error', 'You nee to Queue a bus');
        //     // }

        //     // $bus_idAgain = $queues->bus_id;
        //     // //   getting the seat number
        //     // $seatAgain = DB::table("seats")->select('*')->whereNotIn('seat_number',function($query) {
        //     //                 $query->select('seat_number')->from('reserves');
        //     //             })
        //     //             ->where('bus_id', $bus_id)
        //     //             ->get();
                        
        //     // return view('reserve.create', compact('riders', 'queues')); 
        //     $data = $queues; 

        //     return Response()->json($data);  
        // }


        $data = $queues; 

        return Response()->json($data);   
    }

    public function liveSearch(Request $request)
    {
        $user_id= Sentinel::getUser()->id;
        $user = User::find($user_id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
      
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data= DB::table('reserves')
                            ->where('station_id', $stations_id)
                            
                            ->where(function($q)use($query){
                                $q->where('id', 'like', '%'.$query.'%')
                                ->orWhere('rider_number', 'like', '%'.$query.'%')
                                ->orWhere('rider_first', 'like', '%'.$query.'%')
                                ->orWhere('rider_second', 'like', '%'.$query.'%')
                                ->orWhere('rider_third', 'like', '%'.$query.'%')
                                ->orWhere('bus_number', 'like', '%'.$query.'%')
                                ->orWhere('seat_number', 'like', '%'.$query.'%')
                                ->orWhere('route_name', 'like', '%'.$query.'%')
                                ->orWhere('schedule_number', 'like', '%'.$query.'%')
                                ->orWhere('schedule_number', 'like', '%'.$query.'%')
                                ->orWhere('user_first', 'like', '%'.$query.'%')
                                ->orWhere('user_last', 'like', '%'.$query.'%')
                                ->orWhere('created_at', 'like', '%'.$query.'%');
                            })
                            ->get();
                

            }
            else
            {
                $data = DB::table('reserves')
                            ->where('station_id', $stations_id)
                            ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                        
                    $output .= '
                        <div class="col-sm-6">
                            <div id="reocrds" class="featured-post-wide thumbnail polaroid ">
                                <div class="featured-text relative-left">
                                    <h3 style="text-align: center" class="success">
                                    <a style="margin-left: -3em"  href="' .url('reserve/' .$row->id ).' ">
                                        <strong> Rider Number: &nbsp; 
                                        </strong>
                                        '.$row->rider_number.'
                                    </a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p style="white-space: nowrap;">
                                                        <strong>Name: &nbsp; 
                                                        </strong>
                                                        '.$row->rider_first.' '.$row->rider_second.'   
                                                    </p>                    
                                                    <p>
                                                        <strong>Bus:
                                                        </strong>
                                                        '.$row->bus_number.'
                                                    </p>
                                                    <p  class="additional-post-wrap">
                                                        <span class="additional-post">
                                                            <i class="fa fa-user"></i>  
                                                            <a href="#">&nbsp;
                                                                '.$row->user_first.' '.$row->user_last.'
                                                                
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <a style="margin-left: 5em; " href="' . url('reserve/' .$row->id .'/edit') . '">
                                                        <button style=" font-size: 1em; width: 4.5em; height: 2.5em;"  type="button" class="btn btn-success btn-sm">Edit
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p>
                                                        <strong>Seat: &nbsp; 
                                                        </strong>
                                                        '.$row->seat_number.' 
                                                    </p>
                                                    <p>
                                                        <strong>Route: &nbsp; 
                                                        </strong>
                                                        '.$row->route_name.' 
                                                    </p>
                                                    <p style="margin-left: -12%" class="additional-post-wrap">
                                                        <span style="margin-right: -15%" class="additional-post">
                                                        <i class="fa fa-clock-o"></i> &nbsp;  
                                                             <a  href="#"> '. $row->created_at.'
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <a style="color: white; margin-left: -2em;" href="javascript:;" data-toggle="modal" onclick="deleteData('.$row->id.')" 
                                                        data-target="#delete_confirm" class="btn btn-danger">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.featured-text -->
                            </div>
                        </div>
                        
                    ';
                }
            }
            else
            {
                $output = '
                    <p>
                        No Reserve Seat Lists found
                    </p>
                ';
            }

            $records = array(
                'output'  => $output,
                'reserves'  => $data
            );

            echo json_encode($records);     

            // $output = '1';
            // echo json_encode($output); 
        }
    
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
            'route' => 'required | numeric',
            'bus_number' => 'required | numeric',
            'seat_number' => 'required'
        ]);
        $reserve = new Reserve();

        $reserve->rider_id = $request->input('rider');      //rider_id
        $rider = Rider::find($reserve->rider_id);
        $reserve->rider_first = $rider->first_name;     //rider_first
        $reserve->rider_second = $rider->last_name;     //rider_second
        $reserve->rider_third = $rider->third_name;     //rider_third

        $reserve->route_id = $request->input('route');  //route_id
        $route = Route::find($reserve->route_id);       
        $reserve->route_name = $route->name;            //route_name

        $reserve->queue_id = $request->input('bus_number');     // queue_id
        $queue = Queue::find($reserve->queue_id);
        $reserve->bus_number = $queue->bus_number;      // bus_number
        $reserve->schedule_id = $queue->schedule_id;        // schedule_id        
        $reserve->schedule_number = $queue->schedule_number;       // schedule_number
        $reserve->station_id = $queue->station_id ;        // station_id         
        $reserve->station_name = $queue->station_name;       // schedule_number        

        $reserve->seat_id = $request->input('seat_number');  //  seat_id
        $seat = Seat::find($reserve->seat_id);
        $reserve->seat_number = $seat->seat_number;     // seat_number
        // return $reserve->seat_number;

        $reserve->user_id = Sentinel::getUser()->id;   // user_id
        $user = User::find($queue->user_id);
        $reserve->user_first = $user->first_name;   // user_first
        $reserve->user_last = $user->last_name;     // user_last       

        $reserve->save();

        $queues = Queue::select('*')
                        ->where('schedule_id', $reserve->schedule_id)        
                        ->oldest()
                        ->first();
        $scheulele_Id = $reserve->schedule_id;
        $bus_id = $queues->bus_id;
        
        $seat = DB::table("seats")->select('*')->whereNotIn('id',function($query) use($scheulele_Id) {
                            $query->select('seat_id')
                                ->from('reserves')
                                ->where('schedule_id', $scheulele_Id);
                        })
                        ->where('bus_id', $bus_id)
                        ->get();
  
        if($seat->isEmpty()){
            $queue_id = $queues->id;
            $queue = Queue::find($queue_id);
            // return $queue_id;
            $queue->delete();
        }
                    
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