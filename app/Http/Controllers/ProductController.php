<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.product.index');
    }

    public function details()
    {
        return view('pages.product.details');
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
