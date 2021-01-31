<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_report extends Model
{
    use HasFactory;

    public function lot_numbers()
    {
        return $this->hasManyThrough(
            'App\Models\Lot_number',
            'App\Models\Lotnumber_report_relation',
            'daily_report_id',
            'id',
            'id',
            'lot_number_id'
        );
    }

    public function production_items()
    {
        return $this->hasManyThrough(
            'App\Models\Production_item',
            'App\Models\Item_report_relation',
            'daily_report_id',
            'id',
            'id',
            'production_item_id'
        );
    }

    public function scopeDateStart($query, $n)
    {
        return $query->where('done_date', '>=', $n);
    }

    public function scopeDateEnd($query, $n)
    {
        return $query->where('done_date', '<=', $n);
    }
}
