<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderSuccessfulController extends Controller
{
    public function show()
    {
        return view('pages/orderSuccessful');
    }
}
