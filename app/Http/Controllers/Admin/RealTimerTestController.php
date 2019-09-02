<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\FormSubmitted;

class RealTimerTestController extends Controller
{
    public function index()
    {
        // return 'abokor';
        return view('admin.realtimers.index');
    }

    public function create()
    {
        return view('admin.realtimers.create');   
    }

    public function store(Request $request)
    {
        
        $text = $request->input('content');
        event(new FormSubmitted($text));
    }
}
