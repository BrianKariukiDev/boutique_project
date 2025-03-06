<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Component;

class CartPage extends Component
{
    public $cartItems=[];
    public $grandTotal=0;

    public function mount()
    {
        $this->cartItems= CartManagement::getCartItemsFromCookie();

        $this->grandTotal=CartManagement::calculateGrandTotal();

    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
