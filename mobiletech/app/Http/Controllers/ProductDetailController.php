<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function showProductDetail(Request $request){

        // ziskanie vlastnosti produktov
        $product_parameters = Product::join('product_parameters','products.id','=','product_parameters.product_id')
            ->join('sub_category_parameters', 'product_parameters.sub_category_parameter_id','=','sub_category_parameters.id')
            ->join('sub_categories', 'sub_category_parameters.sub_category_id','=','sub_categories.id')
            ->where('products.id',$request->product_id)
            ->orderBy('sub_category_id','asc')
            ->orderBy('sub_category_parameter_id', 'asc')
            ->get();

        // ziskanie obrazkov produktu
        $product_images = Image::where('product_id',$request->product_id)->get();


        return view('pages/productDetail', ['product_parameters' => $product_parameters, 'product_images' => $product_images]);
    }
}
