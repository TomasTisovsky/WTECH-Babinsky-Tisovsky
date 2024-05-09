<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentTransportController extends Controller
{
    public function next(){
        return view('pages/paymentTransport');
    }


    public function setMethods(Request $request)
    {

        $type = $request->get('type');
        $method = $request->get('method');
        $price = $request->get('method_price');

        $current_order_details = session()->get('order_details');

        if($current_order_details != null) {
            $current_order_details[$type] = $method;
            session(['order_details' => $current_order_details]);
        }

        return response()->json(['message' => 'Data received successfully'], 200);


    }

}
