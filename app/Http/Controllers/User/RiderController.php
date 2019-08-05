<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rider;
use App\Station;
use Sentinel;
use App\User;
use DB;
use App\Notifications\RiderCreated;
use App\Notifications\RiderDeleted;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riders = Rider::orderBy('created_at','desc')->paginate(4);

        $riderLatest = Rider::latest()
                            ->get();
        return view('rider.index', compact('riders', 'riderLatest'));
    }

    public function liveSearch(Request $request)
    {
      
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data= DB::table('riders')
                                ->where('id', 'like', '%'.$query.'%')
                                ->orWhere('id_number', 'like', '%'.$query.'%')
                                ->orWhere('first_name', 'like', '%'.$query.'%')
                                ->orWhere('last_name', 'like', '%'.$query.'%')
                                ->orWhere('third_name', 'like', '%'.$query.'%')
                                ->orWhere('ph_number', 'like', '%'.$query.'%')
                                ->orWhere('gender', 'like', '%'.$query.'%')
                                ->orWhere('station_name', 'like', '%'.$query.'%')
                                ->orWhere('user_first', 'like', '%'.$query.'%')
                                ->orWhere('user_last', 'like', '%'.$query.'%')
                                ->orWhere('created_at', 'like', '%'.$query.'%')
                                ->orderBy('id', 'desc')
                            ->get();
            }
            else
            {
                $data = DB::table('riders')
                            ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
            
                        <!-- BEGIN FEATURED POST -->
                        <div class="col-sm-6">
                            <div id="reocrds" class="featured-post-wide thumbnail polaroid ">
                       
                                <div class="featured-text relative-left">
                                    <h3 style="text-align: center" class="success">
                                    <a style="margin-left: -3em;text-align: center" href="' .url('rider/' .$row->id ).' ">
                                        <strong > Rider No. &nbsp; 
                                        </strong>'.$row->id_number.'
                                    </a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p style="white-space: nowrap;">
                                                        <strong>Name: &nbsp; 
                                                        </strong>
                                                        '.$row->first_name.' '. $row->last_name.'
                                                    </p>
                                                    <p  class="additional-post-wrap">
                                                        <span class="additional-post">
                                                           
                                                            <i class="fa fa-user"></i>  
                                                            <a href="#">&nbsp;
                                                            '.$row->user_first.' '.$row->user_last.'
                                                                
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <a style="margin-left: 5em; " href="' . url('rider/' .$row->id .'/edit') . '">
                                                        <button style=" font-size: 1em; width: 4.5em; height: 2.5em;"  type="button" class="btn btn-success btn-sm">Edit
                                                        </button>
                                                    </a>
                                                </div>
                                                <div  class="col-sm-6">
                                                    <p style="margin-left: -12%">
                                                        <strong>Phone: &nbsp; 
                                                        </strong>
                                                        '.$row->ph_number.' 
                                                    </p>
                                                    <p style="margin-left: -12%" class="additional-post-wrap">
                                                        <span style="margin-right: -15%" class="additional-post">
                                                            <i class="livicon" data-name="fjs" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de">
                                                            </i>
                                                            <a href="#"> 
                                                                '.$row->ph_number.'                                                                       
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <a style="color: white; margin-left: -2em;" href="javascript:;" data-toggle="modal" onclick="deleteData('.$row->id.')" 
                                                        data-target="#delete_confirm" class="btn btn-danger">
                                                        
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.featured-text -->
                            </div>
                        </div>
                    ';
                }
            }
          
            else
            {
                $output = '
                    <p>
                        No Rider Lists found
                    </p>
                ';
            }

            $records = array(
                'output'  => $output,
                'riders'  => $data
            );

            echo json_encode($records);    
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $riderLatest = Rider::latest()
                        ->get();
        return view('rider.create',  compact('riderLatest')); 
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
        $rider_number = $request->input('rider_number');    // id_number
        $rider->id_number = $rider_number;

        $rider->first_name = $request->input('first_name');     // first_name
        $rider->last_name = $request->input('second_name');     // last_name
        $rider->third_name = $request->input('third_name');     // third_name

        $rider->gender = $request->input('gender');         // gender
        $rider->ph_number = $request->input('ph_number');       // ph_number

        $rider->user_id = Sentinel::getUser()->id;  // user_id
        $user = User::find($rider->user_id);
        $rider->user_first = $user->first_name;   // user_first
        $rider->user_last = $user->last_name;     // user_last

        $rider->station_id = $user->station_id;    // station_id
        $station = Station::find($rider->station_id);
        $rider->station_name = $station->name;  // station_name       

        $rider->save();

        // send notification
        $role_user =  DB::table('role_users')
                            ->select('user_id')
                            ->where('role_id', 1)
                            ->get();

        $user_id = collect($role_user)->pluck('user_id')->toArray();

        $notify_users = User::find($user_id);
        
        foreach ($notify_users as $users) {
            $users->notify(new RiderCreated($user, $rider_number ));
        }

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
        $rider = Rider::find($id);
        return view('rider.show', compact('rider'));
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
        $riderLatest = Rider::latest()
                        ->get();
        return view('rider.edit', compact('rider', 'riderLatest'));
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

        $rider->id_number = $request->input('id_number');      // id_number

        $rider->first_name = $request->input('first_name');     // first_name
        $rider->last_name = $request->input('last_name');       // last_name
        $rider->third_name = $request->input('third_name');     // third_name

        $rider->ph_number = $request->input('ph_number');       // ph_number
        
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

        // send notification
        $rider_number = $rider->id_number;
        $user = User::find($rider->user_id);

        $role_user =  DB::table('role_users')
                            ->select('user_id')
                            ->where('role_id', 1)
                            ->get();

        $user_id = collect($role_user)->pluck('user_id')->toArray();

        $notify_users = User::find($user_id);
        
        foreach ($notify_users as $users) {
            $users->notify(new RiderDeleted($user, $rider_number ));
        }

        return redirect('rider')->with('success', 'Rider Deleted');   
    }
}
