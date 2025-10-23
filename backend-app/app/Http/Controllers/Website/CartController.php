<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CartController extends Controller
{

    public function sync(Request $request)
    {
        $cart = $request->cart;

        if ($cart) {
            session()->put('cart', $cart);
        }

        return response()->json(['message' => 'تمت مزامنة السلة بنجاح', 'cart' => session('cart')]);
    }

    public function index()
    {
        return view('website.cart'); // تأكد أن `cart.blade.php` موجود في مجلد `views`
    }

}
