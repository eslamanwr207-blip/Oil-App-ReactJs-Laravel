<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('website.products', compact('products'));
    }

    public function product_details($id)
    {
        $product = Product::where('id', $id)->first();


        return view('website.product_details', compact('product'));



    }
}
