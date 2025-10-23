<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadeImage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UploadeImage;
    public function index(){
        $products = Product::all();
        return view('dashboard.products.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('dashboard.products.add', compact('categories'));
    }
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->first();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }
    public function show($id){

    }


    public function store(Request $request){
        $product = Product::create($request->except('image','_token'));
        $product->update(['user_id'=> auth()->user()->id]);
        if($request->hasFile('image')){
            $product->update(['image'=> $this->uploadImage($request->file('image'), 'products')]);

        }

        return redirect()->route('products.index');
    }

    public function update(Request $request, $id){
        $product = Product::where('id', $id)->first();
        $product->update($request->except('image','_token'));
        $product->update(['user_id'=> auth()->user()->id]);
        if($request->hasFile('image')){
            $product->update(['image'=> $this->uploadImage($request->file('image'), 'products')]);
        }
        return redirect()->route('products.index');
    }

    public function delete(Request $request)
    {
        $product = Product::where('id', $request->id)->delete();
        return redirect()->route('products.index');
    }

}
