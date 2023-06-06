<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('price')->get();
        return view('pages.product.index', compact('products'));
    }

    public function details($id)
    {
        $product = Product::find($id);
        return view('pages.product.details', compact('product'));
    }

    public function cart()
    {
        if(user()){
            $carts = Cart::whereUserId(user()->id)->whereStatus('active')->latest()->get();
            $subtotal = $total = 0;
            $shipping = 15.00;
            foreach ($carts as $key => $cart) {
                $subtotal += ($cart->product->discount_tag ? $cart->product->discount_price: $cart->product->price)*$cart->count;
            }
            $total = $subtotal + $shipping;
            return view('pages.product.cart', compact('carts', 'subtotal', 'total', 'shipping'));
        }
        else return back();
    }

    public function payment()
    {
        return view('pages.product.payment');
    }

    public function wishlist()
    {
        return view('pages.product.wishlist');
    }
}
