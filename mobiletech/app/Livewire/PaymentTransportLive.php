<?php

namespace App\Livewire;

use Livewire\Component;

class PaymentTransportLive extends Component
{
    public $transportMethodsData =[
        ['kurier',4.99],
        ['osobny_odber',0],
    ];

    public $transportMethodsClickStatus=[false,false];

    public $paymentMethodsData =[
        ['karta',0],
        ['dobierka',2.99],
        ['bankovy_prevod',0],
    ];

    public $paymentMethodsClickStatus=[false,false, false];


    public function render()
    {
        $order_details = session()->get('order_details');

        if ($order_details != null){
            if ( array_key_exists('transport',$order_details)){
                $index =array_search($order_details['transport'], array_column($this->transportMethodsData, 0));
                $this->transportMethodsClickStatus[$index] = true;
            }
            if (array_key_exists('payment',$order_details)){
                $index =array_search($order_details['payment'], array_column($this->paymentMethodsData, 0));
                $this->paymentMethodsClickStatus[$index] = true;
            }

        }

        return view('livewire.payment-transport-live');
    }

    public function submitTransportMethod($transportMethodId)
    {
        $selectedMethod = $this->transportMethodsData[$transportMethodId];
        // vynulovanie kliknutia
        foreach ($this->transportMethodsClickStatus as &$value) {
            $value = false;
        }

        $this->transportMethodsClickStatus[$transportMethodId] = true;

        $current_order_details = session()->get('order_details');
        if ($current_order_details != null) {

            // pridanie do session dat o objednavke
            $current_order_details['transport'] = $selectedMethod[0];
            $current_order_details['transport_costs'] =  $selectedMethod[1];

            session(['order_details' => $current_order_details]);

            $this->dispatch('addAdditionalCosts',$selectedMethod[1]);

        }
        return view('livewire.payment-transport-live');
    }

    public function submitPaymentMethod($paymentMethodId)
    {
        $selectedMethod = $this->paymentMethodsData[$paymentMethodId];
        // vynulovanie kliknutia
        foreach ($this->paymentMethodsClickStatus as &$value) {
            $value = false;
        }

        $this->paymentMethodsClickStatus[$paymentMethodId] = true;

        $current_order_details = session()->get('order_details');
        if ($current_order_details != null) {

            // pridanie do session dat o objednavke
            $current_order_details['payment'] = $selectedMethod[0];
            $current_order_details['payment_costs'] =  $selectedMethod[1];

            session(['order_details' => $current_order_details]);

            $this->dispatch('addAdditionalCosts',$selectedMethod[1]);

        }
        return view('livewire.payment-transport-live');
    }


}
