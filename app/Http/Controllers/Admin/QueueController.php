<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Queue;
use App\Schedule;
use App\Bus;
use App\Station;
use Sentinel;
use Yajra\DataTables\DataTables;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queue = Queue::all();
        return view('admin.queue.index', compact('queue'));
    }

    public function data()
    {
        return DataTables::of(Queue::query())

            ->addColumn('Schedule', function(Queue $queue){
                $scheduleName = null;
                if(isset($queue->schedule_id) && $queue->schedule && $queue->schedule->schedule_number)
                    $scheduleName = $queue->schedule->schedule_number;
                return $scheduleName;
            })

            

            ->addColumn('User', function(Queue $queue){
                $userName = null;
                if(isset($queue->user_id) && $queue->user && $queue->user->first_name)
                    $userName = $queue->user->first_name.' '. $queue->user->last_name;
                return $userName;
            })

            ->addColumn('Station', function(Queue $queue){
                $stationName = null;
                if(isset($queue->station_id) && $queue->station && $queue->station->name)
                    $stationName = $queue->station->name;
                return $stationName;
            })

            ->addColumn('Bus', function(Queue $queue){
                $busName = null;
                if(isset($queue->bus_id) && $queue->bus && $queue->bus->bus_number) 
                    $busName = $queue->bus->bus_number;
                return $busName;
            })

            ->editColumn('created_at', function (Queue $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.queue.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update queue"></i></a>';
                $actions .= '<a href=' . route('admin.queue.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete queue"></i></a>';

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
        $stations = Station::select('id','name')->get();
        $schedules = Schedule::select('id','schedule_number')->get();
        $buses = Bus::select('id','bus_number')->get();
        return view('admin.queue.create', compact('stations', 'schedules', 'buses'));  
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
            'schedule_number' => 'required | numeric',
            'station' => 'required | numeric',
            'bus_number' => 'required | numeric | unique:queues,bus_id'
        ]);

        $queue = new Queue();
        $queue->Schedule_id = $request->input('schedule_number');
        $queue->bus_id = $request->input('bus_number');
        $queue->station_id = $request->input('station'); 
        $queue->user_id = Sentinel::getUser()->id;
        $queue->save();

        return redirect('admin/queue')->with('success', 'Bus Added To The Queue');
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
        $queue = Queue::find($id);

        $stations = Station::select('id','name')->get();
        $opStations = $stations->pluck('name', 'id')->toArray();

        $buses = Bus::select('id','bus_number')->get();
        $opBuses = $buses->pluck('bus_number', 'id')->toArray();

        $schedules = Schedule::select('id','schedule_number')->get();
        $opSchedules = $schedules->pluck('schedule_number', 'id')->toArray();

        return view('admin.queue.edit', compact('queue', 'stations', 'opStations', 'schedules', 'opSchedules', 'buses', 'opBuses'));   
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
            'schedule_id' => 'required | numeric',
            'station_id' => 'required | numeric',
            'bus_id' => 'required | numeric | unique:queues,bus_id,'.$id
        ]);

        $queue = Queue::find($id);
        $queue->Schedule_id = $request->input('schedule_id');
        $queue->bus_id = $request->input('bus_id');
        $queue->station_id = $request->input('station_id'); 
        $queue->save();

        return redirect('admin/queue')->with('success', 'Bus in The Queue Has Been Updated');
        
    }

    public function getModalDelete(Queue $queue)
    {
        $model = 'queue';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.queue.delete', ['id' => $queue->id]);
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
        $queue = Queue::find($id);
        $queue->delete();
        return redirect('admin/queue')->with('success', 'Bus Deleted from the Queue');
    }
}
