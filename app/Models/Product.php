<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'articleCode',
        'articleName',
        'unitPrice',
        'amount'
    ];
}
