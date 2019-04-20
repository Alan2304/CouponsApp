<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $table="establishment";

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function coupons(){
        return $this->hasMany('App\Coupon');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
