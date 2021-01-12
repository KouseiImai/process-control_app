<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot_number;
use App\Models\Process_data;
use App\Models\Production_item;

class Process_registrationController extends Controller
{
    public function new(Request $request)
    {
        $times = config('time');
        return view('process_registration.new')->with(['times' => $times]);
    }

    public function create(Request $request)
    {
        $params = $request->all();
        
        $lot_number = new Lot_number;
        $lot_number->lot_number = $request->lot_number;
        $lot_number->save();

        $production_item = new Production_item;
        $production_item->item_name = $request->item_name;
        $production_item->save();

        $process_data = new Process_data;
        $process_data->start_date = $request->start_date;
        $process_data->start_time = $request->start_time;
        $process_data->end_date = $request->end_date;
        $process_data->end_time = $request->end_time;
        $process_data->save();

        unset($params['_token']);
        return redirect('/');
    }
}
