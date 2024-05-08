<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {


        // ziskanie idcka prihlaseneho pouzivatela
        $userId = auth()->user()->id;

        // ziskanie aktualne prihlaseneho pouzivatela
        $logged_user = auth()->user();



        // jeden obrazok pre kazdy produkt
        $single_images_for_each_product = Image::selectRaw('MIN(id) as min_id')->groupBy('product_id')->get();

        if (($logged_user!= null) && ($logged_user->cart_id != null)) {
            // ak ma pouzivatel nejaky aktualny kosik v databaze nacita sa do session
            $products_in_users_current_cart = Product::join('cart_items', 'products.id', '=', 'cart_items.product_id')
                ->join('carts', 'carts.id', '=', 'cart_items.cart_id')
                ->join('users', 'users.cart_id', '=', 'carts.id')
                ->join('images', 'images.product_id', '=', 'products.id')
                ->select('products.id', 'images.image_name', 'cart_items.quantity', 'products.price', 'products.name')
                ->whereIn('images.id', $single_images_for_each_product)
                ->where('carts.id',$logged_user->cart_id)
                ->get();

            $loaded_cart = [];

            //naplnenie kosika
            foreach ($products_in_users_current_cart as $current_cart_item) {
                $loaded_cart[$current_cart_item->id] = ['quantity' => $current_cart_item->quantity, 'image' => $current_cart_item->image_name, 'price' => $current_cart_item->price, 'name' => $current_cart_item->name];
            }

            // vytvorenie kosika v session
            session(['cart' => $loaded_cart]);

        }else if (session()->has('cart')){
            $current_cart = session()->get('cart');

            //vytvorenie zaznamu v tabulke carts
            $new_user_cart = new Cart();
            $new_user_cart->save();

            //pridanie kosika pouzivatelovi
            $logged_user->cart_id = $new_user_cart->id;
            $logged_user->save();


            foreach ($current_cart as $product_id => $product_details){

                // vytvorenie zaznamu v databaze, konkretne v tabulke cart_items
                $cart_item = new CartItem();
                $cart_item->cart_id = $logged_user->cart_id;
                $cart_item->product_id = $product_id;
                $cart_item->quantity = $product_details['quantity'];

                // ulozenie noveho zaznamu
                $cart_item->save();
            }


        }


        return redirect()->route('main-page');
    }
}
