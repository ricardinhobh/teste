<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    //
    protected $fillable = ['orderId','productId'];
    public function productsOrder()
    {
        return $this->belongstoMany(Order::class);
    }
}
