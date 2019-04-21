<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;

class AdminController extends Controller
{
    public function createEstablishment(){
        if (Auth::user()->role->name == 'Admin') {
            return view('admin.register');
        }else{
            return redirect()->route('/');
        }
    }

    public function registerEstablishmentAcc(Request $request){
        if (Auth::user()->role->name == 'Admin') {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('pass'));
            $user->role_id = 2;
            $user->estate_id = $request->input('estate_id');
            $user->city_id = $request->input('city_id');
            $user->save();

            return back()->with('success', 'The Manager User Account was created succesfully');
        }else{
            return redirect()->route('/');
        }
    }
}
