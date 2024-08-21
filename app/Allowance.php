<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    protected $fillable = [
        'created_by', 'description', 'amount', 'taxable'
    ];
}
