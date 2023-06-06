<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($product, $color, $storage)
    {
        $cart = Cart::whereUserId(user()->id)->whereProductId($product)->whereColorId($color)->whereStorageId($storage)->whereStatus('active')->first();
        if($cart){
            $cart->count = $cart->count + 1;
        }
        else{
            $cart = new Cart;
            $cart->user_id = user()->id;
            $cart->product_id = $product;
            $cart->color_id = $color;
            $cart->storage_id = $storage;
            $cart->status = 'active';
            $cart->count = 1;
        }
        $cart->save();
        session()->flash('toast_success', "Login successfully.");
        // $cartCount = Cart::whereUserId(user()->id)->whereStatus('active')->count();
        return response()->json([
            "result" => "OK",
        ], 200);
    }

    public function decrease($id)
    {
        $cart = Cart::find($id);
        $cart->count -= 1;
        if($cart->count == 0)$cart->delete();
        else $cart->save();
        return back();
    }

    public function increase($id)
    {
        $cart = Cart::find($id);
        $cart->count += 1;
        $cart->save();
        return back();
    }

    public function deleteAll($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return back();
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'district' => 'required',
            'card_no' => 'required',
        ], [
            'name.required' => "Name is required",
        ]);

        $carts = Cart::whereUserId(user()->id)->whereStatus('active')->get();
        foreach ($carts as $key => $cart) {
            $cart->status = 'inactive';
            $cart->save();
        }

        session()->flash('success', "Payment done.");
        return redirect()->route('landing');

    }
}
