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

                if (session()->has('order_details')){
                    $order_details = session()->get('order_details');
                    return view('pages/customerInformationFilled', compact('order_details'));
                }
                else if (Auth::check()) {
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

    public function proceed(Request $request)
    {
        // ked pouzivatel submitne svoje udaje
        // ulozia sa v session (budu sa neskor ukladat do databazy)

        $order_details = [];

        $order_details['name'] = $request->input('name_in');
        $order_details['surname'] = $request->input('surname_in');
        $order_details['email'] = $request->input('email_in');
        $order_details['phone_number'] = $request->input('phone_in');

        //dodacie udaje
        $order_details['street'] = $request->input('street_in');
        $order_details['city'] = $request->input('city_in');
        $order_details['postal_code'] = $request->input('postal_code_in');
        $order_details['country'] = $request->input('country_in');



        // ak je pouzivatel prihlaseny tak sa ulozi aj jeho id
        if(Auth::user() != null){
            $order_details['user_id'] = Auth::user()->id;
        }else{
            $order_details['user_id'] = null;
        }



        session(['order_details' => $order_details]);
        return redirect()->route('payment-transport');
    }


}
