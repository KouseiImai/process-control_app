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
        $daily_report = new Daily_report;
        $daily_report->production_num = $request->production_num;
        $daily_report->done_hour = $request->done_hour;
        $daily_report->done_minutes = $request->done_minutes;
        $daily_report->accident_hour = $request->accident_hour;
        $daily_report->accident_minutes = $request->accident_minutes;
        $daily_report->pre_process_hour = $request->pre_process_hour;
        $daily_report->pre_process_minutes = $request->pre_process_minutes;
        $daily_report->report_remarks = $request->report_remarks;
        $daily_report->save();

        $item = Production_item::where('item_name', $request->item_name)->first();
        $item_id = $item->id;
        $item_report_relation = new Item_report_relation;
        $item_report_relation->production_item_id = $item_id;
        $item_report_relation->daily_report_id = $daily_report->id;
        $item_report_relation->save();

        $lot_number = Lot_number::where('lot_number', $request->lot_number)->first();
        $lot_number_id = $lot_number->id;
        $lot_report_relation = new Lotnumber_report_relation;
        $lot_report_relation->lot_number_id = $lot_number_id;
        $lot_report_relation->daily_report_id = $daily_report->id;
        $lot_report_relation->save();


        return view('daily_report.create');
    }
}
