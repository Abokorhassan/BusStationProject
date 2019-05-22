<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bus;
use App\Driver;
use App\Station;
use App\User;
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
            $stationbus = Station::find($stations_id)->bus()->paginate(3);
            return view('bus.index')->with('buses',$stationbus);
        }

        $buses = null;  
        return view('bus.index', compact('buses'));
    }

    // public function station(){
    //     $stations = Station::select('id','name')->get();
    //     $id= Sentinel::getUser()->id;
    //     $user = User::find($id);
    //     $s_id = $user->station_id; 
    //     $station = Station::find($s_id);
    //     $stations_id = $station->id;
    //     return $station;
    // }

    public function search(Request $request)
    {
        // return  $availableTags = [
            //     "abokor",
            //     "ActionScript",
            //     "AppleScript",
            //     "Asp",
            //     "BASIC",
            //     "C",
            //     "C++",
            //     "Clojure",
            //     "COBOL",
            //     "ColdFusion",
            //     "Erlang",
            //     "Fortran",
            //     "Groovy",
            //     "Haskell",
            //     "Java",
            //     "JavaScript",
            //     "Lisp",
            //     "Perl",
            //     "PHP",
            //     "Python",
            //     "Ruby",
            //     "Scala",
            //     "Scheme"
        // ];

        $term = $request->term;
        $buses = Bus::where('bus_number', 'LIKE', '%'.$term.'%')->get();
        if(count($buses) == 0){
            $searchResult[] = 'No item found';
        }else {
            foreach($buses as $key => $vlaue){
                $searchResult[] = $vlaue->bus_number;
            }
        }
        return $searchResult;
    }

    public function action(Request $request)
    {
        if($request->ajax()){
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('buses')
                        ->where('id', 'like', '%'.$query.'%')
                        ->orwhere('model_type', 'like', '%'.$query.'%')
                        ->orwhere('bus_number', 'like', '%'.$query.'%')
                        ->orwhere('Driver_id', 'like', '%'.$query.'%')
                        ->orderBy('id', 'desc')
                        ->get();
            }else {
                $data = DB::table('buses')
                        ->orderBy('id', 'desc')
                        ->get();
            }
            $total_row = $data>count();
            if($total_row >0){
                foreach($data as $row){
                    $output = '      
                    <div class="featured-text relative-left">
                        <h3 class="primary"><a href="">'.$row->bus_number.'</a></h3>
                        <p><strong>Driver Number:  </strong>

                            '.$row->driver_id.'
                        </p>
                        <p>
                            <strong>Model:  </strong>
                            '.$row->model_type.'
                        </p>
                        <p class="additional-post-wrap">
                            <span class="additional-post">
                                <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i><a href="#">&nbsp;'.$row->bus_id.'</a>
                            </span>
                            <span class="additional-post">
                                <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i><a href="#"> '.$row->created_at->diffForHumans().' </a>
                            </span>
                        </p>
                    </div>                 
                    ';
                }

            }else {
                $output = '
                <div id="reocrds" class="featured-post-wide thumbnail polaroid ">
                    <div class="featured-text relative-left">
                        Not Data found
                    </div>
                <!-- /.featured-text -->
                </div>
                        
                ';
            }
            $data = array(
                'reocrds'  => $output,
                'total_records' => $output
            );
            echo json_encode($data);
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
        $drivers = Driver::select('id','driver_number')
                    ->where('station_id', $stations_id)
                    ->get();
        return view('bus.create', compact('drivers')); 
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
            'model_type' => 'required | max:50 |',
            'bus_number' => 'required | max:50|unique:buses,bus_number',
            'driver_number' => 'required | numeric | unique:buses,Driver_id',
        ]);   
        $bus = new Bus();
        $bus->model_type =$request->input('model_type');
        $bus->bus_number =$request->input('bus_number');
        $bus->Driver_id =$request->input('driver_number');

        // get station id of the current user 
        $stations = Station::select('id','name')->get();
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
        $bus->station_id = $stations_id;
        
        $bus->user_id = Sentinel::getUser()->id;

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
    public function show()
    {
        return view('bus.show');
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
        $drivers = Driver::select('id','driver_number')
                    ->where('station_id', $stations_id)
                    ->get();
        $opDrivers = $drivers->pluck('driver_number', 'id')->toArray();
        return view('bus.edit', compact('bus', 'drivers', 'opDrivers'));
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
            'Driver_id' => 'required | numeric | unique:buses,Driver_id,'. $id,
            'model_type' => 'required ',
        ]);    
        
        $bus = Bus::find($id);
        $bus->bus_number =$request->input('bus_number');
        $bus->Driver_id =$request->input('Driver_id');
        $bus->model_type =$request->input('model_type');
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
        $bus->delete();
        return redirect('bus')->with('success', 'Bus Deleted');
    }
}
