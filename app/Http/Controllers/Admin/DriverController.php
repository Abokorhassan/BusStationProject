<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Driver;

use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('admin.driver.index', compact('drivers'));
    }

    public function data()
    {
        $driver = Driver::get(['id', 'first_name', 'last_name', 'email', 'ph_number', 'license_number', 'created_at']);

        return DataTables::of($driver)
            ->editColumn('created_at', function (Driver $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.driver.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update driver"></i></a>';
                $actions .= '<a href=' . route('admin.driver.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete driver"></i></a>';

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
        return view('admin.driver.create'); 
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
            'first_name' => 'required | max:50',
            'second_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'email' => 'required | email | unique:drivers',
            'gender' => 'required',
            'license_number' => 'required',
            'ph_number' => 'required | numeric'
        ]);

        $driver = new Driver();
        $driver->first_name = $request->input('first_name');
        $driver->last_name = $request->input('second_name');
        $driver->third_name = $request->input('third_name');
        $driver->email = $request->input('email');
        $driver->gender = $request->input('gender');
        $driver->license_number = $request->input('license_number');
        $driver->ph_number = $request->input('ph_number');
        $driver->save();

        return redirect('admin/driver')->with('success', 'Driver Created');
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
        $driver = Driver::find($id);
        // if(auth()->user()->id !== $bus->user_id){
        //     return redirect('bus')->with('error', 'You\'\re not allowed to edit this');
        // }
        return view('admin.driver.edit', compact('driver'));
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
            'first_name' => 'required | max:50',
            'last_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'email' => 'required | email',
            'gender' => 'required',
            'license_number' => 'required',
            'ph_number' => 'required | numeric'
        ]);

        $driver = Driver::find($id);
        $driver->first_name = $request->input('first_name');
        $driver->last_name = $request->input('last_name');
        $driver->third_name = $request->input('third_name');
        $driver->email = $request->input('email');
        $driver->gender = $request->input('gender');
        $driver->license_number = $request->input('license_number');
        $driver->ph_number = $request->input('ph_number');
        $driver->save();

        return redirect('admin/driver')->with('success', 'Driver Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);
        $driver->delete();
        return redirect('admin/driver')->with('success', 'Driver Deleted');
    }

    public function getModalDelete(Driver $driver)
    {
        $model = 'driver';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.driver.delete', ['id' => $driver->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            // $error = trans('news/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
}
