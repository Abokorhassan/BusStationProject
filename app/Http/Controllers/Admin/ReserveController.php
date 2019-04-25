<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reserve;
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
        $reserve = Reserve::get(['id', 'id_number', 'first_name', 'ph_number', 'bus_id', 'station_id', 'user_id', 'created_at']);

        return DataTables::of($reserve)
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
        return view('admin.reserve.create'); 
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
            'id_number' => 'required',
            'first_name' => 'required | max:50',
            'second_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'ph_number' => 'required',
            'user_id' => 'required | numeric',
            'station_id' => 'required | numeric',
            'bus_id' => 'required | numeric'
        ]);

        $reserve = new Reserve();
        $reserve->id_number = $request->input('id_number');
        $reserve->first_name = $request->input('first_name');
        $reserve->last_name = $request->input('second_name');
        $reserve->third_name = $request->input('third_name');
        $reserve->ph_number = $request->input('ph_number');
        $reserve->user_id = $request->input('user_id');
        $reserve->bus_id = $request->input('bus_id');
        $reserve->station_id = $request->input('station_id');
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
        return view('admin.reserve.edit', compact('reserve'));   
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
            'id_number' => 'required',
            'first_name' => 'required | max:50',
            'second_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'ph_number' => 'required',
            'user_id' => 'required | numeric',
            'station_id' => 'required | numeric',
            'bus_id' => 'required | numeric'
        ]);

        $reserve = Reserve::find($id);
        $reserve->id_number = $request->input('id_number');
        $reserve->first_name = $request->input('first_name');
        $reserve->last_name = $request->input('second_name');
        $reserve->third_name = $request->input('third_name');
        $reserve->ph_number = $request->input('ph_number');
        $reserve->user_id = $request->input('user_id');
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
