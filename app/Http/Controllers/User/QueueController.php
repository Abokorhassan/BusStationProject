<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Station;
use App\User;
use App\Queue;
use App\Bus;
use App\Route;
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

            $routes = Route::select('id','name')
                        ->where('station_id', $stations_id)
                        ->get();

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
                                ->where('station_id', $stations_id)
                                // ->where('schedule_id', $schedule_id)
                                ->paginate(4);
           
            return view('queue.index', compact('routes'))->with('queues',$stationqueue);
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

        $routes = Route::select('id','name')
                    ->where('station_id', $stations_id)
                    ->get();

       // getting the latest schedule saved 
        // $schedules = Schedule::select('*')
        //                 ->where('station_id', $stations_id)
        //                 ->latest()
        //                 ->first();
                        
        $route = Route::where('station_id',$stations_id)
                    ->pluck('id')->toArray();

                    // latest()
                    // ->first()
                    // ->


        // $schedules = [];
        // foreach ($routes as $route) {
        //     $schedules[] =Schedule::select('id')
        //                     ->whereIn('route_id', $route)
        //                     ->latest()
        //                     ->first();  
        // }
        // $values = array_map(function ($item) {
        //                 return $item->id;
        //             }, $schedules);
        // // $values = collect($schedules)->pluck('id')->toArray();
        foreach ($routes as $route) {
            $schedules[] =Schedule::select('id')
                            ->whereIn('route_id', $route)
                            ->latest()
                            ->value('id');  
        }
        // return $schedules;
        

        $buses = DB::table("buses")->select('id', 'bus_number')
                    ->whereNotIn('bus_number',function($query) use($schedules) {
                        $query->select('bus_number')
                            ->from('queues')
                            ->whereIn('schedule_id', $schedules);
                    })
                    ->where('station_id', $stations_id)
                    ->whereNotNull('Driver_id')
                    ->get();
                    
        if($buses->isEmpty()){
            return redirect('queue')->with('error', 'You need to create a Schedule because all buses finished theri routine');
        }
        // return $buses;
                
        return view('queue.create', compact('schedules', 'routes', 'buses')); 
    }

    public function getBusQueue(Request $request)
    {
        $id = $request->id; // id of the targert schedule

        // getting the target station id;
        $schedule = Schedule::find($id);
        $stations_id = $schedule->station_id;

        // $route = Route::select('id')->get

        
        // getting the buses that are not in queues table
        $buses = DB::table("buses")->select('id', 'bus_number')
                    ->whereNotIn('bus_number',function($query) use($id) {
                        $query->select('bus_number')
                            ->from('queues')
                            ->where('schedule_id', 21,20);
                    })
                    ->where('station_id', $stations_id)
                    ->whereNotNull('Driver_id')
                    ->get();

        $data = $buses;  
        return Response()->json($data);
    }

    public function getRouteSchedule(Request $request)
    {
        $id = $request->id; // id of the targert route

        // getting the target station id;
        $route = Route::find($id);
        $stations_id = $route->station_id;

        // getting the buses that are not in queues table
         // getting the latest schedule saved 
         $schedules = Schedule::select('*')
                        ->where('station_id', $stations_id)
                        ->where('route_id', $id)
                        ->latest()
                        ->first();

        if(!$schedules){
            $data = ""; 
            return Response()->json($data);   
        }

        $data = $schedules;  
        return Response()->json($data);
    }

    public function getId(Request $request)
    {
        $id = $request->id;

        $user_id= Sentinel::getUser()->id;
        $user = User::find($user_id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
       
        $tabQueue = Queue::
                            select('*')
                            ->where('station_id', $stations_id)
                            ->where('route_id', $id)
                            ->latest()
                            ->get();
        $data = $tabQueue;
        // $data = $id;

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
                $data= DB::table('queues')
                            ->where('station_id', $stations_id)
                            
                            ->where(function($q)use($query){
                                $q->Where('id', 'like', '%'.$query.'%')
                                ->orwhere('bus_number', 'like', '%'.$query.'%')
                                ->orwhere('route_name', 'like', '%'.$query.'%')
                                ->orWhere('schedule_number', 'like', '%'.$query.'%')
                                ->orWhere('user_first', 'like', '%'.$query.'%')
                                ->orWhere('user_last', 'like', '%'.$query.'%')
                                ->orWhere('created_at', 'like', '%'.$query.'%');
                            })
                            ->get();
                

            }
            else
            {
                $data = DB::table('queues')
                            ->where('station_id', $stations_id)
                            ->get();
                            // ->paginate(2);
                            // ->toArray();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {  
                    $output .= '
            
                        <!-- BEGIN FEATURED POST -->
                        <div class="col-sm-6">
                            <div id="reocrds" class="featured-post-wide thumbnail polaroid ">
                                <div class="featured-text relative-left">
                                    <h3 style="text-align: center" class="success">
                                    <a style="margin-left: -3em;text-align: center" href="' .url('queue/' .$row->id ).' ">
                                        <strong > Bus: &nbsp; 
                                        </strong>'.$row->bus_number.'
                                    </a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p>
                                                        <strong>Route: &nbsp; 
                                                        </strong>
                                                        '.$row->route_name.'
                                                    </p>
                                                    <p  class="additional-post-wrap">
                                                        <span class="additional-post">
                                                           
                                                            <i class="fa fa-user"></i>  
                                                            <a href="#">&nbsp;
                                                            '.$row->user_first.' '.$row->user_last.'
                                                                
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <a style="margin-left: 5em; " href="#">
                                                        <button style=" font-size: 1em; width: 4.5em; height: 2.5em;" disabled="true"  type="button" class="btn btn-success btn-sm">Edit
                                                        </button>
                                                    </a>
                                                </div>
                                                <div  class="col-sm-6">
                                                    <p style="margin-left: -12%">
                                                        <strong>Schedule: &nbsp; 
                                                        </strong>
                                                        '.$row->schedule_number.' 
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
                        No Queue Lists found
                    </p>
                ';
            }

            $records = array(
                'output'  => $output,
                'queues'  => $data
            );

            echo json_encode($records);    
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
            'route' => 'required | numeric',
            'schedule' => 'required | numeric',
            'bus_number' => 'required | numeric',
        ]);

        $queue = new Queue();
        $queue->route_id = $request->input('route');  //route_id
        $route = Route::find($queue->route_id);       
        $queue->route_name = $route->name;            //route_name

        $queue->Schedule_id = $request->input('schedule'); // schedule_id
        $schedule = Schedule::find($queue->Schedule_id);
        $queue->schedule_number = $schedule->schedule_number;  // schedule_name

        $queue->bus_id = $request->input('bus_number'); //  bus_id
        $bus = Bus::find($queue->bus_id);
        $queue->bus_number = $bus->bus_number;  // bus_number
        $queue->station_id = $bus->station_id;  // station_id
        $queue->station_name = $bus->station_name; // station_name
        // return $queue->bus_id; 

        $queue->user_id = Sentinel::getUser()->id;// user_id
        $user = User::find($queue->user_id);
        $queue->user_first = $user->first_name;   // user_first
        $queue->user_last = $user->last_name;     // user_last
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

        $stationqueue = Queue::find($id);

        $stationqueue->forceDelete();
        $stationqueue->reserve()->forceDelete();
        return redirect('queue')->with('success', 'Bus Deleted from the Queue');
    }
}
