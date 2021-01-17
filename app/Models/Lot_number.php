<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot_number extends Model
{
    use HasFactory;

    public function process_datas()
    {
        return $this->hasManyThrough(
            'App\Models\Process_data',
            'App\Models\Lotnumber_process_relation',
            'lot_number_id',
            'id',
            'id',
            'process_data_id'
        );
    }
}
