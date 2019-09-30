<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Queue;
use Illuminate\Support\Facades\Input;
use DB;
use App\Bus;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.ReportGenerator.index');
    }

    public static function data()
    {  
        // // $Query = Queue::query();
        // $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        // $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');
        // $bus_number = (!empty($_GET["bus_number"])) ? ($_GET["bus_number"]) : ('');
        // $station_name = (!empty($_GET["station_name"])) ? ($_GET["station_name"]) : ('');
        // $route_name = (!empty($_GET["route_name"])) ? ($_GET["route_name"]) : ('');
        // $schedule_number = (!empty($_GET["schedule_number"])) ? ($_GET["schedule_number"]) : ('');

        // if($start_date && $end_date ){
        //     $start_date = date('Y-m-d', strtotime($start_date));
        //     $end_date = date('Y-m-d', strtotime($end_date));
        //     $Query->whereRaw("date(queues.created_at) >= '" . $start_date . "' AND date(queues.created_at) <= '" . $end_date . "'");
        // }
        // if ($bus_number) {
        //     $Query->whereRaw("queues.bus_number = '".$bus_number. "'");
        // }
		
		// if ($station_name) {
        //     $Query->whereRaw("queues.station_name = '".$station_name. "'");
        // }

        // if ($route_name) {
        //     $Query->whereRaw("queues.route_name = '".$route_name. "'");
        // }

        // if ($schedule_number) {
        //     $Query->whereRaw("queues.schedule_number = '".$schedule_number. "'");
        // }
        
        // $bus = $Query->select('*');
        // return datatables()->of	($bus)
        //     ->make(true);

        $fields = [
            'start_date' => Input::get('start_date'),
            'end_date'    => Input::get('end_date'),
            'bus_number'    => Input::get('bus_number'),
            'station_name'    => Input::get('station_name'),
            'route_name'    => Input::get('route_name'),
            'schedule_number'    => Input::get('schedule_number'),
            'driver_number'    => Input::get('driver_number'),
        ];

        $Query = DB::table('buses') ->join('queues', 'buses.id', '=', 'queues.bus_id')
                // ->select('buses.model_type', 'queues.route_name')
                ->select('queues.id', 'queues.schedule_number', 'queues.route_name', 'queues.station_name',
                    'queues.user_first', 'queues.created_at','queues.bus_number',  'buses.driver_number')
                ->where(function ($query) use($fields) {
                    
                    if($fields['start_date'] && $fields['end_date'] ){
                        $start = date('Y-m-d', strtotime($fields['start_date']));
                        $end = date('Y-m-d', strtotime($fields['end_date']));
                        // $query->whereBetween('created_at',array($start, $end));
                        $query->whereRaw("date(queues.created_at) >= '" . $start . "' AND date(queues.created_at) <= '" . $end . "'");
                    }
                   
                    if ($fields['bus_number']) {
                        $query->where('queues.bus_number', $fields['bus_number']);
                        // $query->whereRaw("queues.bus_number >= '" . $fields['bus_number'] . "'");
                    }

                    if ($fields['driver_number']) {
                        $query->where('buses.driver_number', $fields['driver_number']);
                    }
                    
                    if ($fields['station_name']) {
                        $query->where('queues.station_name', $fields['station_name']);
                    }

                    if ($fields['route_name']) {
                        $query->where('queues.route_name', $fields['route_name']);
                    }

                    if ($fields['schedule_number']) {
                        $query->where('queues.schedule_number', $fields['schedule_number']);
                    }
                })
                ->get();
        // return $Query;
        return datatables()->of	($Query)
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
