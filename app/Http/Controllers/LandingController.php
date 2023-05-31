<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.landing', compact('products'));
    }

    public function signin()
    {
        return view('pages.signin');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
