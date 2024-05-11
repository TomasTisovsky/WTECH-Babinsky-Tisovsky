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


}
