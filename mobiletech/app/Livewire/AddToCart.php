<?php

namespace App\Livewire;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class AddToCart extends Component
{
    // premenne potrebne pre kosik
    public $product_id;
    public $quantity;
    public $image;

    public function render()
    {
        return view('livewire.add-to-cart');
    }

    public function addToCart( )

    {    if (session()->has('cart')) {
        $current_cart = session()->get('cart');

        // kontrola ci uz je produkt v kosiku
        if (array_key_exists($this->product_id, $current_cart)) {

            // ziskanie kvantity produktu
            $available_quantity = Product::where('id', $this->product_id)->value('stock_quantity');

            // kontrola ci sa neprekrocil pocet produktov "na sklade"
            if ($current_cart[$this->product_id]['quantity'] + $this->quantity <= $available_quantity) {
                //zmena kvantity pre zaznam v kosiku
                $current_cart[$this->product_id] = ['quantity' => $this->quantity + $current_cart[$this->product_id]['quantity'], 'image' => $this->image];
            }

        } else {
            // vytvorenie pola reprezentujuceho kosik
            $current_cart[$this->product_id] = ['quantity' => $this->quantity, 'image' => $this->image];
        }


        session(['cart' => $current_cart]);

    } else {
        // vytvorenie pola poli, ktore reprezentujenakubny kosik
        session(['cart' => array($this->product_id => ['quantity' => $this->quantity, 'image' => $this->image])]);
    }
        return view('livewire.add-to-cart');
    }

}
