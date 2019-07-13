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
            $stationdriver = Station::find($stations_id)->driver()->paginate(3);
            return view('driver.index')->with('drivers',$stationdriver);
        }
        $drivers = null;  
        return view('driver.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver.create'); 
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
        $driver->driver_number = $request->input('driver_number');
        $driver->first_name = $request->input('firstname');
        $driver->last_name = $request->input('second_name');
        $driver->third_name = $request->input('third_name');
        $driver->email= $request->input('email');
        // return $email;

        // get station id of the current user 
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $driver->station_id = $station->id;;
        $station = Station::find($driver->station_id);
        $driver->station_name = $station->name;

        $driver->gender = 'male';

        $driver->user_id = Sentinel::getUser()->id;
        $user = User::find($driver->user_id);
        $driver->user_first = $user->first_name;
        $driver->user_last = $user->last_name;

       
        //upload image
        if ($file = $request->file('pic_file')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/uploads/drivers/';
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            // $request['pic'] = $safeName;
            $driver->pic = $safeName;
        }
        $driver->license_number = $request->input('license_number');
        $driver->ph_number = $request->input('ph_number');
        $driver->dob = $request->input('dob');
        $driver->address = $request->input('address');
        $driver->save();

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
        $driver = Driver::find($id);
        return view('driver.edit', compact('driver'));
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

        $driver->first_name = $request->input('first_name');
        $driver->last_name = $request->input('last_name');
        $driver->third_name = $request->input('third_name');
        $driver->email = $request->input('email');
        $driver->license_number = $request->input('license_number');
        $driver->ph_number = $request->input('ph_number');

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

        $driver->dob = $request->input('dob');
        $driver->address = $request->input('address');
        
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
        return redirect('driver')->with('success', 'Driver Deleted');
    }
}
