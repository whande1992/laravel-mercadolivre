<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Images()
    {
        return $this->hasMany('App\ProductImage');
    }
}
