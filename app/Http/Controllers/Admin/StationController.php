<?php

namespace App\Http\Controllers\Admin;

use App\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.station.create');   
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
            'name' => 'required | max:25',
            'latitude' => 'required | numeric',
            'longitude' => 'required | numeric',
        ]);

        $station = new Station();
        $station->name = $request->input('name');
        $station->lat = $request->input('latitude');
        $station->long = $request->input('longitude');
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
        // if(auth()->user()->id !== $bus->user_id){
        //     return redirect('bus')->with('error', 'You\'\re not allowed to edit this');
        // }
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
            'name' => 'required | max:25',
            'latitude' => 'required | numeric',
            'longitude' => 'required | numeric',
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
}
