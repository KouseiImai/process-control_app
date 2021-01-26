<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production_item;
use App\Models\Lot_number;

class SearchController extends Controller
{
    public function index (Request $request)
    {
        $item_names = Production_item::all();
        $lot_numbers = Lot_number::all();

        return view('search.index',compact('item_names','lot_numbers'));
    }
}
