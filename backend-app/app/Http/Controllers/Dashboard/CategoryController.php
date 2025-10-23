<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadeImage;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    use UploadeImage;
    public function index(){
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create(){
        return view('dashboard.categories.add');
    }

    public function store(Request $request){
        $category = Category::create($request->except('image','_token'));
        if($request->hasFile('image')){
            $category->update(['image'=> $this->uploadImage($request->file('image'), 'categories')]);

        }

        return redirect()->route('categories.index');
    }

    public function show($id){

    }
    public function edit($id){
        $category = Category::where('id', $id)->first();
        return view('dashboard.categories.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $category = Category::where('id', $id)->first();
        $category->update($request->except('image','_token'));
        if($request->hasFile('image')){
            $category->update(['image'=> $this->uploadImage($request->file('image'), 'categories')]);
        }
        return redirect()->route('categories.index');
    }
    public function delete(Request $request){
        if (is_numeric($request->id)){
            Category::where('id', $request->id)->delete();
            return redirect()->route('categories.index');
        }
    }

}
