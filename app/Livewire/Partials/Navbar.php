<?php

namespace App\Livewire\Partials;

use App\Helpers\CartManagement;
use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public $cart_count=0;

    public function mount()
    {
        $this->cart_count=count(CartManagement::getCartItemsFromCookie());
    }

    #[On('update-cart-count')]
    public function updateCartCount($totalCount)
    {
        $this->cart_count=$totalCount;
    }

    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
