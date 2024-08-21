<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HraAreaPlace extends Model
{
    protected $fillable = [
        'created_by', 'loca_name', 'places'
    ];
}
