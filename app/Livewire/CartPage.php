<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Component;

class CartPage extends Component
{

    public $cartItems=[];
    public $grandTotal=0;
    public $totalCount=0;
    public $quantity;
    public function mount()
    {
        $this->cartItems= CartManagement::getCartItemsFromCookie();

        $this->grandTotal=CartManagement::calculateGrandTotal($this->cartItems);

    }

    public function increaseQty($product_id)
    {
        $this->cartItems=CartManagement::incrementCartItemQty($product_id);
        $this->grandTotal=CartManagement::calculateGrandTotal($this->cartItems);
    }

    public function decreaseQty($product_id)
    {
        $this->cartItems=CartManagement::decrementCartItemQty($product_id);
        $this->grandTotal=CartManagement::calculateGrandTotal($this->cartItems);
    }

    
    public function removeFromCart($product_id)
    {
        $this->cartItems=CartManagement::removeItemFromCart($product_id);

        $this->grandTotal=CartManagement::calculateGrandTotal($this->cartItems);

        $this->totalCount=count($this->cartItems);

        $this->dispatch('update-cart-count',totalCount: $this->totalCount)->to(Navbar::class);

        $this->dispatch('refreshComponent');
    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
