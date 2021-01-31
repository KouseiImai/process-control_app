<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production_item;
use App\Models\Lot_number;
use App\Models\Daily_report;
use App\Models\Item_report_relation;
use App\Models\Lotnumber_report_relation;

class SearchController extends Controller
{
    public function index (Request $request)
    {
        $item_names = Production_item::all();
        $lot_numbers = Lot_number::all();

        return view('search.index',compact('item_names','lot_numbers'));
    }

    public function data_search (Request $request)
    {
        $item       = $request->item_name;
        $lot_number = $request->lot_number;
        $start_date = $request->start_date;
        $end_date   = $request->end_date;

        if ( $start_date != null && $end_date != null )
        {
            $datum = Daily_report::dateStart($start_date)->dateEnd($end_date)->get();
        }else
        {
            $datum = Daily_report::all();
        }
        foreach( $datum as $data )
        {
            $start_date = date('Ymd',strtotime($data->start_date));
            $done_date = date('Ymd',strtotime($data->done_date));
            $difference_date = (int)$done_date - (int)$start_date;
            if( $difference_date == 0 )
            {
                $total_hour = ($data->done_hour) - ($data->start_hour);
                if( $data->start_minutes == 30 && $data->done_minutes == 30 )
                {
                    $total_minutes = 0;
                }else
                {
                    $total_minutes = ($data->done_minutes) + ($data->start_minutes);
                }
            }else
            {
                $total_hour = ($difference_date * 24) - ($data->start_hour) + ($data->done_hour);
                if( $data->start_minutes == 30 && $data->done_minutes == 30 )
                {
                    $total_minutes = 0;
                }else
                {
                    $total_minutes = ($data->start_minutes) + ($data->done_minutes);
                }
            }
            $data['total_hour'] = $total_hour;
            $data['total_minutes'] = $total_minutes;
        }
        return view('search.result',compact('datum'));
    }
}
