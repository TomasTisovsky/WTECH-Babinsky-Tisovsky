<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {

        //dd ($request->product_id);

        if (session()->has('cart')) {
            $current_cart = session()->get('cart');

            // kontrola ci uz je produkt v kosiku
            if (array_key_exists($request->product_id, $current_cart)) {

                // ziskanie kvantity produktu
                $available_quantity = Product::where('id', $request->product_id)->value('stock_quantity');

                // kontrola ci sa neprekrocil pocet produktov "na sklade"
                if ($current_cart[$request->product_id]['quantity'] + $request->quantity <= $available_quantity) {
                    //zmena kvantity pre zaznam v kosiku
                    $current_cart[$request->product_id] = ['quantity' => $request->quantity + $current_cart[$request->product_id]['quantity'], 'image' => $request->image];
                }

            } else {
                // vytvorenie pola reprezentujuceho kosik
                $current_cart[$request->product_id] = ['quantity' => $request->quantity, 'image' => $request->image];
            }


            session(['cart' => $current_cart]);

        } else {
            // vytvorenie pola poli, ktore reprezentujenakubny kosik
            session(['cart' => array($request->product_id => ['quantity' => $request->quantity, 'image' => $request->image])]);
        }


        return redirect()->back();
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
