<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
     protected $fillable = [
        'account_number',
        'holder_name',
        'email',
        'balance',
        'account_type',
    ];
}
