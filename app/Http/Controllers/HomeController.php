<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ($user = Auth::user()) {
            switch ($user->role->name) {
                case 'Admin':
                    return view('home');
                    break;
                case 'Manager':
                    return 'Manager View';
                    break;
                case 'Normal':
                    return view('home');
                default:
                    return view('home');
            }
        }else{
            return view('home');
        }
    }
}
