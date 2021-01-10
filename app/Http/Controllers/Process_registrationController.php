<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Process_registrationController extends Controller
{
    public function new(Request $request)
    {
        return view('process_registration.new');
    }
}
