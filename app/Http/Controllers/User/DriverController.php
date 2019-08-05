<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Station;
use App\User;
use App\Driver;
use Sentinel;
use File;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Notifications\DriverCreated;
use App\Notifications\DriverDeleted;

class DriverController extends Controller
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
            $stationdriver = Driver::latest()
                                ->where('station_id', $stations_id)
                                ->paginate(4);
            
            $driverLatest = Driver::latest()
                                ->where('station_id', $stations_id)
                                ->get();
            return view('driver.index', compact('driverLatest'))->with('drivers',$stationdriver);
        }
        $drivers = null;  
        return view('driver.index', compact('drivers'));
    }

    public function liveSearch(Request $request)
    {
        $user_id= Sentinel::getUser()->id;
        $user = User::find($user_id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
      
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data= DB::table('drivers')
                            ->where('station_id', $stations_id)
                            
                            ->where(function($q)use($query){
                                $q->where('id', 'like', '%'.$query.'%')
                                ->orWhere('driver_number', 'like', '%'.$query.'%')
                                ->orWhere('first_name', 'like', '%'.$query.'%')
                                ->orWhere('last_name', 'like', '%'.$query.'%')
                                ->orWhere('third_name', 'like', '%'.$query.'%')
                                ->orWhere('dob', 'like', '%'.$query.'%')
                                ->orWhere('ph_number', 'like', '%'.$query.'%')
                                ->orWhere('license_number', 'like', '%'.$query.'%')
                                ->orWhere('address', 'like', '%'.$query.'%')
                                ->orWhere('email', 'like', '%'.$query.'%')
                                ->orWhere('user_first', 'like', '%'.$query.'%')
                                ->orWhere('user_last', 'like', '%'.$query.'%')
                                ->orWhere('created_at', 'like', '%'.$query.'%');
                            })
                            ->get();
                

            }
            else
            {
                $data = DB::table('drivers')
                            ->where('station_id', $stations_id)
                            ->get();
                            // ->paginate(2);
                            // ->toArray();
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
                                    <a style="margin-left: -3em;text-align: center" href="' .url('driver/' .$row->id ).' ">
                                        <strong > Driver No. &nbsp; 
                                        </strong>'.$row->driver_number.'
                                    </a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p>
                                                        <strong>Name: &nbsp; 
                                                        </strong>
                                                        '.$row->first_name.' '. $row->last_name.'
                                                    </p>
                                                    <p  class="additional-post-wrap">
                                                        <span class="additional-post">
                                                           
                                                            <i class="fa fa-user"></i>  
                                                            <a href="#">&nbsp;
                                                            '.$row->user_first.'
                                                                
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <a style="margin-left: 5em; " href="' . url('driver/' .$row->id .'/edit') . '">
                                                        <button style=" font-size: 1em; width: 4.5em; height: 2.5em;"  type="button" class="btn btn-success btn-sm">Edit
                                                        </button>
                                                    </a>
                                                </div>
                                                <div  class="col-sm-6">
                                                    <p style="margin-left: -12%">
                                                        <strong>License: &nbsp; 
                                                        </strong>
                                                        '.$row->license_number.' 
                                                    </p>
                                                    <p style="margin-left: -12%" class="additional-post-wrap">
                                                        <span style="margin-right: -15%" class="additional-post">
                                                        <i class="fa fa-clock-o"></i> &nbsp;  
                                                             <a  href="#"> '. $row->created_at.'
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
                        No Driver Lists found
                    </p>
                ';
            }

            $records = array(
                'output'  => $output,
                'drivers'  => $data
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
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;

        $driverLatest = Driver::latest()
                            ->where('station_id', $stations_id)
                            ->get();
        return view('driver.create', compact('driverLatest')); 
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
            'driver_number' => array('required', 'regex:/(Dr_)[0-9]{2,4}$/','unique:drivers,driver_number'),
            'firstname' => 'required | max:50',
            'second_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'email' => 'required | email | unique:drivers',
            'license_number' => 'required',
            'ph_number' => array('required', 'numeric', 'regex:/^[0-9]{7}$/', 'unique:drivers,ph_number'),
            'pic_file' => 'nullable | image',
        ]);

        $driver = new Driver();

        $driver_number = $request->input('driver_number');  // driver_number
        $driver->driver_number = $driver_number;

        $driver->first_name = $request->input('firstname');     // first_name
        $driver->last_name = $request->input('second_name');    // last_name
        $driver->third_name = $request->input('third_name');    // third_name
        $driver->email= $request->input('email');       // email
        $driver->ph_number = $request->input('ph_number');      // ph_number
        $driver->dob = $request->input('dob');      // dob
        $driver->address = $request->input('address');      // address
        $driver->license_number = $request->input('license_number');    // license_number

        $driver->user_id = Sentinel::getUser()->id;  // user_id
        $user = User::find($driver->user_id);
        $driver->user_first = $user->first_name;   // user_first
        $driver->user_last = $user->last_name;     // user_last

        $driver->station_id = $user->station_id;    // station_id
        $station = Station::find($driver->station_id);
        $driver->station_name = $station->name;  // station_name

       
        //upload image
        if ($file = $request->file('pic_file')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/uploads/drivers/';
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            // $request['pic'] = $safeName;
            $driver->pic = $safeName;
        }
        
        $driver->save();

        // send notification
        $role_user =  DB::table('role_users')
                            ->select('user_id')
                            ->where('role_id', 1)
                            ->get();

        $user_id = collect($role_user)->pluck('user_id')->toArray();

        $notify_users = User::find($user_id);
        
        foreach ($notify_users as $users) {
            $users->notify(new DriverCreated($user, $driver_number ));
        }

        return redirect('driver')->with('success', 'Driver Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);
        return view('driver.show',compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);

        $user_id = Sentinel::getUser()->id;
        $user = User::find($user_id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;

        $driverLatest = Driver::latest()
                            ->where('station_id', $stations_id)
                            ->get();
        return view('driver.edit', compact('driver', 'driverLatest'));
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
        $driver = Driver::find($id);
        $this->validate($request,[
            'first_name' => 'required | max:50',
            'last_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'email' => 'required | email | unique:drivers,email,'.$id,
            'license_number' => 'required',
            'ph_number' => "required | regex:/^[0-9]{7}$/ | unique:drivers,ph_number,$id",
            'pic' => 'nullable | image'
            
        ]);

        $driver->first_name = $request->input('first_name');    // first_name
        $driver->last_name = $request->input('last_name');      // last_name
        $driver->third_name = $request->input('third_name');    // third_name
        $driver->email = $request->input('email');      // email
        $driver->license_number = $request->input('license_number');    // license_number
        $driver->ph_number = $request->input('ph_number');      // ph_number
        $driver->dob = $request->input('dob');         //  dob
        $driver->address = $request->input('address');      // address

           // is new image uploaded?
        if ($file = $request->file('pic')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/uploads/drivers/';
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            //delete old pic if exists
            if (File::exists($destinationPath . $driver->pic)) {
                File::delete($destinationPath . $driver->pic);
            }
            //save new file path into db
            $driver->pic = $safeName;
        }
        
        $driver->save();

        return redirect('driver')->with('success', 'Driver Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);
        if($driver->pic){
            Storage::disk('local')->delete('public/driver/'.$driver->pic);
        }
        $bus = Driver::find($id)->bus;
        // return $bus;
        if($bus){
            $bus->Driver_id = null;
            $bus->driver_number = '';
            $bus->save();
        }else{

        }

        $driver->delete();

        // send notification
        $driver_number = $driver->driver_number;
        $user = User::find($driver->user_id);

        $role_user =  DB::table('role_users')
                            ->select('user_id')
                            ->where('role_id', 1)
                            ->get();

        $user_id = collect($role_user)->pluck('user_id')->toArray();

        $notify_users = User::find($user_id);
        
        foreach ($notify_users as $users) {
            $users->notify(new DriverDeleted($user, $driver_number ));
        }
        return redirect('driver')->with('success', 'Driver Deleted');
    }
}
