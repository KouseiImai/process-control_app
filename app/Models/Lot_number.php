<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot_number extends Model
{
    use HasFactory;

    public function process_datas()
    {
        return $this->belongsToMany('App\Models\Process_data');
    }
}
