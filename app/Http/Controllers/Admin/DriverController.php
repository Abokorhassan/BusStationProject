<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Driver;

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
}
