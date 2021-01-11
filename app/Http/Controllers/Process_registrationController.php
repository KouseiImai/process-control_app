<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Process_registrationController extends Controller
{
    public function new(Request $request)
    {
        $times = config('time');
        return view('process_registration.new')->with(['times' => $times]);
    }
}
