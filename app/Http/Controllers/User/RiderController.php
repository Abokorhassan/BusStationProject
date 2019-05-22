<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rider;
use App\Station;
use Sentinel;
use App\User;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riders = Rider::orderBy('created_at','desc')->paginate(3);
        return view('rider.index', compact('riders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rider.create'); 
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

        // get station id of the current user 
        $stations = Station::select('id','name')->get();
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
        $rider->station_id = $stations_id;

        $rider->save();

        return redirect('rider')->with('success', 'Rider Created');
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
        return view('rider.edit', compact('rider'));
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
        $this->validate($request,[
            'id_number' => array('required', 'regex:/(Rd_)[0-9]{2,4}$/', 'unique:riders,id_number,'.$id),
            'first_name' => 'required | max:50',
            'last_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'ph_number' => "required | regex:/^[0-9]{7}$/ | unique:riders,ph_number,$id",
        ]);

        $rider->id_number = $request->input('id_number');
        $rider->first_name = $request->input('first_name');
        $rider->last_name = $request->input('last_name');
        $rider->third_name = $request->input('third_name');
        $rider->ph_number = $request->input('ph_number');
        $rider->save();

        return redirect('rider')->with('success', 'Rider Updated');    
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
        return redirect('rider')->with('success', 'Rider Deleted');   
    }
}
