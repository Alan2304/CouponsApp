<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table='city';

    public function city(){
        return $this->belongsTo('App\Estate');
    }
}
