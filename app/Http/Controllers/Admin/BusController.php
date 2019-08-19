<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bus;
use App\Station;
use App\Driver;
use App\Seat;
use App\User;
use DB;

use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $buses = Bus::all();
        return view('admin.bus.index', compact('buses'));
    }

    public function data()
    {
        return DataTables::of(Bus::query())
            // ->addColumn('User', function(Bus $bus){
            //     $userName = null;
            //     if(isset($bus->user_id) && $bus->user && $bus->user->first_name)
            //         $userName = $bus->user->first_name.' '. $bus->user->last_name;
            //     return $userName;
            // })

            // ->addColumn('Station', function(Bus $bus){
            //     $stationName = null;
            //     if(isset($bus->station) && $bus->station && $bus->station->name)
            //         $stationName = $bus->station->name;
            //     return $stationName;
            // })

            // ->addColumn('Driver', function(Bus $bus){

            //     $driverName = null;
            //     if(isset($bus->Driver_id) && $bus->driver && $bus->driver->driver_number) 
            //         $driverName = $bus->driver->driver_number;
            //     return $driverName;
            // })

            ->editColumn('created_at', function (Bus $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.bus.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update bus"></i></a>';
                $actions .= '<a href=' . route('admin.bus.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete bus"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::select('id','name')->get();
        return view('admin.bus.create', compact('stations'));   
    }

    public function getDriverStation(Request $request)
    {
        $station = Station::find($request->id); 
        $stations_id = $station->id;
        $drivers = DB::table('drivers')->select('id','driver_number')
                    ->whereNotIn('id',function($query) use($stations_id) {
                        $query->select('Driver_id')
                        ->where('station_id', $stations_id)
                        ->from('buses');
                    })

                    ->where('station_id', $stations_id)
                    ->get();
        // $drivers = Driver::select('id','driver_number')
        //                 ->whereRaw('driver_number not in (select driver_number from buses)  AND station_id = ?', [$station])->get();
        $data = $drivers;
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
            'model_type' => 'required | max:50',
            'bus_number' => 'required | max:50|unique:buses',
            'number_seats' => 'required | numeric',
            'driver_number' => 'unique:buses,Driver_id',
            'station' => 'required | numeric',
        ]); 

        $bus = new Bus();
        $bus->model_type =$request->input('model_type'); // modal type
        $bus->bus_number =$request->input('bus_number'); // bus_number
        $bus->number_seats =$request->input('number_seats'); // number_seats

        $driver_id =$request->input('driver_number');
        
        if($driver_id){
            $bus->Driver_id = $driver_id;       // driver_id
            $driver = Driver::find($bus->Driver_id);
            $bus->driver_number = $driver->driver_number;       // driver_number
        }

        $bus->station_id =$request->input('station');       // station_id
        $station = Station::find($bus->station_id);
        $bus->station_name = $station->name;        // station_name

        $user_id = Sentinel::getUser()->id;  // user_id
        $bus->user_id = $user_id;
        $user = User::find($user_id);
        $bus->user_first = $user->first_name;   // user_first
        $bus->user_last = $user->last_name;     // user_last

        $bus->save();

        return redirect('admin/bus')->with('success', 'Bus Created');
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
        $bus = Bus::find($id);

        $stations = Station::select('id','name')->get();
        $station = $bus->station_id;
        $driver_number = $bus->driver_number;
        $options = $stations->pluck('name', 'id')->toArray();

        $driver = Driver::select('id','driver_number')
                    ->where('station_id', $station)
                    ->get();
                

        // $drivers = Driver::select('drivers.*')
        //                 ->leftJoin('buses', 'drivers.id', '=', 'buses.Driver_id')
        //                 ->whereNull('buses.id')
        //                 ->where('drivers.id', '!=', $bus->Driver_id)
        //                 ->where('drivers.station_id', $station)
        //                 ->get();

        // $drivers = DB::table('drivers')->select('id','driver_number')
        //             ->whereNotIn('driver_number',function($query) use($station) {
        //                 $query->select('driver_number')
        //                 ->from('buses')
        //                 ->where('station_id', $station);
        //             })
        //             ->where('driver_number', $bus->driver_number)
        //             ->where('station_id', $station)
        //             ->get();

        // $drivers = Driver::whereRaw('id not in (select Driver_id from buses) OR id = ?', [$bus->Driver_id])->get();

        // $drivers = Driver::whereRaw('driver_number not in (select driver_number from buses) OR driver_number = ?', [$bus->driver_number])
        //                 ->get();

        // $drivers = Driver::whereRaw('driver_number not in (select driver_number from buses) AND station_id = ?', [$station],' OR driver_number  = ? ', [$bus->driver_number])
        //                 ->get();

        // $drivers = \DB::select(\DB::raw("SELECT * FROM drivers where driver_number NOT IN (SELECT driver_number FROM buses) OR driver_number = '.$bus->driver_number.'"));                    
       
        // $drivers = DB::table('drivers d')
        //             ->where(function($query1) {
        //                 return $query1
        //                     ->whereNotExists(function ($query2) {
        //                         $query2->select(DB::raw(1))
        //                             ->from('buses b')
        //                             ->whereRaw('d.driver_number = b.driver_number');
        //                     })
        //                     ->where('station_id', '=', '2');
        //             })
        //             ->orWhere('driver_number', '=', 'Dr_02')
        //         ->get();

        $drivers = Driver::whereNotIn('driver_number',Bus::select('driver_number'))
                        ->where('station_id', $station)
                        ->orWhere('driver_number', $bus->driver_number);

        $opDrivers = $drivers->pluck('driver_number', 'id')->toArray();
        return view('admin.bus.edit', compact('bus', 'stations', 'options', 'drivers', 'opDrivers'));
    }

    public function getDriverStationE(Request $request)
    {   
        if($request->ajax()){
            $station = Station::find($request->id); 
            $stations_id = $station->id;
            $drivers = DB::table('drivers')->select('id','driver_number')
                        ->where('station_id', $stations_id)
                        ->get();
            $opDrivers = $drivers->pluck('driver_number', 'id')->toArray();
            $data = view('admin.bus.show',compact('opDrivers'))->render();
    		return response()->json(['options'=>$data]);
        }
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
            'bus_number' => 'required | max:50|  unique:buses,bus_number,'. $id,
            'number_seats' => 'required | numeric',
            'Driver_id' => 'unique:buses,Driver_id,'. $id,
            'station_id' => 'nullable | required | numeric',
        ]);  
        $bus = Bus::find($id);  
        $station_id = $bus->station_id;

        $bus->bus_number =$request->input('bus_number');    // bus_number
        $bus->number_seats =$request->input('number_seats');    //number_seats
        $bus->station_id =$request->input('station_id');    // station_id
        $station = Station::find($bus->station_id);
        $bus->station_name = $station->name;        // station_name


        $driver_id = $request->input('Driver_id');

        if($station_id != $bus->station_id)
        {
            $driver = Driver::find($driver_id);
            if($driver_id){
                //Saving the driver
                $bus->Driver_id = $driver_id;       // driver_id
                $driver = Driver::find($bus->Driver_id);
                $bus->driver_number = $driver->driver_number;   // driver_number

                // Saving the station of the driver
                $driver->station_id = $bus->station_id ;
                $driver->station_name = $bus->station_name;
                $driver->save();
            }else{

            }
        }else{
            $driver = Driver::find($driver_id);
            if($driver_id){
                $bus->Driver_id = $driver_id;       // driver_id
                $driver = Driver::find($bus->Driver_id);
                $bus->driver_number = $driver->driver_number;      // driver_number
            }else{

            }
        }

        

        $bus->save();
        return redirect('admin/bus')->with('success', 'Bus Updated');
        
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
        return redirect('admin/bus')->with('success', 'Bus Deleted');
    }

    public function getModalDelete(Bus $bus)
    {
        $model = 'bus';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.bus.delete', ['id' => $bus->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            // $error = trans('news/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
}
