<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderFinalizationController extends Controller
{
    public function next()
    {

        $order_details = session()->get('order_details');

        // kontrola ci pouzivatel zadal sposob dopravy a platby
        if (!array_key_exists('transport',$order_details) or !array_key_exists('payment',$order_details)){
            // ak nie tak sa vrati naspat
            return redirect()->route('payment-transport');
        }
        

        return view('pages/orderFinalization', compact('order_details'));
    }

    public function finalize()
    {

        $order_details = session()->get('order_details');
        $cart = session()->get('cart');
        // vytvorenie objednavky a adresy v databaze

        $current_user = Auth::user();


        // vytvorenie zaznamu v tabulke adresses
        $new_address = new Address();
        $new_address->street = $order_details['street'];
        $new_address->city = $order_details['city'];
        $new_address->country = $order_details['country'];
        $new_address->postal_code = $order_details['postal_code'];
        $new_address->save();

        // vytvorenie zaznamu v tabulke orders
        $new_order = new Order();

        if ($current_user != null) {
            $new_order->user_id = $current_user->id;
            $new_order->cart_id = $current_user->cart_id;

            // resetovanie kosika pouzivatela
            $current_user->cart_id = null;
            $current_user->save();
        } else {
            // ak nie je pouzivatel prihlaseny tak najprv treba vytvorit zaznam o kosiku v databaze


            //vytvorenie zaznamu v tabulke carts
            $new_cart = new Cart();
            $new_cart->save();


            foreach ($cart as $product_id => $product_details) {
                // vytvorenie zaznamu v databaze, konkretne v tabulke cart_items

                $cart_item = new CartItem();
                $cart_item->cart_id = $new_cart->id;
                $cart_item->product_id = $product_id;
                $cart_item->quantity = $product_details['quantity'];

                // ulozenie noveho zaznamu
                $cart_item->save();
            }

            // pridanie kosika objednavke
            $new_order->cart_id = $new_cart->id;
        }


        $new_order->name = $order_details['name'];
        $new_order->surname = $order_details['surname'];
        $new_order->email = $order_details['email'];
        $new_order->phone_number = $order_details['phone_number'];
        $new_order->shipping = $order_details['transport'];
        $new_order->payment = $order_details['payment'];
        $new_order->address_id = $new_address->id;
        $new_order->save();

        // odpocitanie kvantity pre kazdy produkt v kosiku

        $current_cart_items = Product::join('cart_items', 'products.id', '=', 'cart_items.product_id')
            ->where("cart_id", $new_order->cart_id)->get();


        foreach ($current_cart_items as $current_item) {
            $current_item->stock_quantity -= $cart[$current_item->product_id]['quantity'];
            $current_item->save();
        }


        //resetovanie kosika a detailov v session()
        session()->forget('cart');
        session()->forget('order_details');


        return redirect(route('order-successful.show'));
    }

}
