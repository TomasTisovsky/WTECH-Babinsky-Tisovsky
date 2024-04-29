<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //show products on main
    public function show_top_products(){

        return view('pages/main-with-products', ['products' => Product::all()]);
    }


}
