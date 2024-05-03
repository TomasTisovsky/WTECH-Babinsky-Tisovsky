<?php

namespace App\Livewire;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class TotalSum extends Component
{
    public $totalSum =0;
    // funkcia totalSumChanged sa bude vykonavat v pripade pridania alebo odobratia produktu z kosika
    protected $listeners = ['totalSumChanged'];

    public function render()
    {
        if (session()->has('cart')){
            $current_cart = session()->get('cart');
            $this->totalSum = 0;
            foreach ($current_cart as $cart_item_id => $value){
                $this->totalSum += Product::where('id', $cart_item_id)->value('price') *$value['quantity'];
            }


        }

        return view('livewire.total-sum')->with('totalSum', $this->totalSum);
    }

    public function totalSumChanged($product_id,$price, $quantity){
        if (session()->has('cart')){
            $current_cart = session()->get('cart');
            $current_cart[$product_id]['quantity'] = $quantity;
            $this->totalSum += $price*$quantity;

        }

        return view('livewire.total-sum')->with('totalSum', $this->totalSum);
    }

}
