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

    public function discard()
    {
        $this->visibility = false;
        $cart = session()->get('cart');
        $product_price = $cart[$this->product_id]['price'];
        $product_quantity = $cart[$this->product_id]['quantity'];

        unset($cart[$this->product_id]);
        session(['cart' => $cart]);

        $this->dispatch('productRemoved', $product_price, $product_quantity);

    }

    public function quantityChanged()
    {
        echo "{GG}";
    }

    public function changeQuantity($new_quantity)
    {
        // ziskanie kvantity produktu
        $product = Product::where('id', $this->product_id)->get()->first();
        // pocet dostupnych produktov
        $available_quantity = $product->stock_quantity;
        $quantity_changed = false;
        $quantity_diff = 0;

        if (session()->has('cart')) {
            // ziskanie kosika z relacie
            $current_cart = session()->get('cart');


            // kontrola ci sa neprekrocil pocet produktov "na sklade"
            if ($new_quantity <= $available_quantity) {
                //zmena kvantity pre zaznam v kosiku
                $current_cart[$this->product_id] = ['quantity' => $new_quantity, 'image' => $this->image, 'price' => $this->price, 'name' => $this->name];
                $quantity_diff = $new_quantity - $this->quantity;
                $this->quantity = $new_quantity;
                $quantity_changed = true;
            }


            session(['cart' => $current_cart]);

        }

        // ak bol produkt pridany vygeneruje sa signal na prepocitanie celkoveho suctu poloziek v kosiku
        if ($quantity_changed) {
            $current_cart = session()->get('cart');
            $this->dispatch('totalSumChanged', $this->product_id, $this->price,$quantity_diff, true);
        }

        return view('livewire.live-cart-item');
    }


}
