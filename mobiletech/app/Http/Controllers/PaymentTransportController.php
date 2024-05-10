<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Features\SupportEvents\HandlesEvents;

class PaymentTransportController extends Controller
{   use HandlesEvents;
    public function next()
    {
        return view('pages/paymentTransport');
    }


    public function setMethods(Request $request)
    {

        $type = $request->get('type');
        $method = $request->get('method');
        $price = $request->get('method_price');


        $current_order_details = session()->get('order_details');

        if ($current_order_details != null) {
            $current_order_details[$type] = $method;

            $current_order_details['add_costs'] = $price;
            /*if (isset($current_order_details['add_costs'])) {
                $current_order_details['add_costs'] = $price;
            } */
            session(['order_details' => $current_order_details]);
        }

        Component::dispatch('addAdditionalCosts', $price);

        return response()->json(['message' => 'Data received successfully'], 200);


    }

}
