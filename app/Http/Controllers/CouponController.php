<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Product;
use App\Coupon;
use App\Establishment;
use App\Type;
use App\User;

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
        $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'expiration' => 'required',
            'description' => 'required'
        ]);
        
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
        $user = Auth::user();
        
        if ($establishment->user_id == $user->id) {
            $coupons = $establishment->coupons()->paginate(10);
            return view('coupon.index', ['coupons' => $coupons, 'establishmentId' => $establishment->id]);
        }else{
            return back()->with('errorEstablishment', "You can't access to those coupons");
        }
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
        $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'expiration' => 'required',
            'description' => 'required'
        ]);
        
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

    public function categorizedCoupons(){
        $types = Type::all();
        $categorizedCoupons = [];
        foreach ($types as $type) {
            $products = $type->products()->limit(3)->get();
            $arrayType = [];
            foreach ($products as $product) {
                $coupons = $product->coupons()->limit(1)->get();
                foreach ($coupons as $coupon) {
                    $arrayType += [$coupon->id => $coupon];
                }
            }
            $categorizedCoupons[$type->name] = $arrayType;
        }

        return view('coupon.categorizedCoupons', ['categorizedCoupons' => $categorizedCoupons]);
    }

    public function couponsByType($type){
        $type = Type::where('name', $type)->first();
        $products = $type->products;
        $coupons = [];
        foreach ($products as $product) {
            $couponByProduct = $product->coupons;
            foreach ($couponByProduct as $coupon) {
                array_push($coupons, $coupon);
            }
        }
        return view('coupon.couponsByType', ['coupons' => $coupons, 'type' => $type]);
    }

    public function setCoupon(Request $request){
        $user = User::find($request->input('userId'));
        $couponId = $request->input('couponId');
        $userCoupons = $user->coupons;
        foreach ($userCoupons as $coupon) {
            if ($coupon->id == $couponId) {
                return response()->json([
                    'error' => 'You Already have this Coupon, please check your coupons'
                ]);
            }
        }
        $user->coupons()->attach($couponId, ['code' => $request->input('code')]);
        return response()->json([
            'body' => 'The Coupon Was saved, now you can go to the store and use it!'
        ]);
    }

    public function myCoupons(){
        $user = Auth::user();
        $couponsCount = $user->coupons->count();
        $myCoupons = $user->coupons()->paginate(10);
        return view('coupon.myCoupons', ['myCoupons' => $myCoupons, 'couponsCount' => $couponsCount]);
    }

    public function myCouponsDelete($id){
        $user = Auth::user();
        $user->coupons()->detach($id);
        return back()->with('success', 'The Coupon was eliminated of your list');
    }

    public function search(Request $request){
        $code = $request->input('couponCode');
        $establishmentId = $request->input('establishmentId');
        $establishment = Establishment::find($establishmentId);
        $coupons = $establishment->coupons()->where('code', 'LIKE', '%'.$code.'%')->paginate(10);
        return view('coupon.index', ['coupons' => $coupons, 'establishmentId' => $establishmentId]);   
    }

}
