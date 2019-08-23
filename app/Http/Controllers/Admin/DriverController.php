<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Driver;
use App\Station;
use App\Bus;
use App\User;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use File;
use Sentinel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('admin.driver.index', compact('drivers'));
    }

    public function data()
    {
        return DataTables::of(Driver::query())

            ->addColumn('Bus', function(Driver $driver){
                $busName = null;
                if( $driver->bus && $driver->bus->bus_number) 
                    $busName = $driver->bus->bus_number;
                return $busName;
            })

            // ->addColumn('Driver_Number', function(Driver $driver){
            //     $driverName = null;
            //     if(isset($driver->driver_number))
            //         $driverName = $driver->driver_number;
            //     return $driverName;
            // })

            // ->addColumn('Station', function(Driver $driver){
            //     $stationName = null;
            //     if(isset($driver->station) && $driver->station && $driver->station->name)
            //         $stationName = $driver->station->name;
            //     return $stationName;
            // })

            // ->addColumn('User', function(Driver $driver){
            //     $userName = null;
            //     if(isset($driver->user_id) && $driver->user && $driver->user->first_name)
            //         $userName = $driver->user->first_name.' '. $driver->user->last_name;
            //     return $userName;
            // })

            ->editColumn('created_at', function (Driver $createtime) {
                return $createtime->created_at->diffForHumans();
            })
            ->addColumn('actions', function ($user) {
                $actions = '<a href=' . route('admin.driver.edit', $user->id) . '><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update driver"></i></a>';
                $actions .= '<a href=' . route('admin.driver.confirm-delete', $user->id) . ' data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt"
                data-size="18" data-loop="true" data-c="#f56954"
                data-hc="#f56954"
                title="Delete driver"></i></a>';

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
        $driver = Driver::all();
        $stations = Station::select('id','name')->get();
        return view('admin.driver.create', compact('driver', 'stations')); 
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
            'driver_number' => array('required', 'regex:/(Dr_)[0-9]{2,4}$/', 'unique:drivers,driver_number'),
            'firstname' => 'bail|required|regex:/^[a-zA-Z]+$/u|min:4|max:12',
            'second_name' => 'bail|required|regex:/^[a-zA-Z]+$/u|min:4|max:12',
            'third_name' => 'bail|required|regex:/^[a-zA-Z]+$/u|min:4|max:12',
            'email' => 'required | email | unique:drivers',
            // 'genders' => 'required',
            'license_number' => 'bail|required|regex:/^[0-9a-zA-Z]+$/u|min:15|max:25',
            'ph_number' => array('required', 'numeric', 'regex:/^[463]+[0-9]{6}$/', 'unique:drivers,ph_number'),
            'pic_file' => 'nullable | image',
            'station' => 'required | numeric'
        ]);

        $driver = new Driver();
        $driver->driver_number = $request->input('driver_number');  // driver_number

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

        $driver->station_id = $request->input('station');   // station_id
        $station = Station::find($driver->station_id);
        $driver->station_name = $station->name;         // station_name

        // Handle File Upload
        // if($request->hasFile('picture')){
            // // Get filename with extension
            // $filenameWithExt= $request->file('picture')->getClientOriginalName();

            // // Get just filename
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // //Get just ext
            // $extension = $request->file('picture')->getClientOriginalExtension();

            // // File to store
            // $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // // Upload Image
            // $path = $request->file('picture')->storeAs('public/driver', $fileNameToStore);
            // $driver->pic = $fileNameToStore;
        // }

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

        return redirect('admin/driver')->with('success', 'Driver Created');
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
        // if(auth()->user()->id !== $bus->user_id){
        //     return redirect('bus')->with('error', 'You\'\re not allowed to edit this');
        // }

        $stations = Station::select('id','name')->get();
        $opStations = $stations->pluck('name', 'id')->toArray();
        return view('admin.driver.edit', compact('driver', 'stations', 'opStations'));
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
            'first_name' => 'bail|required|regex:/^[a-zA-Z]+$/u|min:4|max:12',
            'last_name' => 'bail|required|regex:/^[a-zA-Z]+$/u|min:4|max:12',
            'third_name' => 'bail|required|regex:/^[a-zA-Z]+$/u|min:4|max:12',
            'email' => 'required | email | unique:drivers,email,'.$id,
            // 'gender' => 'required',
            'license_number' => 'bail|required|regex:/^[0-9a-zA-Z]+$/u|min:15|max:25',
            'station_id' => 'required',
            // 'ph_number' => "required | regex:/^[0-9]{7}$/ | unique:drivers,ph_number,$id",
            'ph_number' => "required|numeric|required | regex:/^[463]+[0-9]{6}$/ | unique:drivers,ph_number,$id",
            'pic' => 'nullable | image'
            
        ]); 

        $driver = Driver::find($id);

        $alreadyStation_id =$driver->station_id;
        // return $station_id;
        $driver->first_name = $request->input('first_name');
        $driver->last_name = $request->input('last_name');
        $driver->third_name = $request->input('third_name');
        $driver->email = $request->input('email');
        $driver->gender = $request->input('gender');
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

        $station_id = $request->input('station_id');
        
        if($alreadyStation_id != $station_id){
            $bus = Driver::find($id)->bus;
            // return $bus;
            if($bus){
                $bus->Driver_id = null;
                $bus->driver_number = '';
                $bus->save();
            }else{

            }
        }
        $driver->station_id = $station_id;
        $station = Station::find($station_id);
        $driver->station_name = $station->name;        
        // return $driver->station_name;
        $driver->save();

        return redirect('admin/driver')->with('success', 'Driver Updated');
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
        return redirect('admin/driver')->with('success', 'Driver Deleted');
    }

    public function getModalDelete(Driver $driver)
    {
        $model = 'driver';
        $confirm_route = $error = null;
        try {
            $confirm_route = route('admin.driver.delete', ['id' => $driver->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            // $error = trans('news/message.error.destroy', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
}
