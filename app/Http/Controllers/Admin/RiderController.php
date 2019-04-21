<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rider;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_number' => 'required | unique:riders',
            'first_name' => 'required | max:50',
            'second_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'ph_number' => 'required | numeric',
            'gender' => 'required',
            'user_id' => 'required | numeric',
        ]);

        $rider = new Rider();
        $rider->id_number = $request->input('id_number');
        $rider->first_name = $request->input('first_name');
        $rider->last_name = $request->input('second_name');
        $rider->third_name = $request->input('third_name');
        $rider->gender = $request->input('gender');
        $rider->ph_number = $request->input('ph_number');
        $rider->user_id = $request->input('user_id');
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
        $this->validate($request,[
            'id_number' => 'required',
            'first_name' => 'required | max:50',
            'second_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'ph_number' => 'required | numeric',
            'gender' => 'required',
            'user_id' => 'required | numeric',
        ]);

        $rider = Rider::find($id);
        $rider->id_number = $request->input('id_number');
        $rider->first_name = $request->input('first_name');
        $rider->last_name = $request->input('second_name');
        $rider->third_name = $request->input('third_name');
        $rider->gender = $request->input('gender');
        $rider->ph_number = $request->input('ph_number');
        $rider->user_id = $request->input('user_id');
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
        //
    }
}
