<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Busstop;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class BusstopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $busstops = Busstop::all();
        return view('admin.busstop.index', compact('busstops'));
    }

    public function data()
    {
        $busstop = Busstop::get(['id','bstop_num', 'name', 'lat', 'long', 'user_id', 'route_id', 'station_id', 'created_at']);

        return DataTables::of($busstop)
            ->editColumn('created_at', function (Busstop $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.busstop.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Bus Stop"></i></a>';
                $actions .= '<a href=' . route('admin.busstop.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete Bus Stop"></i></a>';

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
        return view('admin.busstop.create');  
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
            'bstop_num' => 'required | max:25',
            'name' => 'required | max:25',
            'latitude' => 'required | numeric',
            'longitude' => 'required | numeric',
            'user_id' => 'required | numeric',
            'route_id' => 'required | numeric',
            'station_id' => 'required | numeric',
        ]);

        $busstop = new Busstop();
        $busstop->bstop_num = $request->input('bstop_num');
        $busstop->name = $request->input('name');
        $busstop->lat = $request->input('latitude');
        $busstop->long = $request->input('longitude');
        $busstop->user_id = $request->input('user_id');
        $busstop->route_id = $request->input('route_id');
        $busstop->station_id = $request->input('station_id');
        $busstop->save();

        return redirect('admin/busstop')->with('success', 'Bus Stop Created');
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
        $busstop = Busstop::find($id);
        return view('admin.busstop.edit', compact('busstop'));    
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
            'name' => 'required | max:25',
            'latitude' => 'required | numeric',
            'longitude' => 'required | numeric',
            'user_id' => 'required | numeric',
            'route_id' => 'required | numeric',
            'station_id' => 'required | numeric',
        ]);

        $busstop = Busstop::find($id);
        $busstop->name = $request->input('name');
        $busstop->lat = $request->input('latitude');
        $busstop->long = $request->input('longitude');
        $busstop->user_id = $request->input('user_id');
        $busstop->route_id = $request->input('route_id');
        $busstop->station_id = $request->input('station_id');
        $busstop->save();

        return redirect('admin/busstop')->with('success', 'Bus Stop Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $busstop = Busstop::find($id);
        $busstop->delete();
        return redirect('admin/busstop')->with('success', 'Bus Stop Deleted');
 
    }

    public function getModalDelete(Busstop $busstop)
    {
        $model = 'busstop';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.busstop.delete', ['id' => $busstop->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            // $error = trans('news/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
}
