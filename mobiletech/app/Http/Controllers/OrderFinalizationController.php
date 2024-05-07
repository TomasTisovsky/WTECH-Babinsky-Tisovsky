<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderFinalizationController extends Controller
{
    public function next(){
        return view('pages/orderFinalization');
    }
}
