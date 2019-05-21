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
            'genders' => 'required',
            'license_number' => 'required',
            'ph_number' => array('required', 'numeric', 'regex:/^[0-9]{7}$/', 'unique:riders,ph_number'),
            'picture' => 'nullable | image',
        ]);

        $driver = new Driver();
        $driver->driver_number = $request->input('driver_number');
        $driver->first_name = $request->input('firstname');
        $driver->last_name = $request->input('second_name');
        $driver->third_name = $request->input('third_name');
        $driver->email = $request->input('email');
        $driver->gender = $request->input('genders');

        // get station id of the current user 
        $stations = Station::select('id','name')->get();
        $id= Sentinel::getUser()->id;
        $user = User::find($id);
        $s_id = $user->station_id; 
        $station = Station::find($s_id);
        $stations_id = $station->id;
        $driver->station_id = $stations_id;

        $driver->user_id = Sentinel::getUser()->id;

        // Handle File Upload
        if($request->hasFile('picture')){
            // Get filename with extension
            $filenameWithExt= $request->file('picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('picture')->getClientOriginalExtension();

            // File to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('picture')->storeAs('public/driver', $fileNameToStore);
            $driver->pic = $fileNameToStore;
        }
        $driver->pic = null;
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
            'driver_number' => array('required', 'regex:/(Dr_)[0-9]{2,4}$/', 'unique:drivers,driver_number,'.$id),
            'first_name' => 'required | max:50',
            'last_name' => 'required | max:50',
            'third_name' => 'required | max:50',
            'email' => 'required | email | unique:drivers,email,'.$id,
            'license_number' => 'required',
            'ph_number' => "required | regex:/^[0-9]{7}$/ | unique:drivers,ph_number,$id",
            'pic' => 'nullable | image'
            
        ]);
        $driver->driver_number = $request->input('driver_number');
        $driver->first_name = $request->input('first_name');
        $driver->last_name = $request->input('last_name');
        $driver->third_name = $request->input('third_name');
        $driver->email = $request->input('email');
        $driver->license_number = $request->input('license_number');
        $driver->ph_number = $request->input('ph_number');

        if($request->hasFile('pic')){
            $dir = 'public/driver/';
            if($driver->pic != '' && File::exists($dir . $driver->pic))
                // File::delete($dir . $driver->pic);
                Storage::disk('local')->delete('public/driver/'. $driver->pic); 

            //  Get filename with extension
            $filenameWithExt= $request->file('pic')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('pic')->getClientOriginalExtension();

            // File to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('pic')->storeAs('public/driver', $fileNameToStore);

            $driver->pic = $fileNameToStore;
        } elseif ($request->remove == 1 && File::exists('public/driver/' . $driver->pic)) {
            Storage::disk('local')->delete('public/driver/'. $driver->pic); 
            $driver->pic = null;
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
        $driver->delete();
        return redirect('driver')->with('success', 'Driver Deleted');
    }
}
