<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reserve;
use App\Rider;
use App\Bus;
use App\Station;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserves = Reserve::all();
        return view('admin.reserve.index', compact('reserves'));
    }

    public function data()
    {
        // $reserve = Reserve::get(['id', 'id_number', 'first_name', 'ph_number', 'bus_id', 'station_id', 'user_id', 'created_at']);
        return DataTables::of(Reserve::query())
            ->addColumn('Rider', function(Reserve $reserve){
                $riderName = null;
                if(isset($reserve->rider_id) && $reserve->rider && $reserve->rider->first_name)
                    $riderName = $reserve->rider->first_name.' '.$reserve->rider->last_name.' '.$reserve->rider->third_name;
                return $riderName;
            })

            ->addColumn('Bus', function(Reserve $reserve){
                $busName = null;
                if(isset($reserve->bus_id) && $reserve->bus && $reserve->bus->bus_number)
                    $busName = $reserve->bus->bus_number;
                return $busName;
            })

            ->addColumn('Station', function(Reserve $reserve){
                $stationName = null;
                if(isset($reserve->station) && $reserve->station && $reserve->station->name)
                    $stationName = $reserve->station->name;
                return $stationName;
            })

            ->addColumn('User', function(Reserve $reserve){
                $UserName = null;
                if(isset($reserve->user) && $reserve->user && $reserve->user->first_name)
                    $UserName = $reserve->user->first_name.' '.$reserve->user->last_name;
                return $UserName;

            })

            ->editColumn('created_at', function (Reserve $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.reserve.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Reserved Seat"></i></a>';
                $actions .= '<a href=' . route('admin.reserve.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete Reserves Seat"></i></a>';

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
        $riders = Rider::select('id','id_number')->get();
        $stations = Station::select('id','name')->get();
        $buses = Bus::select('id','bus_number')->get();
        return view('admin.reserve.create', compact('riders', 'stations', 'buses')); 
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
            'station' => 'required | numeric',
            'bus_number' => 'required | numeric'
        ]);

        $reserve = new Reserve();
        $reserve->rider_id = $request->input('rider');
        $reserve->bus_id = $request->input('bus_number');
        $reserve->station_id = $request->input('station'); 
        $reserve->user_id = Sentinel::getUser()->id;
        $reserve->save();

        return redirect('admin/reserve')->with('success', 'Seat Reserved');
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
        $stations = Station::select('id','name')->get();
        $opStations = $stations->pluck('name', 'id')->toArray();

        $buses = Bus::select('id','bus_number')->get();
        $opBuses = $buses->pluck('bus_number', 'id')->toArray();

        $riders = Rider::select('id','id_number')->get();
        $opRiders = $riders->pluck('id_number', 'id')->toArray(); 
        return view('admin.reserve.edit', compact('reserve', 'stations', 'opStations', 'riders', 'opRiders', 'buses', 'opBuses'));   
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
            'station_id' => 'required | numeric',
            'bus_id' => 'required | numeric'
        ]);

        $reserve = Reserve::find($id);
        $reserve->rider_id = $request->input('rider_id');
        $reserve->bus_id = $request->input('bus_id');
        $reserve->station_id = $request->input('station_id');
        $reserve->save();

        return redirect('admin/reserve')->with('success', 'Reserved Seat Updated');
    }

    public function getModalDelete(Reserve $reserve)
    {
        $model = 'reserve';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.reserve.delete', ['id' => $reserve->id]);
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
        $reserve = Reserve::find($id);
        $reserve->delete();
        return redirect('admin/reserve')->with('success', 'Reserved Seat Deleted');
    }
}
