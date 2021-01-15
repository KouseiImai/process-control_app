<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot_number;
use App\Models\Process_data;
use App\Models\Production_item;
use App\Models\Lotnumber_process_relation;
use App\Models\Item_process_relation;

class Progress_confirmationController extends Controller
{
    public function index(Request $request)
    {
        return view('progress_confirmation.index');
    }
}
