<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function showOrder()
    {
        $carts = session()->get('cart', []);
        return view('home.showCheckout', compact('carts'));
    }
}
