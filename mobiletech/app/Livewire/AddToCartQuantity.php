<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class AddToCartQuantity extends Component
{
    public $product_id;
    public $quantity = 1;
    public $image;
    public $price;
    public $name;
    public function render()
    {
        return view('livewire.add-to-cart-quantity');
    }

    public function add(){
        $this->quantity++;
        return view('livewire.add-to-cart-quantity');
    }

    public function sub(){
        if ($this->quantity > 1){
            $this->quantity--;
        }
        return view('livewire.add-to-cart-quantity');
    }

    public function submit()
    {
        // vpodstate sanitacia vstupu
        // ak zadal pouzivatel string tak prednastavena hodnota bude 1
        $this->quantity = (int)$this->quantity ;
        if (!filter_var($this->quantity, FILTER_VALIDATE_INT)){
            $this->quantity = 1;
        }

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
                // ak bol prekroceny tak sa prida max produktov kolko sa moze pridat
                if ($current_cart[$this->product_id]['quantity'] + $this->quantity > $available_quantity) {
                    $this->quantity = $available_quantity - $current_cart[$this->product_id]['quantity'];
                }
                //zmena kvantity pre zaznam v kosiku
                $current_cart[$this->product_id] = ['quantity' => $this->quantity + $current_cart[$this->product_id]['quantity'], 'image' => $this->image, 'price' => $this->price, 'name'=>$this->name];
                $product_added = true;

            } else {
                // kontrola ci sa neprekrocil pocet produktov "na sklade"
                // ak bol prekroceny tak sa prida max produktov kolko sa moze pridat
                if ($this->quantity > $available_quantity) {
                    $this->quantity = $available_quantity;
                }
                //zmena kvantity pre zaznam v kosiku
                $current_cart[$this->product_id] = ['quantity' => $this->quantity, 'image' => $this->image, 'price' => $this->price, 'name'=>$this->name];
                $product_added = true;

            }


            session(['cart' => $current_cart]);

        } else {
            // vytvorenie pola poli, ktore reprezentujenakubny kosik

            // kontrola ci sa neprekrocil pocet produktov "na sklade"
            // ak bol prekroceny tak sa prida max produktov kolko sa moze pridat
            if ($this->quantity >= $available_quantity) {
                $this->quantity = $available_quantity;
            }

            session(['cart' => array($this->product_id => ['quantity' => $this->quantity, 'image' => $this->image, 'price' => $this->price, 'name'=>$this->name])]);
            $product_added = true;
        }

        // ak bol produkt pridany vygeneruje sa signal na prepocitanie celkoveho suctu poloziek v kosiku
        if($product_added){
            $this->quantity =1;
            $current_cart = session()->get('cart');
            // dispatchuje sa len kvantita o ktoru sa pocet zmenil z povodneho
            $this->dispatch('totalSumChanged', $this->product_id, $this->price, $this->quantity, false);
        }

        return view('livewire.add-to-cart-quantity');
    }
}
