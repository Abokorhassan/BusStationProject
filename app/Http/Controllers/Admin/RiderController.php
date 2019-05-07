<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rider;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riders = Rider::all();
        return view('admin.rider.index', compact('riders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rider.create'); 
    }

    public function data()
    {
        $rider = Rider::get(['id', 'id_number', 'first_name', 'last_name', 'third_name', 'gender', 'ph_number', 'created_at']);

        return DataTables::of($rider)
            ->editColumn('Full_Name', function (Rider $rider){
                return $rider->first_name.'  '.$rider->last_name.'  '.$rider->third_name;
            })

            ->editColumn('created_at', function (Rider $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.rider.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Rider"></i></a>';
                $actions .= '<a href=' . route('admin.rider.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete Rider"></i></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
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
            'rider_number' => array('required', 'regex:/(Rd_)[0-9]{2,4}$/', 'unique:riders,id_number'),
            'first_name' => 'required | max:50',
            'second_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'ph_number' => array('required', 'numeric', 'regex:/^[0-9]{7}$/', 'unique:riders,ph_number'),
            'gender' => 'required',
        ]);

        $rider = new Rider();
        $rider->id_number = $request->input('rider_number');
        $rider->first_name = $request->input('first_name');
        $rider->last_name = $request->input('second_name');
        $rider->third_name = $request->input('third_name');
        $rider->gender = $request->input('gender');
        $rider->ph_number = $request->input('ph_number');
        $rider->user_id = Sentinel::getUser()->id;
        $rider->save();

        return redirect('admin/rider')->with('success', 'Rider Created');
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
        $rider = Rider::find($id);
        // if(auth()->user()->id !== $bus->user_id){
        //     return redirect('bus')->with('error', 'You\'\re not allowed to edit this');
        // }
        return view('admin.rider.edit', compact('rider'));
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
        $rider = Rider::find($id);
        $check = $rider->ph_number;
        $yo =  $request->input('ph_number');
        $this->validate($request,[
            'first_name' => 'required | max:50',
            'second_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'ph_number' => "required | regex:/^[0-9]{7}$/ | unique:riders,ph_number,$id",
            // 'ph_number' => array('required', 'numeric', 'regex:/^[0-9]{7}$/', 'unique:riders,ph_number'),
            'gender' => 'required',
        ]);


        
        $rider->first_name = $request->input('first_name');
        $rider->last_name = $request->input('second_name');
        $rider->third_name = $request->input('third_name');
        $rider->gender = $request->input('gender');
        $rider->ph_number = $request->input('ph_number');
        $rider->save();

        return redirect('admin/rider')->with('success', 'Rider Updated');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rider = Rider::find($id);
        $rider->delete();
        return redirect('admin/rider')->with('success', 'Rider Deleted');   
    }

    public function getModalDelete(Rider $rider)
    {
        $model = 'rider';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.rider.delete', ['id' => $rider->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            // $error = trans('news/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

}
