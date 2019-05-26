<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\Station;
use Sentinel;
use Yajra\DataTables\DataTables;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('admin.schedule.index', compact('schedules'));
    }

    public function data()
    {
        return DataTables::of(Schedule::query())
            ->addColumn('User', function(Schedule $schedule){
                $userName = null;
                if(isset($schedule->user_id) && $schedule->user && $schedule->user->first_name)
                    $userName = $schedule->user->first_name.' '. $schedule->user->last_name;
                return $userName;
            })

            ->addColumn('Station', function(Schedule $schedule){
                $stationName = null;
                if(isset($schedule->station) && $schedule->station && $schedule->station->name)
                    $stationName = $schedule->station->name;
                return $stationName;
            })

            ->editColumn('created_at', function (Schedule $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.schedule.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update schedule"></i></a>';
                $actions .= '<a href=' . route('admin.schedule.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete schedule"></i></a>';

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
        return view('admin.schedule.create', compact('stations')); 
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
            'schedule_number' => array('required', 'regex:/(Sch_[a-z]{2,3})[0-9]{2,4}$/','unique:schedules,schedule_number'),
            'station' => 'required | numeric',
        ]);

        $schedule = new Schedule();
        $schedule->schedule_number =$request->input('schedule_number');
        $schedule->station_id =$request->input('station');
        $schedule->user_id = Sentinel::getUser()->id;

        $schedule->save();

        return redirect('admin/schedule')->with('success', 'Schedule Created');    
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
        $schedule = Schedule::find($id);
        $stations = Station::select('id','name')->get();
        $options = $stations->pluck('name', 'id')->toArray();

        return view('admin.schedule.edit', compact('schedule', 'stations', 'options'));
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
            'schedule_number' => array('required', 'regex:/(Sch_[a-z]{2,3})[0-9]{2,4}$/','unique:schedules,schedule_number,'.$id),
            'station_id' => 'required | numeric',
        ]);

        $schedule = Schedule::find($id);
        $schedule->schedule_number =$request->input('schedule_number');
        $schedule->station_id =$request->input('station_id');

        $schedule->save();

        return redirect('admin/schedule')->with('success', 'Schedule Created');
    }

    public function getModalDelete(Schedule $schedule)
    {
        $model = 'schedule';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.schedule.delete', ['id' => $schedule->id]);
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
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect('admin/schedule')->with('success', 'Schedule Deleted');
    }
}
