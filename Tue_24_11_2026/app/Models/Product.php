<?php

namespace App\Models;

use App\Models\Catigore;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function catigore()
    {
        return $this->belongsTo(Catigore::class);
    }


     public function order_item_table()
    {
        return $this->hasMany(Orderitem::class);
    }
}
