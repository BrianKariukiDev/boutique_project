<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\PickupPoint;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Checkout Page - Karis Boutique')]
class CheckoutPage extends Component
{

    public $pickup_points;
    public $selected_pickup_point;
    public $phone;
    public $city;
    public $payment_method;

    public function mount()
    {
        $this->pickup_points=PickupPoint::query()->get();
    }

    public function placeOrder()
    {
        $this->validate([
            'phone'=>'required|numeric|min:10',
            'city'=>'required|min:3|max:50',
            'selected_pickup_point'=>'required|exists:pickup_points,id',
            'payment_method'=>'required|in:cod,mobile_money'
        ]);

        dd($this->phone,$this->city,$this->selected_pickup_point,$this->payment_method);
    }

    public function render()
    {
        $user=Auth::user();
        $cartItems=CartManagement::getCartItemsFromCookie();
        $grandTotal=CartManagement::calculateGrandTotal($cartItems);
        return view('livewire.checkout-page',[
            'cartItems'=>$cartItems,
            'grandTotal'=>$grandTotal,
            'user'=>$user
        ]);
    }
}
