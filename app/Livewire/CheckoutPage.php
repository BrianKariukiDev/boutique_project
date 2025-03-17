<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\PickupPoint;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use NjoguAmos\Pesapal\DTOs\PesapalAddressData;
use NjoguAmos\Pesapal\DTOs\PesapalOrderData;
use NjoguAmos\Pesapal\Enums\IpnType;
use NjoguAmos\Pesapal\Enums\ISOCountryCode;
use NjoguAmos\Pesapal\Enums\ISOCurrencyCode;
use NjoguAmos\Pesapal\Enums\RedirectMode;
use NjoguAmos\Pesapal\Models\PesapalIpn;
use NjoguAmos\Pesapal\Pesapal;

#[Title('Checkout Page - Karis Boutique')]
class CheckoutPage extends Component
{
    public $pickup_points;
    public $selected_pickup_point;
    public $phone;
    public $city;
    public $payment_method;
    public $total;

    public function mount()
    {
        $this->pickup_points = PickupPoint::query()->get();
        $cartItems = CartManagement::getCartItemsFromCookie();
        $this->total = CartManagement::calculateGrandTotal($cartItems);
        $this->phone = Auth::user()->phone??null;
        $this->city = Auth::user()->city??null;

    }

    public function placeOrder()
    {
        $this->validate([
            'phone' => 'required|numeric|min:10',
            'city' => 'required|min:3|max:50',
            'selected_pickup_point' => 'required|exists:pickup_points,id',
            'payment_method' => 'required|in:cod,mobile_money'
        ]);

        $this->dispatch('pickup_point_id', ['pickup_point_id' => $this->selected_pickup_point]);

        if ($this->payment_method == 'mobile_money') {
            return $this->instantiateMobileMoneyPayment();
        }else{
            dd('Cash on delivery');
        }
    }

    public function instantiateMobileMoneyPayment()
    {
        $ipn = PesapalIpn::latest()->first();
        if (!$ipn) {
            $ipn = Pesapal::createIpn(
                url: route('pesapal.ipn'),
                ipnType: IpnType::GET,
            );
        }

        return $this->submitPesapalPayment($ipn->ipn_id);
    }

    public function submitPesapalPayment($ipnId)
    {
        $orderData = new PesapalOrderData(
            id: fake()->uuid(),
            currency: ISOCurrencyCode::KES,
            amount: 1,
            description: 'Test order',
            callbackUrl: route('pesapal.callback'),
            notificationId: $ipnId,
            cancellationUrl: route('pesapal.cancel'),
            redirectMode: RedirectMode::PARENT_WINDOW,
        );

        // All fields are optional except either phoneNumber or emailAddress
        $billingAddress = new PesapalAddressData(
            phoneNumber: $this->phone,
            emailAddress: Auth::user()->email,
            countryCode: ISOCountryCode::KE,
            //firstName: 'Amos',
            middleName: Auth::user()->name,
            //    lastName: ''
            //line2: "Gil House, Nairobi, Tom Mboya Street",
                city: $this->city,
                state: 'Kenya',
            //    postalCode: "",
            //    zipCode: "",
        );

        $order = Pesapal::createOrder(
            orderData: $orderData,
            billingAddress: $billingAddress,
        );

        if ($order && isset($order['redirect_url'])) {
            return redirect()->away($order['redirect_url']); // Redirect user to Pesapal payment page
        }

        session()->flash('error', 'Failed to process payment. Try again.');
    }

    public function render()
    {
        $user = Auth::user();
        $cartItems = CartManagement::getCartItemsFromCookie();
        $grandTotal = CartManagement::calculateGrandTotal($cartItems);
        return view('livewire.checkout-page', [
            'cartItems' => $cartItems,
            'grandTotal' => $grandTotal,
            'user' => $user
        ]);
    }
}
