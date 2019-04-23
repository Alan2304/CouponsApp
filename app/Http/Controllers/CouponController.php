<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Product;
use App\Coupon;
use App\Establishment;

class CouponController extends Controller
{
    public function form($id){
        if ($product = Product::find($id)) {
            return view('coupon.form', ['product' => $product]);
        }else{
            return redirect()->route('home');
        }
        //return str_random(5);
    }

    public function create(Request $request, $id){
        $product = Product::find($id);
        $establishment = $product->establishment;

        //Coupon
        $coupon = new Coupon();
        $coupon->name = $request->input('name');
        $coupon->discount= $request->input('discount');
        $coupon->expiration = $request->input('expiration');
        $coupon->description = $request->input('description');
        //Generate code for the coupon
        $coupon->code = Str::substr($establishment->name, 0, 2) . '-' . str_random(5);
        $coupon->establishment_id = $establishment->id;
        $coupon->product_id = $product->id;
        $coupon->save();
        return back()->with('success', 'The Coupon was saved succesfully and ends in '. $coupon->expiration);
    }

    public function index($id){
        $establishment = Establishment::find($id);
        $coupons = $establishment->coupons;
        return view('coupon.index', ['coupons' => $coupons]);
    }

    public function delete($id){
        $coupon = Coupon::find($id);
        if ($coupon->users()->count() > 0) {
            $coupon->users()->detach();
        }
        $coupon->delete();
        return back()->with('success', 'The Coupon was deleted Succesfully');
    }

    public function updateForm($id){
        $coupon = Coupon::find($id);
        return view('coupon.updateForm', ['coupon' => $coupon]);
    }

    public function update(Request $request, $id){
        $coupon = Coupon::find($id);
        $coupon->name = $request->input('name');
        $coupon->discount= $request->input('discount');
        $coupon->expiration = $request->input('expiration');
        $coupon->description = $request->input('description');
        $coupon->save();
        return back()->with('success', 'The Coupon was updated succesfully and ends in '. $coupon->expiration);
    }

    public function getCoupon($id){
        $coupon = Coupon::find($id);
        return response()->json([
            'coupon' => $coupon
        ]);
    }

    public function exchange(Request $request){
        $coupon = Coupon::find($request->input('couponId'));
        $users = $coupon->users;
        foreach ($users as $user) {
            $result = $user->pivot->where('code', $request->input('code'))
                                    ->where('user_id', $request->input('user_id'))
                                    ->first();
            if ($result) {
                if ($result->used == 0) {
                    $coupon->product->quantity = $coupon->product->quantity - 1;
                    $coupon->product->save();
                    $result->used = 1;
                    $result->save();
                    return response()->json([
                        'body' => $result
                    ]);
                }else{
                    return response()->json([
                        'error' => 'The coupon was already used'
                    ]);
                }
            }
        }
        
        return response()->json([
            'error' => 'There is no coupon for that user'
        ]);
    }
}
