<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{

    protected $table="estate";

    public function cities(){
        return $this->hasMany('App\City');
    }
}
