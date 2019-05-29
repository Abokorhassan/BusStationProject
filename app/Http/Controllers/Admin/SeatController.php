<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seat;
use App\Bus;
use Sentinel;
use Yajra\DataTables\DataTables;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats = Seat::all();
        return view('admin.seat.index', compact('seats'));
    }

    public function data()
    {
       
        $seat = Seat::get(['id', 'bus_number', 'seat_number','created_at']);

        return DataTables::of(Seat::query())
            ->editColumn('created_at', function (Seat $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.seat.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update seat"></i></a>';
                $actions .= '<a href=' . route('admin.seat.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete seat"></i></a>';

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
        $buses = Bus::select('id','bus_number')->get();
        return view('admin.seat.create', compact('buses'));
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
        $seat->bus_id =$request->input('bus_number');
        $bus_id = $seat->bus_id;

        $seat->seat_number =$request->input('seat_number');

        //getting bus_id from bus_number which is a bus_id in the input
        $bus_id = $request->input('bus_number');
        $bus = Bus::find($bus_id);

        // extractinng the matched bus_number and save it to the database with the help of bus id
        $bus_number = $bus->bus_number;
        $seat->bus_number = $bus_number;
        $seat->bus_id =$request->input('bus_number');

        //saving seat number
        $seat->seat_number =$request->input('seat_number');

        $seat->save();

        // getting the number of seat in specific id
        $numberSeat = Bus::find($bus_id)->seat;
        $count = count($numberSeat);
        
        // saving the number of seat in bus
        $b = Bus::find($bus_id);
        $b->number_seats = $count;
        $b->save();
        
        return redirect('admin/seat')->with('success', 'Seat Created');   
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
        return view('admin.seat.edit', compact('seat'));
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

        return redirect('admin/seat')->with('success', 'Seat Updated');
    }

    public function getModalDelete(Seat $seat)
    {
        $model = 'seat';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.seat.delete', ['id' => $seat->id]);
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

        
        return redirect('admin/seat')->with('success', 'Seat Deleted');
    }

}
