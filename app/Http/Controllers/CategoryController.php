<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function index($slug, $categoryId)
    {
        $categoryLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::where('category_id', $categoryId)->paginate(3);
        $categories = Category::where('parent_id', 0)->get();
        return view('product.category.list', compact(['categoryLimit', 'products', 'categories']));
    }
}
