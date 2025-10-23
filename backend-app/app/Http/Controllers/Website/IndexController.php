<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Website\ReviewController;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $ones = Category::find(1);

        $tow_and_three = Category::all()->slice(1, 2);
        $products = Product::all();

        $reviews = ReviewController::all();
        return view('website.index', compact('reviews', 'tow_and_three', 'ones', 'products'));
    }


    public function about_us()
    {
        return view('website.about_us');
    }
}
