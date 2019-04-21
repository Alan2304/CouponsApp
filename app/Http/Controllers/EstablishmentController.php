<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Establishment;

class EstablishmentController extends Controller
{
    public function form(){
        return view('establishment.form');
    }

    public function create(Request $request){
        $establishment = new Establishment();
        $establishment->name = $request->input('name');
        $establishment->address = $request->input('address');
        $establishment->city = $request->input('city');
        $establishment->user_id = Auth::user()->id;
        
        $establishment->save();

        return back()->with('success', 'The Establishment was created Succesfully');
    }

    public function index(){
        $allEstablishments = Auth::user()->establishments;
        return view('establishment.index', ['establishments' => $allEstablishments]);
    }
}
