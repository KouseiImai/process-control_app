<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot_number;
use App\Models\Production_item;

class Daily_reportController extends Controller
{
    public function new(Request $request) {

        $item_names = Production_item::all();
        $lot_numbers = Lot_number::all();

        return view('daily_report.new',compact('item_names','lot_numbers'));
    }
}
