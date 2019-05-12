<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accident;
use App\Driver;
use App\Station;
use App\Bus;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class AccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accidents = Accident::all();
        return view('admin.accident.index', compact('accidents'));
    }

    public function data()
    {
        $accident = Accident::get(['id','acc_lat', 'acc_long', 'bus_id', 'driver_id', 'user_id', 'route_id', 'station_id', 'created_at']);

        return DataTables::of(Accident::query())

            ->addColumn('Driver', function(Accident $accident){

                $driverName = null;
                if(isset($accident->driver_id) && $accident->driver && $accident->driver->driver_number) 
                    $driverName = $accident->driver->driver_number;
                return $driverName;
            })

            ->addColumn('Bus', function(Accident $accident){
                $busName = null;
                if(isset($accident->bus_id) && $accident->bus && $accident->bus->bus_number)
                    $busName = $accident->bus->bus_number;
                return $busName;
            })

            ->addColumn('Station', function(Accident $accident){
                $stationName = null;
                if(isset($accident->station) && $accident->station && $accident->station->name)
                    $stationName = $accident->station->name;
                return $stationName;
            })

            ->addColumn('User', function(Accident $accident){
                $UserName = null;
                if(isset($accident->user) && $accident->user && $accident->user->first_name)
                    $UserName = $accident->user->first_name.' '.$accident->user->last_name;
                return $UserName;
            })

            ->editColumn('created_at', function (Accident $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.accident.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Accident"></i></a>';
                $actions .= '<a href=' . route('admin.accident.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete Accident"></i></a>';

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
        $drivers = Driver::select('id','driver_number')->get();
        $stations = Station::select('id','name')->get();
        $buses = Bus::select('id','bus_number')->get();
        return view('admin.accident.create', compact('drivers', 'stations', 'buses'));
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
            'driver_number' => 'required | numeric',
            'bus_number' => 'required | numeric',
            'accident_latitude' => 'required | numeric',
            'accident_longitude' => 'required | numeric',
            'station' => 'required | numeric',
        ]);

        $accident = new Accident();
        $accident->driver_id = $request->input('driver_number');
        $accident->bus_id = $request->input('bus_number');
        $accident->acc_lat = $request->input('accident_latitude');
        $accident->acc_long = $request->input('accident_longitude');
        $accident->user_id = Sentinel::getUser()->id;
        $accident->station_id = $request->input('station'); 
        $accident->save();

        return redirect('admin/accident')->with('success', 'Accident Created');
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
        $accident = Accident::find($id);

        $stations = Station::select('id','name')->get();
        $opStations = $stations->pluck('name', 'id')->toArray();

        $buses = Bus::select('id','bus_number')->get();
        $opBuses = $buses->pluck('bus_number', 'id')->toArray();

        $drivers = Driver::select('id','driver_number')->get();
        $opDrivers = $drivers->pluck('driver_number', 'id')->toArray(); 

        return view('admin.accident.edit', compact('accident', 'stations', 'opStations', 'drivers', 'opDrivers', 'buses', 'opBuses'));
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
            'driver_id' => 'required | numeric',
            'bus_id' => 'required | numeric',
            'accident_latitude' => 'required | numeric',
            'accident_longitude' => 'required | numeric',
            'station_id' => 'required | numeric',
        ]);

        $accident = Accident::find($id);
        $accident->driver_id = $request->input('driver_id');
        $accident->bus_id = $request->input('bus_id');
        $accident->acc_lat = $request->input('accident_latitude');
        $accident->acc_long = $request->input('accident_longitude');
        $accident->station_id = $request->input('station_id'); 
        $accident->save();

        return redirect('admin/accident')->with('success', 'Accident Updated');
        
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
        return redirect('admin/accident')->with('success', 'Accident Deleted');
    }

    public function getModalDelete(Accident $accident)
    {
        $model = 'accident';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.accident.delete', ['id' => $accident->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            // $error = trans('news/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
}
