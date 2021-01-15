<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process_data extends Model
{
    use HasFactory;

    public function lot_numbers()
    {
        return $this->hasManyThrough(
            'App\Models\Lot_number',
            'App\Models\Lotnumber_process_relation',
            'process_data_id',
            'id',
            'id',
            'lot_number_id'
        );
    }

    public function production_items()
    {
        return $this->hasManyThrough(
            'App\Models\Production_item',
            'App\Models\Item_process_relation',
            'process_data_id',
            'id',
            'id',
            'production_item_id'
        );
    }
}
