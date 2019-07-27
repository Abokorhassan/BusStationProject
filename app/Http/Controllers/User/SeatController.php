<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seat;
use App\Station;
use App\User;
use App\Bus;
use Sentinel;
use Illuminate\Validation\Rule;
use ValidatesRequests;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $id= Sentinel::getUser()->id;
    //     $user = User::find($id);
    //     $s_id = $user->station_id; 
    //     $station = Station::find($s_id);
    //     if(!$station == ''){
    //         $stations_id = $station->id;
    //         $stationseat = Station::find($stations_id)->seat()->paginate(4);
    //         return view('seat.index')->with('seats',$stationseat);
    //     }
    //     $seats = null;  
    //     return view('seat.index', compact('seats'));
    // }

    public function showBusSeats($id)
    {
        $seats = Seat::latest()
                    ->where('bus_id', $id)
                    ->get();
        $bus = Bus::find($id);
        return view('seat.index', compact('seats','bus'));

    }
    public function createBusSeats($id)
    {
        $bus = Bus::find($id);
        return view('seat.create', compact('bus'));

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
        $bus =$request->input('bus_number');
        $this->validate($request,[
            'bus_number' => 'required | numeric ',
            'seat_number' => [
                'required',
                'max:15',
                Rule::unique('seats')->where(function ($query) use($bus) {
                    return $query->where('bus_id', $bus);
                })
            ]

            
        ]);  

        $seat = new Seat();
        //    bus_id
        $seat->bus_id =$request->input('bus_number');   // bus_id
        $bus_id = $seat->bus_id;
        $buss = Bus::find($bus_id);
        $seat->bus_number = $buss->bus_number;     //bus_number   

        $seat->seat_number = $request->input('seat_number'); // seat_number


        $seat->user_id = Sentinel::getUser()->id;  // user_id
        $user = User::find($seat->user_id);
        $seat->user_first = $user->first_name;   // user_first
        $seat->user_last = $user->last_name;     // user_last

        $seat->station_id = $user->station_id;    // station_id
        $station = Station::find($bus->station_id);
        $bus->station_name = $station->name;  // station_name

        $seat->save();

        // getting the number of seat in specific id
        $numberSeat = Bus::find($bus_id)->seat;
        $count = count($numberSeat);
        
        // saving the number of seat in bus
        $b = Bus::find($bus_id);
        $b->number_seats = $count;
        $b->save();

        $seats = Seat::latest()
                    ->where('bus_id', $bus_id )
                    ->get();
        $bus = Bus::find($bus_id );

        return view('seat.index', compact('seats','bus'))->with('success', 'Seat Created');

        
        // return redirect('seat', compact('seats','bus'))->with('success', 'Seat Created');  
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
        $bus = Seat::find($id)->bus;
        
        return view('seat.edit', compact('seat', 'bus'));
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
        $seat = Seat::find($id);
        $buss_id = $seat->bus_id;
        $this->validate($request,[
            // 'seat_number' => 'required | max:15 | unique:seats,seat_number,'.$id,
            'seat_number' => [
                'required',
                'max:15',
                Rule::unique('seats')->where(function ($query) use($buss_id) {
                                            return $query->where('bus_id', $buss_id);
                                        })
                                        ->ignore($id)
            ]
        ]);

        
        $seat->seat_number = $request->input('seat_number');
        $seat->save();
        
        $bus = Seat::find($seat->id)->bus;
        $bus_id = $bus->id;
        $seats = Seat::latest()
                    ->where('bus_id', $bus_id )
                    ->get();
        $bus = Bus::find($bus_id );

        return view('seat.index', compact('seats','bus'))->with('success', 'Seat Created');

        // return redirect('seat')->with('success', 'Seat Updated');
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
 
         
        $bus = Bus::find($bus_id);
        $bus_id = $bus->id;
        $seats = Seat::latest()
                    ->where('bus_id', $bus->id)
                    ->get();
        // return $seats;
        return view('seat.index', compact('seats','bus'))->with('success', 'Seat Deleted');
    }
}
