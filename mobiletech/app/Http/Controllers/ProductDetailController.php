<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function showProductDetail(Request $request){

        // ziskanie vlastnosti produktov
        $product = Product::join('product_parameters','products.id','=','product_id')->join('sub_categories', 'sub_category_parameter_id','=','sub_categories.id')->where('products.id',$request->product_id)->first();

        // ziskanie obrazkov produktu
        $product_images = Image::where('product_id',$request->product_id)->get();


        return view('pages/productDetail', ['product' => $product, 'product_images' => $product_images]);
    }
}
