<?php

namespace App\Http\Controllers;

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

        // ziskanie jeho aktualneho kosika
        $cartId = auth()->user()->cart_id;

        // jeden obrazok pre kazdy produkt
        $single_images_for_each_product = Image::selectRaw('MIN(id) as min_id')->groupBy('product_id')->get();

        if ($cartId != null) {
            // ak ma pouzivatel nejaky aktualny kosik v databaze nacita sa do session
            $products_in_users_current_cart = Product::join('cart_items', 'products.id', '=', 'cart_items.product_id')
                ->join('carts', 'carts.id', '=', 'cart_items.cart_id')
                ->join('users', 'users.cart_id', '=', 'carts.id')
                ->join('images', 'images.product_id', '=', 'products.id')
                ->select('products.id', 'images.image_name', 'cart_items.quantity', 'products.price', 'products.name')
                ->whereIn('images.id', $single_images_for_each_product)->limit(3)->get();


            $loaded_cart = [];

            //naplnenie kosika
            foreach ($products_in_users_current_cart as $current_cart_item) {
                $loaded_cart[$current_cart_item->id] = ['quantity' => $current_cart_item->quantity, 'image' => $current_cart_item->image_name, 'price' => $current_cart_item->price, 'name' => $current_cart_item->name];
            }

            // vytvorenie kosika v session
            session(['cart' => $loaded_cart]);


        }


        return redirect()->route('main-page');
    }
}
