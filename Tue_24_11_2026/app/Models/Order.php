<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orderitem;

class Order extends Model
{
     public function Orderitems_order()
    {
        return $this->hasMany(Orderitem::class);
    }

}
