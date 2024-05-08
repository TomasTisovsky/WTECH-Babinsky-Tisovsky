<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentTransportController extends Controller
{
    public function next(){
        return view('pages/paymentTransport');
    }
}
