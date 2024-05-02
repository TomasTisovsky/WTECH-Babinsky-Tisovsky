<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class TotalSum extends Component
{
    public $totalSum =0;
    protected $listeners = ['totalSumChanged'];

    public function render()
    {
        if (session()->has('cart')){
            $current_cart = session()->get('cart');
            $this->totalSum = 0;

            foreach ($current_cart as $cart_item_id => $value){
                $this->totalSum = 0;
                $this->totalSum += Product::where('id', $cart_item_id)->value('price') *$value['quantity'];
            }


        }else{
            $this->totalSum = 0;
        }


        return view('livewire.total-sum')->with('totalSum', $this->totalSum);
    }

    public function totalSumChanged(){
        if (session()->has('cart')){
            $current_cart = session()->get('cart');
            $this->totalSum = 0;

            foreach ($current_cart as $cart_item_id => $value){
                $this->totalSum = 0;
                $this->totalSum += Product::where('id', $cart_item_id)->value('price') *$value['quantity'];
            }


        }else{
            $this->totalSum = 0;
        }


        return view('livewire.total-sum')->with('totalSum', $this->totalSum);
    }

}
