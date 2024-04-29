<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //show products on main
    public function show_top_products(){

        $products = Product::join('images','products.id','=','images.product_id')->select('products.*', 'images.*')->limit(3)->get();

        return view('pages/main-with-products', ['products' => $products]);
    }


}
