<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";

    public function establishment(){
        return $this->belongsTo('App\Establishment');
    }

    public function coupons(){
        return $this->hasMany('App\Coupon');
    }
}
