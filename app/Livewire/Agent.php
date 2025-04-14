<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Order;
use App\Models\PickupPoint;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use NjoguAmos\Pesapal\DTOs\PesapalAddressData;
use NjoguAmos\Pesapal\DTOs\PesapalOrderData;
use NjoguAmos\Pesapal\Enums\IpnType;
use NjoguAmos\Pesapal\Enums\ISOCountryCode;
use NjoguAmos\Pesapal\Enums\ISOCurrencyCode;
use NjoguAmos\Pesapal\Enums\RedirectMode;
use NjoguAmos\Pesapal\Facades\Pesapal;
use NjoguAmos\Pesapal\Models\PesapalIpn;

class Agent extends Component
{
    public $pickup_points;
    public $orders;
    public $order;
    public $categories;

    public function mount()
    {
        if(Auth::user()->role !== 'agent') {
            abort(403, 'Unauthorized');
        }
        
        $this->pickup_points = PickupPoint::where('user_id', Auth::user()->id)->get();

        $this->categories=Category::all();

        $this->orders= Order::whereIn('pickup_point_id', $this->pickup_points->pluck('id')->toArray())->latest()->get();

        if (session('order_success')) {
            LivewireAlert::title(session('order_success'))->success()->position('center')->timer(5000)->toast()->show();
        }
    }


public function instantiateMobileMoneyPayment($order)
{
    $this->order = $order;

    session(['order' => $this->order['id']]);
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
        phoneNumber: $this->order['user']['phone'],
        emailAddress: $this->order['user']['email'],
        countryCode: ISOCountryCode::KE,
        //firstName: 'Amos',
        middleName: $this->order['user']['name'],
        //    lastName: ''
        //line2: "Gil House, Nairobi, Tom Mboya Street",
        city: $this->order['user']['city'],
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
        return view('livewire.agent');
    }
}
