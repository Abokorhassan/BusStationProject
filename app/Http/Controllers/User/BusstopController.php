<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Busstop;
use App\Station;
use App\User;
use Sentinel;
use Illuminate\Pagination\LengthAwarePaginator;
class BusstopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        if(!$station == ''){
            $stations_id = $station->id;
            $stationBusstop = Station::find($stations_id)->busstop()->paginate(3);
            return view('busstop.index')->with('busstops',$stationBusstop);
        }
        $busstops = null;  
        return view('busstop.index', compact('busstops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('busstop.create');
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
            'bstop_num' => array('required', 'regex:/(Bsp_)[0-9]{2,4}$/', 'unique:busstops'),
            'name' => 'required | max:25',
            'latitude' => 'required | numeric',
            'longitude' => 'required | numeric',
            // 'route_id' => 'required | numeric',
        ]);

        $busstop = new Busstop();
        $busstop->bstop_num = $request->input('bstop_num');
        $busstop->name = $request->input('name');
        $busstop->lat = $request->input('latitude');
        $busstop->long = $request->input('longitude');
        $busstop->user_id = Sentinel::getUser()->id;
        // $busstop->route_id = $request->input('route_id');

         // get station id of the current user 
         $stations = Station::select('id','name')->get();
         $id= Sentinel::getUser()->id;
         $user = User::find($id);
         $s_id = $user->station_id; 
         $station = Station::find($s_id);
         $stations_id = $station->id;
         $busstop->station_id = $stations_id;
 
        $busstop->save();

        return redirect('busstop')->with('success', 'Bus Stop Created');
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

        return view('busstop.edit', compact('busstop'));    
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
            'bstop_num' => array('required', 'regex:/(Bsp_)[0-9]{2,4}$/', 'unique:busstops,bstop_num,'.$id),
            'name' => 'required | max:25',
            'latitude' => 'required | numeric',
            'longitude' => 'required | numeric',
        ]);

        $busstop = Busstop::find($id);
        $busstop->name = $request->input('name');
        $busstop->lat = $request->input('latitude');
        $busstop->long = $request->input('longitude');
        $busstop->save();

        return redirect('busstop')->with('success', 'Bus Stop Update');
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
        return redirect('busstop')->with('success', 'Bus Stop Deleted');
    }
}
