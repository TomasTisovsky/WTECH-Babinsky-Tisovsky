<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //show products on main
    public function show_top_products()
    {

        $single_images_for_each_product = Image::selectRaw('MIN(id) as min_id')->groupBy('product_id')->get();
        $products = Product::join('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'images.*')
            ->whereIn('images.id', $single_images_for_each_product)->limit(3)->get();

        return view('pages/mainWithProducts', ['products' => $products]);
    }

}
