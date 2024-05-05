<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class LiveCartItem extends Component
{
    public $product_id;
    public $quantity;
    public $image;
    public $price;
    public $name;
    public $visibility = true;
    public function render()
    {
        return view('livewire.live-cart-item');
    }

    public function discard (){
        $this->visibility = false;
        $cart = session()->get('cart');
        $product_price = $cart[$this->product_id]['price'];
        $product_quantity = $cart[$this->product_id]['quantity'];

        unset($cart[$this->product_id]);
        session(['cart' => $cart]);

        $this->dispatch('productRemoved', $product_price, $product_quantity);

    }

    public function quantityChanged(){
        echo "{GG}";
    }

    public function changeQuantity()

    {

        /*// ziskanie kvantity produktu
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
                    $current_cart[$this->product_id] = ['quantity' => $this->quantity + $current_cart[$this->product_id]['quantity'], 'image' => $this->image, 'price' => $this->price, 'name'=>$this->name];
                    $product_added = true;
                }

            } else {
                // kontrola ci sa neprekrocil pocet produktov "na sklade"
                if ($this->quantity <= $available_quantity) {
                    //zmena kvantity pre zaznam v kosiku
                    $current_cart[$this->product_id] = ['quantity' => $this->quantity, 'image' => $this->image, 'price' => $this->price, 'name'=>$this->name];
                    $product_added = true;
                }
            }


            session(['cart' => $current_cart]);

        } else {
            // vytvorenie pola poli, ktore reprezentujenakubny kosik


            // kontrola ci sa neprekrocil pocet produktov "na sklade"
            if ($this->quantity <= $available_quantity) {
                session(['cart' => array($this->product_id => ['quantity' => $this->quantity, 'image' => $this->image, 'price' => $this->price, 'name'=>$this->name])]);
                $product_added = true;
            }
        }

        // ak bol produkt pridany vygeneruje sa signal na prepocitanie celkoveho suctu poloziek v kosiku
        if($product_added){
            $current_cart = session()->get('cart');
            $this->dispatch('totalSumChanged', $this->product_id, $this->price, $this->quantity);
        }*/

        return view('livewire.live-cart-item');
    }



}
