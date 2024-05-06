<?php

namespace App\Livewire;

use Livewire\Component;

class OrderSummary extends Component
{
    public $totalSum;

    protected $listeners = ['updateOrderSummary'];
    public function render()
    {
        return view('livewire.order-summary');
    }

    public function updateOrderSummary($newTotalSum)
    {   $this->totalSum = $newTotalSum;
        return view('livewire.order-summary');
    }
}
