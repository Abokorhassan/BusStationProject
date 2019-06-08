<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seat;
use App\Station;
use App\User;
use App\Bus;
use Sentinel;

class SeatController extends Controller
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
            $stationseat = Station::find($stations_id)->seat()->paginate(4);
            return view('seat.index')->with('seats',$stationseat);
        }
        $seats = null;  
        return view('seat.index', compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //getting the bus of that station
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
        $buses = Bus::select('id','bus_number')
                    ->where('station_id', $stations_id)
                    ->get();
        return view('seat.create', compact('buses')); 
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
            'bus_number' => 'required | numeric ',
            'seat_number' => 'required | max:15 | unique:seats',
        ]);  

        $seat = new Seat();
        //    bus_id
        $seat->bus_id =$request->input('bus_number');
        $bus_id = $seat->bus_id;

        //    seat_number
        $seat->seat_number =$request->input('seat_number');

        //getting bus_id from bus_number which is a bus_id in the input
        $bus_id = $request->input('bus_number');
        $bus = Bus::find($bus_id);

        // extractinng the matched bus_number and save it to the database with the help of bus id
        $bus_number = $bus->bus_number;
        $seat->bus_number = $bus_number; 

        $seat->station_id = $bus->station_id;
        $seat->bus_id =$request->input('bus_number');

        //saving user _id 
        $seat->user_id = Sentinel::getUser()->id;

        $seat->save();

        // getting the number of seat in specific id
        $numberSeat = Bus::find($bus_id)->seat;
        $count = count($numberSeat);
        
        // saving the number of seat in bus
        $b = Bus::find($bus_id);
        $b->number_seats = $count;
        $b->save();
        
        return redirect('seat')->with('success', 'Seat Created');  
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
        $seat = Seat::find($id);
        return view('seat.edit', compact('seat'));
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
            'seat_number' => 'required | max:15 | unique:seats,seat_number,'.$id,
        ]);

        $seat = Seat::find($id);
        $seat->seat_number = $request->input('seat_number');
        $seat->save();

        return redirect('seat')->with('success', 'Seat Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //getting the bus id from the seat
         $seat = Seat::find($id);
         $bus_id = $seat->bus_id;
         
         // getting the number of seat in specific id
         $numberSeat = Bus::find($bus_id)->seat;
         $count = count($numberSeat);
         
         //deleting one seat also means delete number seat from bus
         $counts = $count-1;
 
         // saving the remaining number of seat in bus
         $b = Bus::find($bus_id);
         $b->number_seats = $counts;
         $b->save();
         // return $counts;
 
         $seat = Seat::find($id);
         $seat->delete();
 
         
         return redirect('seat')->with('success', 'Seat Deleted');
    }
}
