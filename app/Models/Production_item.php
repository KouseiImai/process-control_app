<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production_item extends Model
{
    use HasFactory;

    public function process_datas()
    {
        return $this->belongsToMany('App\Models\process_data');
    }
}
