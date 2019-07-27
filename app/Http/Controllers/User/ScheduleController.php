<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Station;
use App\User;
use App\Schedule;
use App\Queue;
use Sentinel;
use App\Route;
use DB;
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
                                ->paginate(2);
            // $stationschedule = Station::find($stations_id)->schedule()->paginate(4);
            
            $routes = Route::select('id','name')
                        ->where('station_id', $stations_id)
                        ->get();

            $tabSchedule = Schedule::
                                select('*')
                                ->where('route_id', $id)
                                ->latest()
                                ->get();

            return view('schedule.index', compact('routes','tabSchedule'))->with('schedules',$stationschedule);
        }
        $schedules = null;  
        return view('schedule.index', compact('schedules'));
    }

    public function getId(Request $request)
    {
        $id = $request->id;

        $user_id= Sentinel::getUser()->id;
        $user = User::find($user_id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
       
        $tabSchedule = Schedule::
                            select('*')
                            ->where('station_id', $stations_id)
                            ->where('route_id', $id)
                            ->latest()
                            ->get();
        $data = $tabSchedule;
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
                $data= DB::table('schedules')
                            ->where('station_id', $stations_id)
                            
                            ->where(function($q)use($query){
                                $q->where('route_name', 'like', '%'.$query.'%')
                                ->orWhere('schedule_number', 'like', '%'.$query.'%')
                                ->orWhere('user_first', 'like', '%'.$query.'%')
                                ->orWhere('id', 'like', '%'.$query.'%')
                                ->orWhere('created_at', 'like', '%'.$query.'%');
                            })
                            ->get();
                

            }
            // else
            // {
            //     $data = DB::table('schedules')
            //                 ->where('station_id', $stations_id)
            //                 // ->get();
            //                 ->paginate(2);
            //                 // ->toArray();
            // }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                        // $output .= '
                                // <tr>
                                //     <td>'.$row->id.'</td>
                                //     <td>'.$row->schedule_number.'</td>
                                //     <td>'.$row->route_name.'</td>
                                //     <td>'.$row->user_first.'</td>
                                //     <td>'.$row->created_at.'</td>
                                //     <td> <a style="margin-left: em; " href="' . url('schedule/' .$row->id .'/edit') . '">
                                //         <button style=" font-size: 1em; width: 4.5em; height: 2.5em;"  type="button" class="btn btn-success btn-sm">Edit
                                //         </button>
                                //     </a></td>
                                //     <td> <a style="color: white; margin-left: em;" href="javascript:;" data-toggle="modal" onclick="deleteData('.$row->id.')" 
                                //         data-target="#delete_confirm" class="btn btn-danger">
                                        
                                //         Delete
                                //     </a></td>
                                // </tr>
                        // ';   
                        
                        
                    $output .= '
            
                        <!-- BEGIN FEATURED POST -->
                        <div class="col-sm-6">
                            <div id="reocrds" class="featured-post-wide thumbnail polaroid ">
                                <div class="featured-text relative-left">
                                    <h3 style="text-align: center" class="success">
                                    <a style="margin-left: -3em;text-align: center" href="' .url('schedule/' .$row->id ).' ">
                                        <strong > Schedule No. &nbsp; 
                                        </strong>'.$row->schedule_number.'
                                    </a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p>
                                                        <strong>ID: &nbsp; 
                                                        </strong>
                                                        '.$row->id.'
                                                    </p>
                                                    <p  class="additional-post-wrap">
                                                        <span class="additional-post">
                                                           
                                                            <i class="fa fa-user"></i>  
                                                            <a href="#">&nbsp;
                                                            '.$row->user_first.'
                                                                
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <a style="margin-left: 5em; " href="' . url('schedule/' .$row->id .'/edit') . '">
                                                        <button style=" font-size: 1em; width: 4.5em; height: 2.5em;"  type="button" class="btn btn-success btn-sm">Edit
                                                        </button>
                                                    </a>
                                                </div>
                                                <div  class="col-sm-6">
                                                    <p style="margin-left: -12%">
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
                        No Schedule Lists found
                    </p>
                ';
            }

            $records = array(
                'output'  => $output,
                'schedules'  => $data
            );


            echo json_encode($records);
            // return response()->json($records);
            // return response()->json([       
            //     'success' => true, 
            //     'schedule' => $output,
            //     // 'html' => view('data.list')->render()
            //     // 'paginate' => '$data->links()'
  
            // ]); 

            // return response()->json([
            //     'success' => true, 
            //     'html' => view('hospitals.list')->render()
            // ]);     
        }
    
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

        $routes = Route::select('id','name')
                    ->where('station_id', $stations_id)
                    ->get();

        if($routes->isEmpty()){
            return redirect('schedule')->with('error', 'There\'s no Route here please Ask the admin to create Route');
        }
        // return $routes;
        return view('schedule.create', compact('routes')); 
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
            'route' => 'required'
        ]);

        $schedule = new Schedule();
        $schedule->schedule_number =$request->input('schedule_number'); //schedule_number

        $id= Sentinel::getUser()->id;
        $schedule->user_id = $id;   //user_id
        $user = User::find($id);
        $schedule->user_first = $user->first_name; //user_first
        $schedule->user_last = $user->last_name;   //user_last

        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
        $schedule->station_id = $stations_id;  //station_id
        $schedule->station_name = $station->name;  //station_name

        $schedule->route_id = $request->input('route'); // route_id
        $route = Route::find($schedule->route_id);     
        $schedule->route_name = $route->name;       // route_name

        // ReStoring all buses from the softDelete of the last schedule
        $route_id = $schedule->route_id;

        // getting the latest schedule saved 
        $schedules = Schedule::select('*')
                        ->where('route_id', $route_id)
                        ->latest()
                        ->first();
                    
        if($schedules != null ){
            $schedule_id = $schedules->id;
            
            Queue::withTrashed()
                ->where('schedule_id',  $schedule_id)
                ->restore();
        }          

        // return $schedules->schedule_number;
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
        $schedule = Schedule::find($id);
        // return $schedule;
        return view('schedule.show', compact('schedule'));
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

        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;

        $routes = Route::select('id','name')
                    ->where('station_id', $stations_id)
                    ->get();

        $opRoutes = $routes->pluck('name', 'id')->toArray();

        return view('schedule.edit', compact('schedule', 'routes', 'opRoutes'));
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
            'route_id' => 'required'
        ]);

        $schedule = Schedule::find($id);
        $schedule->schedule_number =$request->input('schedule_number');

        $schedule->route_id = $request->input('route_id');
        $route = Route::find($schedule->route_id);
        $schedule->route_name = $route->name;

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
        return $schedule->schedule_number;
        // $schedule->delete();
        return redirect('schedule')->with('success', 'Schedule Deleted');
    }
}
