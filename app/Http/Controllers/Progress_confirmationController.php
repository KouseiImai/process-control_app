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
        $now_time = date("H");
        $to_day = date("Y-m-d");
        $datum = Process_data::StartDate($to_day)->EndDate($to_day)->get();
        foreach( $datum as $data )
        {
            if( $data->start_date == $data->end_date )
            {
                if( $data->start_hour <= $now_time )
                {
                    $progress_rate = floor((($now_time - $data->start_hour) / ( $data->end_hour - $data->start_hour )) * 100);
                }else
                {
                    $progress_rate = '--';
                }
            }else
            {
                if( $data->start_hour <= $now_time )
                {
                    $start_month = date('m',strtotime($data->start_date));
                    $start_day = date('d', strtotime($data->start_date));
                    $end_month = date('m',strtotime($data->end_date));
                    $end_day = date('d',strtotime($data->end_date));
                    $to_day = date('d');
                    if( $start_month == $end_month)
                    {
                        $difference_date = (int)$end_day - (int)$start_day;
                    }else
                    {
                        $start_month_days = date('t', strtotime($start_month));
                        $start_day = (int)$start_month_days - (int)$start_day;
                        $difference_date =  (int)$start_day + (int)$end_day;
                    }
                    if( $start_day == $to_day )
                    {
                        $progress_rate = floor((($now_time - $data->start_hour) / ( ($difference_date * 24) - $data->start_hour + $data->end_hour )) * 100);
                    }else
                    {
                        $difference_day = $to_day - $start_day;
                        $progress_rate = floor(((($difference_day * 24) - $data->start_hour + $now_time) / ( ($difference_date * 24) - $data->start_hour + $data->end_hour )) * 100);
                    }
                }else
                {
                    $progress_rate = '--';
                }
            }
            $data['progress_rate'] = $progress_rate;
            $data['start_day'] = $start_day;
            $data['end_day'] = $end_day;
            $data['to_day'] = $to_day;
        }
        return view('progress_confirmation.index', compact('datum','now_time'));
    }
}
