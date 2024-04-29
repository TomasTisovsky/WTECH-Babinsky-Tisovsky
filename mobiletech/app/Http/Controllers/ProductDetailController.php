<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function showProductDetail(Request $request){

        // toto bude treba prerobit a pridat tu joiny na vlastnosti produktov
        $product = Product::where('id',$request->product_id);
        return view('pages/productDetail', ['product' => $product]);
    }
}
