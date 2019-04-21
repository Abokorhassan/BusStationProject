<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;


use App\Http\Requests\Newsrequest;
use App\News;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Response;
use Sentinel;
use Yajra\DataTables\DataTables;

use App\Http\Controllers\JoshController;
use App\Http\Requests\UserRequest;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Support\Facades\Mail;
use Redirect;
use URL;
use View;
use Validator;
Use App\Mail\Restore;
use stdClass;
use Illuminate\Support\Facades\Storage;
use firstflaravel\Post;
use DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        return view ('admin.tes.index', compact('tests'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #validate
        $this->validate($request, [
            'firstname' => 'required| max:20',
            'lastname' => 'required|max:20',
            'email' => 'bail|required|email|unique:tests'

        ]);

        #save to datase
        $test = new Test();
        $test->first_name = $request->input('firstname');
        $test->last_name = $request->input('lastname');
        $test->email = $request->input('email');
        $test->save();

        #redirect
        return redirect('admin/tests')->with('success', 'Test Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::find($id);
        return view('admin.tes.edit', compact('test'));
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
          #validate
          $this->validate($request, [
            'first_name' => 'required| max:20',
            'last_name' => 'required|max:20',
            'email' => 'bail|required|email'

        ]);

        #save to datase
        $test = Test::find($id);
        $test->first_name = $request->input('first_name');
        $test->last_name = $request->input('last_name');
        $test->email = $request->input('email');
        $test->save();

        #redirect
        return redirect('admin/tests')->with('success', 'Test Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $test = Test::find($id);
        $test->delete();
        return redirect('admin/tests')->with('success', trans('tes/message.success.delete'));


        // if ($test->delete()) {
        //     return redirect('admin/tests')->with('success', trans('tes/message.success.delete'));
        // } else {
        //     return Redirect::route('admin/tests')->withInput()->with('error', trans('tes/message.error.delete'));
        // }
    }

    
    // public function getModelDelete(Test $test) # this is for the table model
    // {
    //     $model = 'tes';
    //     $confirm_route = $error = null;
    //     try {
    //         // $confirm_route = ['admin/tests', $test->id];
    //         // $confirm_route = url('admin/tests', [$test->id]);
    //         $confirm_route = route('admin.tests.destroy', ['id' => $test->id]);
    //         return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
    //     } catch (GroupNotFoundException $e) {

    //         $error = trans('test/message.error.destroy', compact('id'));
    //         return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
    //     }
    // }
}
