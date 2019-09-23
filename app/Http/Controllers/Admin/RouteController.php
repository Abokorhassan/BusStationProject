<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Route;
use App\Station;
use Sentinel;
use App\User;

use Yajra\DataTables\DataTables;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = Route::all();
        return view('admin.routee.index', compact('route'));
    }

    public function data()
    {
        return DataTables::of(Route::query())

            ->editColumn('created_at', function (Route $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.route.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Route"></i></a>';
                $actions .= '<a href=' . route('admin.route.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete Route"></i></a>';

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
        $Mapstations = Station::all();
        return view('admin.routee.create', compact('stations', 'Mapstations'));  
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
            // 'name' =>  array('required', 'regex:/[a-zA-Z]{4,8}$/'),
            // 'name' => 'bail | required | min:4 | max:25 | unique:routes,name',
            'name' => 'bail|required|regex:/^[a-zA-Z ]+$/u|min:4|max:12| unique:stations,name',
            'station' => 'required',
            'path' => 'required',
        ]);

        $route = new Route();

        $route->name = $request->input('name');

        $route->station_id = $request->input('station');
        $station = Station::find($route->station_id);
        $route->station_name = $station->name;   

        $station->user_id = Sentinel::getUser()->id;
        $user = User::find($station->user_id);
        $station->user_first = $user->first_name;
        $station->user_last = $user->last_name; 

        $route->path = $request->input('path');

        $route->save();

        return redirect('admin/route')->with('success', 'Route Created');
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
        $route = Route::find($id);

        $stations = Station::select('id','name')->get();
        $opStations = $stations->pluck('name', 'id')->toArray();
        $Mapstations = Station::all();

        return view('admin.routee.edit', compact('route', 'stations', 'opStations', 'Mapstations'));
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
            // 'name' =>  array('required', 'regex:/[a-zA-Z]{4,8}$/','min:4'),
            // 'name' => 'required | min:4| max:8 | unique:routes,name,'.$id,
            // 'name' => 'bail | required | min:4 | max:25 | unique:routes,name,'.$id,
            'name' => 'bail|required|regex:/^[a-zA-Z ]+$/u|min:4|max:12| unique:routes,name,'.$id,
            'station_id' => 'required',
            'path' => 'required',
        ]); 

        $route = Route::find($id);

        $route->name = $request->input('name');

        $route->station_id = $request->input('station_id');
        $station = Station::find($route->station_id);
        $route->station_name = $station->name;    

        $route->path = $request->input('path');
        $route->save();

        return redirect('admin/route')->with('success', 'Route Updated');
    }

    public function getModalDelete(Route $route)
    {
        $model = 'routee';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.route.delete', ['id' => $route->id]);
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
        $route = Route::find($id);
        $route->delete();
        return redirect('admin/route')->with('success', 'Route Deleted');
    }
}
