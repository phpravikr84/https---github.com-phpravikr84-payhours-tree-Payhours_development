<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayReferenceDepartmentRel extends Model
{
    protected $fillable = [
        'pay_reference_id',
        'pay_reference_department_id',
    ];
}
