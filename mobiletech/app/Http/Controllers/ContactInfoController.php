<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactInfoController extends Controller
{

    public function enter_customer_information()
    {

        // kontrola ci jestvuje nakupny kosik
        if (session()->has('cart')) {
            if (count(session('cart'))> 0) {
                if (Auth::check()) {
                    // kontrola ci ide o prihlaseneho pouzivatela
                    $user = Auth::user();
                    return view('pages/customerInformationAuth', compact('user'));
                } else {
                    return view('pages/customerInformation');
                }
            }

        }
        return redirect()->route('shopping-cart-view');


    }


}
