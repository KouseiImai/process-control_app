<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Daily_reportRequest;
use App\Models\Lot_number;
use App\Models\Production_item;
use App\Models\Daily_report;
use App\Models\Item_report_relation;
use App\Models\Lotnumber_report_relation;


class Daily_reportController extends Controller
{
    public function new(Request $request) {

        $item_names = Production_item::all();
        $lot_numbers = Lot_number::all();

        return view('daily_report.new',compact('item_names','lot_numbers'));
    }

    public function create(Daily_reportRequest $request) {

        $item         = Production_item::where('item_name', $request->item_name)->first();
        $lot_number   = Lot_number::where('lot_number', $request->lot_number)->first();
        $process_data = $lot_number->process_datas->first();

        $daily_report = new Daily_report;
        $daily_report->production_num   = $request->production_num;
        $daily_report->done_date        = date('Y-m-d');
        $daily_report->start_date       = $process_data->start_date;
        $daily_report->start_hour       = $process_data->start_hour;
        $daily_report->start_minutes    = $process_data->start_minutes;
        $daily_report->done_hour        = $request->done_hour;
        $daily_report->done_minutes     = $request->done_minutes;
        $daily_report->accident_hour    = $request->accident_hour;
        $daily_report->accident_minutes = $request->accident_minutes;
        $daily_report->wait_hour        = $request->wait_hour;
        $daily_report->wait_minutes     = $request->wait_minutes;
        $daily_report->report_remarks   = $request->report_remarks;
        $daily_report->save();

        $item_id = $item->id;
        $item_report_relation = new Item_report_relation;
        $item_report_relation->production_item_id = $item_id;
        $item_report_relation->daily_report_id    = $daily_report->id;
        $item_report_relation->save();

        $lot_number_id = $lot_number->id;
        $lot_report_relation = new Lotnumber_report_relation;
        $lot_report_relation->lot_number_id   = $lot_number_id;
        $lot_report_relation->daily_report_id = $daily_report->id;
        $lot_report_relation->save();


        return view('daily_report.create');
    }
}
