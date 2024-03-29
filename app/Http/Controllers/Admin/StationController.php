<?php

namespace App\Http\Controllers\Admin;

use App\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use App\User;
use Yajra\DataTables\DataTables;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $station = Station::all();
        return view('admin.station.index', compact('station'));
    }

    public function data()
    {
        // $station = Station::get(['id', 'name', 'lat', 'long', 'created_at']);

        return DataTables::of(Station::query())

            ->addColumn('User', function(Station $station){
                
                $userName = $station->user_first.' '. $station->user_last;
                return $userName;
            })
            ->editColumn('created_at', function (Station $createtime) {
                return $createtime->created_at->diffForHumans();
            })

            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.station.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update station"></i></a>';
                $actions .= '<a href=' . route('admin.station.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete station"></i></a>';

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
        $Mapstations = Station::all();
        return view('admin.station.create', compact('Mapstations'));   
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
            // 'name' =>  array( 'required', 'regex:/[a-zA-Z]{4,12}$/','min:4', 'max:12'),
            // 'name' => 'bail | required | min:4 | max:25 | unique:stations,name',
            'name' => 'bail|required|regex:/^[a-zA-Z ]+$/u|min:4|max:12| unique:stations,name',

            'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/','numeric'],
            'longitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/','numeric'],
        ]);

        $station = new Station();
        $station->name = $request->input('name');
        $station->lat = $request->input('latitude');
        $station->long = $request->input('longitude');
        // return $station->lat.'--'.$station->long;
        $station->user_id = Sentinel::getUser()->id;

        $user = User::find($station->user_id);

        $station->user_first = $user->first_name;
        $station->user_last = $user->last_name;
        // // return $station->user_first;

        $station->save();

        return redirect('admin/station')->with('success', 'station Created');
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
        $station = Station::find($id);
        return view('admin.station.edit', compact('station'));
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
            // 'name' =>  array('bail', 'required', 'regex:/[a-zA-Z]{4,12}$/','min:4', 'max:12', 'unique:stations,name,.$id'),
            // 'name' => 'bail | required | min:4 | max:25 | unique:stations,name,'.$id,
            'name' => 'bail|required|regex:/^[a-zA-Z ]+$/u|min:4|max:12| unique:stations,name,'.$id,
            'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/','numeric'],
            'longitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/','numeric'],
        ]);

        $station = Station::find($id);
        $station->name = $request->input('name');
        $station->lat = $request->input('latitude');
        $station->long = $request->input('longitude');
        
        $station->save();

        return redirect('admin/station')->with('success', 'station Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $station = Station::find($id);
        $station->delete();
        return redirect('admin/station')->with('success', 'Station Deleted');

    }

    public function getModalDelete(Station $station)
    {
        $model = 'station';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.station.delete', ['id' => $station->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            // $error = trans('news/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
}
