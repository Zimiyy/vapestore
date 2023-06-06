<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        if($request->category){
            $products = Product::whereCategory($request->category)->orderBy('price')->take(8)->get();
        }
        else $products = Product::orderBy('price')->take(8)->get();
        return view('pages.landing', compact('products'));
    }

    public function signin(Request $request)
    {  
        $product_id = $request->product_id;
        return view('pages.signin', compact('product_id'));
    }

    public function signin_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ], [
            'email.required' => 'Email address is required',
            'email.email' => 'Email is invalid',
            'email.exists' => 'This email is not registered',
            'password.required' => 'Password is required',
        ]);

        $auth = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if ($auth) {
            if(user()->role == 'admin'){
                auth()->logout();
                session()->flush();
                session()->flash('error', "Please enter Admin Login Page.");
                return back();
            }
            if($request->product_id){
                return redirect()->route('product.details', $request->product_id);
            }
            session()->flash('success', "Login successfully.");
            return redirect()->route('landing');
        } else {
            return back();
        }
    }

    public function register()
    {
        return view('pages.register');
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'fullname.required' => "Full name is required",
            'email.required' => "Email address is required",
            'email.email' => "Use a valid email format",
            'email.unique' => "This email has been registered",
            'password.required' => "Password is required",
            'password.min' => "Password must be more than 8 characters",
            'password.confirmed' => "Both passwords are mismatched",
            'password_confirmation.required' => "Retype Password is required",
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'customer';
        $user->password = bcrypt($request->password);
        $user->save();

        $auth = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if ($auth) {
            session()->flash('success', "Register successfully.");
            return redirect()->route('landing');
        } else {
            return back();
        }
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function signout()
    {
        auth()->logout();
        session()->flush();

        return redirect()->route('landing');
    }
}
