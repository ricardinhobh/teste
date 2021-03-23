<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    //
    protected $fillable = ['order_id','product_id','amountProduct','totalWithoutDiscount','totalWithDiscount'];
    public function productsOrder()
    {
        return $this->belongsTo(Order::class);
    }
}
