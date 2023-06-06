<?php


if (! function_exists('user')) {
    function user() {
        return auth()->user();
    }
}

if (! function_exists('getCartCount')) {
    function getCartCount() {
        return \App\Models\Cart::whereUserId(user()->id)->whereStatus('active')->count();
    }
}

if (! function_exists('getProductStock')) {
    function getProductStock($id) {
        return \App\Models\Product::whereId($id)->first()->quantity ?? 0;
    }
}

?>