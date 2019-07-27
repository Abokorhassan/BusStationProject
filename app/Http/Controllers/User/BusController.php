<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bus;
use App\Driver;
use App\Station;
use App\User;
use App\Seat;
use Sentinel;
use DB;

class BusController extends Controller
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
            // $stationbus = Station::find($stations_id)->bus()->paginate(3);
            $stationbus = Bus::latest()
                            ->where('station_id', $stations_id)
                            ->paginate(4);
                            // return $stationbus;
            $busLatest = Bus::latest()
                            ->where('station_id', $stations_id)
                            ->get();

            return view('bus.index', compact('busLatest'))->with('buses',$stationbus);
        }

        $buses = null;  
        return view('bus.index', compact('buses'));
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
                $data= DB::table('buses')
                            ->where('station_id', $stations_id)
                            
                            ->where(function($q)use($query){
                                $q->where('model_type', 'like', '%'.$query.'%')
                                ->orWhere('bus_number', 'like', '%'.$query.'%')
                                ->orWhere('driver_number', 'like', '%'.$query.'%')
                                ->orWhere('user_first', 'like', '%'.$query.'%')
                                ->orWhere('user_last', 'like', '%'.$query.'%')
                                ->orWhere('created_at', 'like', '%'.$query.'%');
                            })
                            ->get();
                

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
                                    <a style="margin-left: -3em;text-align: center" href="' .url('bus/' .$row->id ).' ">
                                        <strong > Bus_number No. &nbsp; 
                                        </strong>'.$row->bus_number.'
                                    </a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p>
                                                        <strong>Model: &nbsp; 
                                                        </strong>
                                                        '.$row->model_type.'
                                                    </p>
                                                    <p  class="additional-post-wrap">
                                                        <span class="additional-post">
                                                           
                                                            <i class="fa fa-user"></i>  
                                                            <a href="#">&nbsp;
                                                            '.$row->user_first.'
                                                                
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <a style="margin-left: 5em; " href="' . url('bus/' .$row->id .'/edit') . '">
                                                        <button style=" font-size: 1em; width: 4.5em; height: 2.5em;"  type="button" class="btn btn-success btn-sm">Edit
                                                        </button>
                                                    </a>
                                                </div>
                                                <div  class="col-sm-6">
                                                    <p style="margin-left: -12%">
                                                        <strong>Driver: &nbsp; 
                                                        </strong>
                                                        '.$row->driver_number.' 
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
                        No Bus Lists found
                    </p>
                ';
            }

            $records = array(
                'output'  => $output,
                'buses'  => $data
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

        $busLatest = Bus::latest()
                        ->where('station_id', $stations_id)
                        ->get();

        // $drivers = Driver::select('id','driver_number')
        //             ->where('station_id', $stations_id)
        //             ->get();
        $drivers = DB::table('drivers')->select('id','driver_number')
                    ->whereNotIn('driver_number',function($query) use($station) {
                        $query->select('driver_number')
                        ->from('buses');
                    })
                    ->where('station_id', $stations_id)
                    ->get();

        return view('bus.create', compact('drivers','busLatest')); 
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
            'model_type' => 'required | max:50',
            'bus_number' => 'required | max:50|unique:buses,bus_number',
            'driver_number' => 'nullable | unique:buses,Driver_id',
            
        ]);   
        $bus = new Bus();
        $bus->model_type =$request->input('model_type');    // model type
        $bus->bus_number =$request->input('bus_number');    // bus_number

        $driver_id =$request->input('driver_number');   
        if($driver_id){
            $bus->Driver_id = $driver_id;               // driver_id
            $driver = Driver::find($bus->Driver_id);
            $bus->driver_number = $driver->driver_number;   // driver_number
        }

        $bus->user_id = Sentinel::getUser()->id;  // user_id
        $user = User::find($bus->user_id);
        $bus->user_first = $user->first_name;   // user_first
        $bus->user_last = $user->last_name;     // user_last

        $bus->station_id = $user->station_id;    // station_id
        $station = Station::find($bus->station_id);
        $bus->station_name = $station->name;  // station_name

        $bus->save();

        return redirect('bus')->with('success', 'Bus Created');
        // return Redirect::route('user.bus.index')->with('success', 'Bus Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus = Bus::find($id);
        return view('bus.show',compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Bus::find($id);
        
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;

        $drivers = Driver::whereNotIn('driver_number',Bus::select('driver_number'))
                        ->where('station_id', $stations_id)
                        ->orWhere('driver_number', $bus->driver_number);

        $opDrivers = $drivers->pluck('driver_number', 'id')->toArray();

        $busLatest = Bus::latest()
                        ->where('station_id', $stations_id)
                        ->get();

        return view('bus.edit', compact('bus', 'drivers', 'opDrivers', 'busLatest'));
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
            'bus_number' => 'required | max:50| unique:buses,bus_number,'. $id,
            'Driver_id' => 'nullable | unique:buses,Driver_id,'. $id,
        ]);    
        
        $bus = Bus::find($id);

        $bus->bus_number =$request->input('bus_number');    // bus_number
        $driver_id =$request->input('Driver_id');

        if($driver_id){
            $bus->Driver_id = $driver_id;   // driver_id
            $driver = Driver::find($bus->Driver_id);
            $bus->driver_number = $driver->driver_number;   // driver_number
            // return $bus->driver_number;
        }else{
            $bus->Driver_id = null;
            $bus->driver_number = '';
            // return 'empty';
        }
        
        $bus->save();

        #redirect
        return redirect('bus')->with('success', 'Bus Updated');
    }

    public function getModalDelete(Bus $bus)
    {
        $model = 'bus';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('user.bus.delete', ['id' => $bus->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            // $error = trans('news/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus = Bus::find($id);
        $seats = Bus::find($id)->seat->first();

        if($seats){
            $bus_id = $seats->bus_id;
            Seat::where('bus_id', $bus_id)->delete();
        }else{
            
        }
        $bus->delete();
        return redirect('bus')->with('success', 'Bus Deleted');
    }
}
