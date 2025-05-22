<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function search()
    {
        $query = request()->input('query');
        $products = Product::where('name', 'like', "%{$query}%")->paginate(6);
        return view('product.search', compact(['query', 'products']));
    }


    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = array();
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart); // lưu session cart để load trang khác vẫn ra được 
    }
}
