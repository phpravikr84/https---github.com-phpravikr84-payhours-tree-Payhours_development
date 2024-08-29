<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WpacBankTransferSetup extends Model
{
    protected $fillable = [
        'wpac_customer_reference',
        'wpac_folder_directory',
        'gl_account_code',
    ];
}
