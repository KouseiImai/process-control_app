<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production_item extends Model
{
    use HasFactory;

    public function process_datas()
    {
        return $this->hasManyThrough(
            'App\Models\Process_data',
            'App\Models\Item_process_relation',
            'production_item_id',
            'id',
            'id',
            'process_data_id'
        );
    }
}
