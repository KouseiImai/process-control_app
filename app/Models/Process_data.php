<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process_data extends Model
{
    use HasFactory;

    public function lot_numbers()
    {
        return $this->belongsToMany('App\Models\Lot_number');
    }

    public function production_items()
    {
        return $this->belongsToMany('App\Models\Production_item');
    }
}
