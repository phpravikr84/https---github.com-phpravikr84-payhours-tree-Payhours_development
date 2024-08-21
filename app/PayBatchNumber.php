<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayBatchNumber extends Model
{
    protected $fillable = [
        'pay_batch_number_code',
        'pay_batch_number_name',
        'status',
    ];
}
