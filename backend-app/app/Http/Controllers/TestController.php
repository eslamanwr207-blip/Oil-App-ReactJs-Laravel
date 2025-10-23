<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $category = Category::all();

        return response()->json([
            'categories' => $category,
            'status' => 200,
            'message' => 'Success'
        ]);
        //return view('welco            'status' => 200,
        //            'message' => 'Success'me', compact('category'));
    }
}
