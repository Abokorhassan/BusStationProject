<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Queue;

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
        $Query = Queue::query();
        $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');
        $bus_number = (!empty($_GET["bus_number"])) ? ($_GET["bus_number"]) : ('');
        $station_name = (!empty($_GET["station_name"])) ? ($_GET["station_name"]) : ('');
        $route_name = (!empty($_GET["route_name"])) ? ($_GET["route_name"]) : ('');
        $schedule_number = (!empty($_GET["schedule_number"])) ? ($_GET["schedule_number"]) : ('');

        if($start_date && $end_date ){
            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($end_date));
            $Query->whereRaw("date(queues.created_at) >= '" . $start_date . "' AND date(queues.created_at) <= '" . $end_date . "'");
        }
        if ($bus_number) {
            $Query->whereRaw("queues.bus_number = '".$bus_number. "'");
        }
		
		if ($station_name) {
            $Query->whereRaw("queues.station_name = '".$station_name. "'");
        }

        if ($route_name) {
            $Query->whereRaw("queues.route_name = '".$route_name. "'");
        }

        if ($schedule_number) {
            $Query->whereRaw("queues.schedule_number = '".$schedule_number. "'");
        }
        
        $bus = $Query->select('*');
        return datatables()->of	($bus)
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
