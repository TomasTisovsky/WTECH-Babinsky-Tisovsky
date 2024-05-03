<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class AddToCart extends Component
{
    // premenne potrebne pre kosik
    public $product_id;
    public $quantity;
    public $image;
    public $price;

    public function render()
    {
        return view('livewire.add-to-cart');
    }

    public function addToCart()

    {
        // ziskanie kvantity produktu
        $product = Product::where('id', $this->product_id)->get()->first();
        // pocet dostupnych produktov
        $available_quantity = $product->stock_quantity;

        $product_added = false;

        if (session()->has('cart')) {
            // ziskanie kosika z relacie
            $current_cart = session()->get('cart');

            // kontrola ci uz je produkt v kosiku
            if (array_key_exists($this->product_id, $current_cart)) {

                // kontrola ci sa neprekrocil pocet produktov "na sklade"
                if ($current_cart[$this->product_id]['quantity'] + $this->quantity <= $available_quantity) {
                    //zmena kvantity pre zaznam v kosiku
                    $current_cart[$this->product_id] = ['quantity' => $this->quantity + $current_cart[$this->product_id]['quantity'], 'image' => $this->image, 'price' => $this->price];
                    $product_added = true;
                }

            } else {
                // kontrola ci sa neprekrocil pocet produktov "na sklade"
                if ($this->quantity <= $available_quantity) {
                    //zmena kvantity pre zaznam v kosiku
                    $current_cart[$this->product_id] = ['quantity' => $this->quantity, 'image' => $this->image, 'price' => $this->price];
                    $product_added = true;
                }
            }


            session(['cart' => $current_cart]);

        } else {
            // vytvorenie pola poli, ktore reprezentujenakubny kosik


            // kontrola ci sa neprekrocil pocet produktov "na sklade"
            if ($this->quantity <= $available_quantity) {
                session(['cart' => array($this->product_id => ['quantity' => $this->quantity, 'image' => $this->image, 'price' => $this->price])]);
                $product_added = true;
            }
        }

        // ak bol produkt pridany vygeneruje sa signal na prepocitanie celkoveho suctu poloziek v kosiku
        if($product_added){
            $current_cart = session()->get('cart');
            $this->dispatch('totalSumChanged', $this->product_id, $this->price, $this->quantity);
        }

        return view('livewire.add-to-cart');
    }

}
