<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Process_registrationRequest;
use App\Models\Lot_number;
use App\Models\Process_data;
use App\Models\Production_item;
use App\Models\Lotnumber_process_relation;
use App\Models\Item_process_relation;

class Process_registrationController extends Controller
{
    public function new(Request $request)
    {
        $times = config('time');
        return view('process_registration.new')->with(['times' => $times]);
    }

    public function create(Process_registrationRequest $request)
    {
        $lot_number = new Lot_number;
        $lot_number->lot_number = $request->lot_number;
        $lot_number->save();

        $production_item = new Production_item;
        $production_item->item_name = $request->item_name;
        $production_item->save();

        $process_data = new Process_data;
        $process_data->start_date = $request->start_date;
        $process_data->start_hour = $request->start_hour;
        $process_data->start_minutes = $request->start_minutes;
        $process_data->end_date = $request->end_date;
        $process_data->end_hour = $request->end_hour;
        $process_data->end_minutes = $request->end_minutes;
        $process_data->process_remarks = $request->process_remarks;
        $process_data->save();

        $lot_process_relation = new Lotnumber_process_relation;
        $lot_process_relation->lot_number_id = $lot_number->id;
        $lot_process_relation->process_data_id = $process_data->id;
        $lot_process_relation->save();

        $item_process_relation = new Item_process_relation;
        $item_process_relation->production_item_id = $production_item->id;
        $item_process_relation->process_data_id = $process_data->id;
        $item_process_relation->save();

        unset($request['_token']);
        return redirect('/');
    }
}
