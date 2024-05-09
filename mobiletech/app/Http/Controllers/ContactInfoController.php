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
                    // ak je pouzivatel prihlseny tak sa predvyplnia jeho udaje (adresa nie)
                    return view('pages/customerInformationAuth', compact('user'));
                } else {
                    // ak nie je pouzivatel prihlaseny tak sa nic nevyplni
                    return view('pages/customerInformation');
                }
            }

        }
        return redirect()->route('shopping-cart-view');


    }


}
