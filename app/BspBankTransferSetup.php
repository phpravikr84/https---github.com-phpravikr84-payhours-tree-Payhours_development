<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BspBankTransferSetup extends Model
{
    protected $fillable = [
        'bsp_customer_reference',
        'bsp_folder_directory',
        'gl_account_code',
    ];

}
