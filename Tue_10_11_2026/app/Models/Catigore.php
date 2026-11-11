<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catigore extends Model
{
    protected $table = 'catigores';

    protected $fillable = ['name', 'description', 'image', 'status'];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
