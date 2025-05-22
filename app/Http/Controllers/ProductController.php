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
        dd($products);
        return view('product.search', compact(['query', 'products']));
    }
}
