<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    //

    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('home.home', compact('sliders'));
    }
    public function test()
    {
        return view('test');
    }
}
