<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Product;
use App\Establishment;
use App\Type;

class InventoryController extends Controller
{

    public function form(){
        $user = Auth::user();
        if ($user->role->name == "Manager") {
            $establishments = $user->establishments;
            $types = Type::all();
            return view('product.form', ['establishments' => $establishments, 'types' => $types]);
        }else{
            return redirect()->route('/');
        }
    }

    public function create(Request $request){
        $newProduct = new Product();

        $newProduct->name = $request->input('name');
        $newProduct->amount = (float)$request->input('amount');
        $newProduct->quantity = $request->input('quantity');
        $newProduct->establishment_id = $request->input('establishment_id');
        $newProduct->type_id = $request->input('type_id');

        $newProduct->save();
        return back()->with('success', 'The Product was saved Succesfully');
    }

    public function index($id){
        $establishment = Establishment::find($id);
        $products = $establishment->products;
        return view('product.index', ['products' => $products, 'establishment' => $establishment->name]);
    }

    public function delete($id){
        $product = Product::find($id);
        $establishments =Auth::user()->establishments;
        foreach ($establishments as $establishment) {
            if ($product->establishment->id == $establishment->id) {
                $coupons = $product->coupons;
                foreach ($coupons as $coupon) {
                    if ($coupon->users()->count() > 0) {
                        $coupon->users()->detach();
                    }
                    $coupon->delete();
                }
                $product->delete();                
                return back()->with('deleted', 'The Product Was deleted Succesfully');
            }
        }

        return back()->with('errorAuth', "You Can't delete this product");
    }

    public function formUpdate($id){
        $product = Product::find($id);
        $user = Auth::user();
        $establishments = $user->establishments;
        return view('product.updateForm', ['product' => $product, 'establishments' => $establishments]);
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->amount = (float)$request->input('amount');
        $product->quantity = $request->input('quantity');
        $product->establishment_id = $request->input('establishment_id');
        $product->save();
        return back()->with('success', 'The Product was updated Succesfully');
    }
}