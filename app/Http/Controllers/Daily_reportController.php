<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Daily_reportController extends Controller
{
    public function new(Request $request) {
        return view('daily_report.new');
    }
}
