<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bus;
use App\Station;
use App\Driver;

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
        // $bus = Bus::get(['id', 'model_type', 'bus_number', 'station_id', 'Driver_id', 'created_at']);
        return DataTables::of(Bus::query())

            ->addColumn('User', function(Bus $bus){
                return $bus->user->first_name;
            })

            ->addColumn('User', function(Bus $bus){
                $userName = null;
                if(isset($bus->user_id) && $bus->user && $bus->user->first_name)
                    $userName = $bus->user->first_name.' '. $bus->user->last_name;
                return $userName;
            })

            ->addColumn('Station', function(Bus $bus){
                $stationName = null;
                if(isset($bus->station) && $bus->station && $bus->station->name)
                    $stationName = $bus->station->name;
                return $stationName;
            })

            ->addColumn('Driver', function(Bus $bus){

                $driverName = null;
                if(isset($bus->Driver_id) && $bus->driver && $bus->driver->driver_number) 
                    $driverName = $bus->driver->driver_number;
                return $driverName;
            })

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
        $drivers = Driver::select('id','driver_number')->get();
        return view('admin.bus.create', compact('stations', 'drivers'));   
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
            'driver_number' => 'required | numeric | unique:buses,Driver_id',
            'station' => 'required | numeric',
        ]);   
        $bus = new Bus();
        $bus->model_type =$request->input('model_type');
        $bus->bus_number =$request->input('bus_number');
        $bus->Driver_id =$request->input('driver_number');
        $bus->station_id =$request->input('station');
        //$bus->user_id = auth()->user()->id;
        $bus->user_id = Sentinel::getUser()->id;

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
        $options = $stations->pluck('name', 'id')->toArray();

        $drivers = Driver::select('id','driver_number')->get();
        $opDrivers = $drivers->pluck('driver_number', 'id')->toArray();
        // $selected = $stations->id;
        return view('admin.bus.edit', compact('bus', 'stations', 'options', 'drivers', 'opDrivers'));
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
            'bus_number' => 'required | max:50|',
            'Driver_id' => 'required | numeric | unique:buses,Driver_id,'. $id,
            'station_id' => 'required | numeric',
        ]);    
        
        $bus = Bus::find($id);
        $bus->bus_number =$request->input('bus_number');
        $bus->Driver_id =$request->input('Driver_id');
        $bus->station_id =$request->input('station_id');
        $bus->save();

        #redirect
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
