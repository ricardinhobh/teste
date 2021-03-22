<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
       'orderCode',
        'orderDate',
        'totalAmountWihtoutDiscount',
        'totalAmountWithDiscount',

    ];
    public function productsOrder()
    {
        return $this->hasMany(ProductOrder::class);
    }
}
