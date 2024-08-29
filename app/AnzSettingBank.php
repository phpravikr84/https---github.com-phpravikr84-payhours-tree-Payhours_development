<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnzSettingBank extends Model
{
    protected $fillable = [
        'anz_setting_id',
        'bank_id',
    ];
}
