<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estate;

class EstateController extends Controller
{
    public function index(){
        $estates = Estate::all();
        return response()->json([
            'estates' => $estates
        ]);
    }

    public function getCities($id){
        $estates = Estate::find($id);
        $cities = $estates->cities;
        return response()->json([
            'cities' => $cities
        ]);
    }
}
