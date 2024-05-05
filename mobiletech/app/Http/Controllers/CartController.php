<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view_shopping_cart()
    {   $cart = session()->get('cart');
        return view('pages/shoppingCart', ['cart' =>$cart]);
    }



    public function debug()
    {
        dd(session()->get('cart'));
    }

    public function new_session(Request $request)
    {
        $request->session()->flush();
        return redirect()->back();
    }

}
