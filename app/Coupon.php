<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Coupon extends Model
{
    protected $table="coupon";
    
    public function users(){
        return $this->belongsToMany(User::class, 'user_coupon')->withPivot('code', 'used');;
    }

    public function establishment(){
        return $this->belongsTo('App\Establishment');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
