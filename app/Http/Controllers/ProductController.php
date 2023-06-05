<?php

namespace App\Http\Controllers;

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
        return view('pages.product.cart');
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
