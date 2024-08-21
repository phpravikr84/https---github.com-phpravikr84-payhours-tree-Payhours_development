<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayLocation extends Model
{
    protected $fillable = [
        'payroll_location_code',
        'payroll_location_name',
        'status',
    ];
}
