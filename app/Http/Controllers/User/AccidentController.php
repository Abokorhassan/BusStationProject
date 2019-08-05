<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accident;
use App\Station;
use App\User;
use App\Driver;
use App\Bus;
use App\Route;
use Sentinel;
use DB;
use App\Notifications\AccidentAdded;
use App\Notifications\AccidentRemoved;

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
            $stationAccident = Accident::latest()
                                    ->where('station_id', $stations_id)
                                    ->paginate(4);

            $accidentLatest = Accident::latest()
                                    ->where('station_id', $stations_id)
                                    ->get();

            $routes = Route::select('id','name')
                        ->where('station_id', $stations_id)
                        ->get();
            return view('accident.index', compact('accidentLatest', 'routes'))->with('accidents',$stationAccident);
        }
        $accidents = null;  
        return view('accident.index', compact('accidents'));
    }

    public function getId(Request $request)
    {
        $id = $request->id;

        $user_id= Sentinel::getUser()->id;
        $user = User::find($user_id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
       
        $tabAccident = Accident::
                            select('*')
                            ->where('station_id', $stations_id)
                            ->where('route_id', $id)
                            ->latest()
                            ->get();
        $data = $tabAccident;
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
                $data= DB::table('accidents')
                            ->where('station_id', $stations_id)
                            
                            ->where(function($q)use($query){
                                $q->where('id', 'like', '%'.$query.'%')
                                ->orWhere('driver_number', 'like', '%'.$query.'%')
                                ->orWhere('bus_number', 'like', '%'.$query.'%')
                                ->orWhere('acc_lat', 'like', '%'.$query.'%')
                                ->orWhere('acc_long', 'like', '%'.$query.'%')
                                ->orWhere('route_name', 'like', '%'.$query.'%')
                                ->orWhere('user_first', 'like', '%'.$query.'%')
                                ->orWhere('user_last', 'like', '%'.$query.'%')
                                ->orWhere('created_at', 'like', '%'.$query.'%');
                            })
                            ->get();
            }
            else
            {
                $data = DB::table('accidents')
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
                                    <a style="margin-left: -3em;text-align: center" href="' .url('accident/' .$row->id ).' ">
                                        <strong > Bus No. &nbsp; 
                                        </strong>'.$row->bus_number.'
                                    </a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p>
                                                        <strong>Driver: &nbsp; 
                                                        </strong>
                                                        '.$row->driver_number.'
                                                    </p>
                                                    <p  class="additional-post-wrap">
                                                        <span class="additional-post">
                                                           
                                                            <i class="fa fa-user"></i>  
                                                            <a href="#">&nbsp;
                                                            '.$row->user_first.'
                                                                
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <a style="margin-left: 5em; " href="' . url('accident/' .$row->id .'/edit') . '">
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
                        No Accident Lists found
                    </p>
                ';
            }

            $records = array(
                'output'  => $output,
                'accidents'  => $data
            );


            echo json_encode($records);    
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

        $buses = Bus::select('id','bus_number')
                    ->where('station_id', $stations_id)
                    ->whereNotNull('Driver_id')
                    ->get(); 
        $routes = Route::select('id','name')
                    ->where('station_id', $stations_id)
                    ->get();        
        return view('accident.create', compact('buses', 'routes')); 
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
            'route' => 'required | numeric',
            'bus_number' => 'required | numeric',
            'accident_latitude' => 'required | numeric',
            'accident_longitude' => 'required | numeric',
        ]);

        $accident = new Accident();

        $accident->route_id = $request->input('route');     // route_id
        $route = Route::find($accident->route_id);
        $accident->route_name = $route->name;          // route_name

        $accident->bus_id = $request->input('bus_number');     // bus_id
        $bus = Bus::find($accident->bus_id);
        $bus_number = $bus->bus_number;       // bus_number
        $accident->bus_number = $bus_number;

        $accident->driver_id = $bus->Driver_id;       // driver_id
        $accident->driver_number= $bus->driver_number;      // driver_number

        $accident->acc_lat = $request->input('accident_latitude');      // acc_lat
        $accident->acc_long = $request->input('accident_longitude');    // acc_long

        $accident->user_id = Sentinel::getUser()->id;  // user_id
        $user = User::find($accident->user_id);
        $accident->user_first = $user->first_name;   // user_first
        $accident->user_last = $user->last_name;     // user_last

        $accident->station_id = $user->station_id;    // station_id
        $station = Station::find($accident->station_id);
        $accident->station_name = $station->name;  // station_name

        $accident->save();

        // send notification
        $role_user =  DB::table('role_users')
                            ->select('user_id')
                            ->where('role_id', 1)
                            ->get();

        $user_id = collect($role_user)->pluck('user_id')->toArray();

        $notify_users = User::find($user_id);
        
        foreach ($notify_users as $users) {
            $users->notify(new AccidentAdded($user, $bus_number ));
        }

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
        $accident = Accident::find($id);
        return view('accident.show', compact('accident'));
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

        $routes = Route::select('id','name')
                    ->where('station_id', $stations_id)
                    ->get();   
        $opRoutes = $routes->pluck('name', 'id')->toArray();  
        
        return view('accident.edit', compact('buses', 'accident', 'opBuses', 'opRoutes', 'routes')); 
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
            'route_id' => 'required | numeric',
            'bus_id' => 'required | numeric',
            'accident_latitude' => 'required | numeric',
            'accident_longitude' => 'required | numeric',
        ]);

        $accident = Accident::find($id);

        $accident->route_id = $request->input('route_id');     // route_id
        $route = Route::find($accident->route_id);
        $accident->route_name = $route->name;          // route_name

        $accident->bus_id = $request->input('bus_id');     // bus_id
        $bus = Bus::find($accident->bus_id);
        $accident->bus_number = $bus->bus_number;       // bus_number
        $accident->driver_id = $bus->Driver_id;       // driver_id
        $accident->driver_number= $bus->driver_number;      // driver_number
        
        $accident->acc_lat = $request->input('accident_latitude');      // acc_lat
        $accident->acc_long = $request->input('accident_longitude');    // acc_long
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

          // send notification
        $bus_number = $accident->bus_number;
        $user_id= Sentinel::getUser()->id;
        $user = User::find($user_id);
        // return $user;
  
        $role_user =  DB::table('role_users')
                            ->select('user_id')
                            ->where('role_id', 1)
                            ->get();
  
        $user_id = collect($role_user)->pluck('user_id')->toArray();

        $notify_users = User::find($user_id);
        
        foreach ($notify_users as $users) {
            $users->notify(new AccidentRemoved($user, $bus_number ));
        }
        return redirect('accident')->with('success', 'Accident Deleted');
    }
}
