<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactInfoController extends Controller
{

    public function enter_customer_information(){

        // kontrola ci ide o prihlaseneho pouzivatela
        
        if (Auth::check()){
            $user = Auth::user();
            return view('pages/customerInformationAuth', compact('user'));
        }else{
            return view('pages/customerInformation');
        }
    }




}
