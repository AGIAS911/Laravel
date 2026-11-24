<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    public function order_item_table()
    {
        return $this->belongsTo(Order::class);
    }


     public function Product_item_table()
    {
        return $this->belongsTo(Product::class);
    }
}
