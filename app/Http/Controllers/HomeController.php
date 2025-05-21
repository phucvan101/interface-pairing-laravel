<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function index()
    {
        $sliders = Slider::latest()->get();
        // DB::connection()->enableQueryLog(); kiểm tra câu lệnh query
        $categories = Category::where('parent_id', 0)->get();
        // $queries = DB::getQueryLog();
        $products = Product::latest()->take(6)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(6)->get();
        return view('home.home', compact(['sliders', 'categories', 'products', 'productsRecommend']));
    }
    public function test()
    {
        return view('test');
    }
}
