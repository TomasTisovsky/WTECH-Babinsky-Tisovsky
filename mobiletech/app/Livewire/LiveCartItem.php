<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Livewire\Component;

class LiveCartItem extends Component
{
    public $product_id;
    public $quantity;
    public $volatile_quantity;
    public $image;
    public $price;
    public $name;
    public $visibility = true;

    public function render()
    {   $this->volatile_quantity = $this->quantity;
        return view('livewire.live-cart-item');
    }

    public function discard()
    {
        // Odstranenie produktu (cela kvantita) z kosika

        // nebude uz vidno v html
        $this->visibility = false;


        $cart = session()->get('cart');

        $product_price = $cart[$this->product_id]['price'];
        $product_quantity = $cart[$this->product_id]['quantity'];

        // odstranenie zo session
        unset($cart[$this->product_id]);
        session(['cart' => $cart]);

        //odstranenie z databazy ak je pouzivatel prihlaseny

        $logged_user = auth()->user();

        // zistenie ci je pouzivatel prihlaseny
        if ($logged_user != null){

            //ziskanie zaznamu z tabulk cart_items
            $cart_item_to_be_removed = CartItem::where('cart_items.cart_id','=',$logged_user->cart_id)
                ->where('cart_items.product_id','=',$this->product_id)
                ->first();

            //odstranenie zaznamu
            $cart_item_to_be_removed->delete();
        }

        $this->dispatch('productRemoved', $product_price, $product_quantity);

    }


    public function changeQuantity($new_quantity)
    {
        // ziskanie kvantity produktu
        $product = Product::where('id', $this->product_id)->get()->first();

        // pocet dostupnych produktov
        $available_quantity = $product->stock_quantity;

        $quantity_changed = false;

        //zmena poctu produktu v kosiku
        $quantity_diff = 0;

        if (session()->has('cart')) {
            // ziskanie kosika z relacie
            $current_cart = session()->get('cart');


            // kontrola ci sa neprekrocil pocet produktov "na sklade"
            // ak sa prekrocil tak sa nastavi na max pocet produktov "na sklade"
            if ($new_quantity > $available_quantity) {
                $new_quantity = $available_quantity;
            }
            //zmena kvantity pre zaznam v kosiku
            $current_cart[$this->product_id] = ['quantity' => $new_quantity, 'image' => $this->image, 'price' => $this->price, 'name' => $this->name];
            $quantity_diff = $new_quantity - $this->quantity;
            $this->quantity = $new_quantity;
            $quantity_changed = true;

            session(['cart' => $current_cart]);

        }

        // ak bol produkt pridany vygeneruje sa signal na prepocitanie celkoveho suctu poloziek v kosiku
        // ak je quntity_diff mensia ako 0 (uberali sme) tak sa odpocita z celkovej sumy
        if ($quantity_changed) {
            $this->dispatch('totalSumChanged', $this->product_id, $this->price,$quantity_diff, true);
        }


        // odstranenie produktu ak bol zadany pocet rovny nule
        $this->visibility = $this->quantity > 0;

        // ked som skusal pouzit rovno funkciu discard() nefungovalo to
        if ($this->quantity == 0){
            $cart = session()->get('cart');
            $product_price = $cart[$this->product_id]['price'];
            $product_quantity = $cart[$this->product_id]['quantity'];

            unset($cart[$this->product_id]);
            session(['cart' => $cart]);

            //odstranenie z databazy ak je pouzivatel prihlaseny
            $logged_user = auth()->user();

            // zistenie ci je pouzivatel prihlaseny
            if ($logged_user != null){

                //ziskanie zaznamu z tabulk cart_items
                $cart_item_to_be_removed = CartItem::where('cart_items.cart_id','=',$logged_user->cart_id)
                    ->where('cart_items.product_id','=',$this->product_id)
                    ->first();

                //odstranenie zaznamu
                $cart_item_to_be_removed->delete();
            }


            $this->dispatch('productRemoved', $product_price, $product_quantity);
        }

        return view('livewire.live-cart-item');
    }


}
