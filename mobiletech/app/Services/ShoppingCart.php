<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\ServiceProvider;

class ShoppingCart
{
    public static function calculateTotalSum(){

        if (session()->has('cart')){
            $current_cart = session()->get('cart');
            $total_sum = 0;

            foreach ($current_cart as $cart_item_id => $value){
                $total_sum += Product::where('id', $cart_item_id)->value('price') *$value['quantity'];
            }

            return $total_sum;

        }else{
            return 0.00;
        }
    }
}
