<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('website.categories', compact('categories'));
    }

    public function all($id){
        $products = Product::where('category_id', $id)->get();
        return view('website.products', compact('products'));
    }
}
