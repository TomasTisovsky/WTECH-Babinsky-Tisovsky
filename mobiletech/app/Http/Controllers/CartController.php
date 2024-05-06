<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view_shopping_cart()
    {
        $cart = session()->get('cart');
        $totalSum = 0;

        if ($cart != null) {
            foreach ($cart as $cartitem) {
                $totalSum += $cartitem['price']*$cartitem['quantity'];
            }
        }

        return view('pages/shoppingCart', ['cart' => $cart, 'totalSum' => $totalSum]);
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
