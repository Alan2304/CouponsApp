<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Coupon;

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
                    return redirect()->route('establishments');
                    break;
                case 'Normal':
                    $coupons = Coupon::limit(4)->get();
                    return view('home', ['coupons' => $coupons]);
                default:
                    return view('home');
            }
        }else{
            $coupons = Coupon::limit(4)->get();
            return view('home', ['coupons' => $coupons]);
        }
    }
}
