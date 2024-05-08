<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\CartItem;
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

    public function add()
    {
        $this->quantity++;
        return view('livewire.add-to-cart-quantity');
    }

    public function sub()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
        return view('livewire.add-to-cart-quantity');
    }

    public function submit()
    {
        // vpodstate sanitacia vstupu
        // ak zadal pouzivatel string tak prednastavena hodnota bude 1
        $this->quantity = (int)$this->quantity;
        if (!filter_var($this->quantity, FILTER_VALIDATE_INT)) {
            $this->quantity = 1;
        }

        // ziskanie kvantity produktu
        $product = Product::where('id', $this->product_id)->get()->first();
        // pocet dostupnych produktov
        $available_quantity = $product->stock_quantity;

        $logged_user = null;
        // zistenie ci je pouzivatel prihlaseny
        if (auth()->user() != null) {
            //ziskanie udajov o pouzivatelovi
            $logged_user = auth()->user();
        }


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
                $current_cart[$this->product_id] = ['quantity' => $this->quantity + $current_cart[$this->product_id]['quantity'], 'image' => $this->image, 'price' => $this->price, 'name' => $this->name];
                $product_added = true;

                if ($logged_user != null) {
                    // zmena kvantity v databaze, konkretne v tabulke cart items

                    // ziskanie zaznamu o produkte v kosiku
                    $cart_item = CartItem::where('product_id', $this->product_id)
                        ->where('cart_id', $logged_user->cart_id)->first();

                    // zmena kvantity produktu v kosiku
                    $cart_item->quantity = $this->quantity + $current_cart[$this->product_id]['quantity'];

                    //ulozenie zmien
                    $cart_item->save();
                }


            } else {
                // kontrola ci sa neprekrocil pocet produktov "na sklade"
                // ak bol prekroceny tak sa prida max produktov kolko sa moze pridat
                if ($this->quantity > $available_quantity) {
                    $this->quantity = $available_quantity;
                }
                //zmena kvantity pre zaznam v kosiku
                $current_cart[$this->product_id] = ['quantity' => $this->quantity, 'image' => $this->image, 'price' => $this->price, 'name' => $this->name];
                $product_added = true;


                if ($logged_user != null) {

                    // vytvorenie zaznamu v databaze, konkretne v tabulke cart_items
                    $cart_item = new CartItem();
                    $cart_item->cart_id = $logged_user->cart_id;
                    $cart_item->product_id = $this->product_id;
                    $cart_item->quantity = $this->quantity;

                    //ulozenie noveho zaznamu
                    $cart_item->save();
                }

            }


            session(['cart' => $current_cart]);

        } else {
            // vytvorenie pola poli, ktore reprezentujenakubny kosik

            // kontrola ci sa neprekrocil pocet produktov "na sklade"
            // ak bol prekroceny tak sa prida max produktov kolko sa moze pridat
            if ($this->quantity >= $available_quantity) {
                $this->quantity = $available_quantity;
            }

            session(['cart' => array($this->product_id => ['quantity' => $this->quantity, 'image' => $this->image, 'price' => $this->price, 'name' => $this->name])]);
            $product_added = true;

            if ($logged_user != null) {

                //vytvorenie zaznamu v tabulke carts
                $new_user_cart = new Cart();
                $new_user_cart->save();

                //pridanie kosika pouzivatelovi
                $logged_user->cart_id = $new_user_cart->id;
                $logged_user->save();

                // vytvorenie zaznamu v databaze, konkretne v tabulke cart_items
                $cart_item = new CartItem();
                $cart_item->cart_id = $logged_user->cart_id;
                $cart_item->product_id = $this->product_id;
                $cart_item->quantity = $this->quantity;

                //ulozenie noveho zaznamu
                $cart_item->save();
            }


        }

        // ak bol produkt pridany vygeneruje sa signal na prepocitanie celkoveho suctu poloziek v kosiku
        if ($product_added) {
            $this->quantity = 1;
            $current_cart = session()->get('cart');
            // dispatchuje sa len kvantita o ktoru sa pocet zmenil z povodneho
            $this->dispatch('totalSumChanged', $this->product_id, $this->price, $this->quantity, false);
        }

        return view('livewire.add-to-cart-quantity');
    }
}
