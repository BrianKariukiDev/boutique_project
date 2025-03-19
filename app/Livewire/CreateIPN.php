<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use NjoguAmos\Pesapal\Pesapal;

class CreateIPN extends Component
{

    public $pickup_point_id;

    public function handleIPN(Request $request)
    {
        // Process IPN from Pesapal
        return response()->json(['message' => 'IPN received'], 200);
    }

    public function handleCallback(Request $request)
    {
        $this->pickup_point_id=session('pickup_point_id');
        $orderTrackingId = $request->query('OrderTrackingId');

        if ($orderTrackingId) {
            $transaction = Pesapal::getTransactionStatus($orderTrackingId);

            if ($transaction && isset($transaction['payment_status_description'])) {
                if ($transaction['payment_status_description'] === 'Completed') {

                    $items = CartManagement::getCartItemsFromCookie();
                    $totalPrice = CartManagement::calculateGrandTotal($items);

                    $order = Order::create([
                        'user_id' => Auth::id(),
                        'order_tracking_id' => $orderTrackingId,
                        'grand_total' => $totalPrice,
                        'payment_status' => 'Paid',
                        'payment_method' => 'Mobile Money',
                        'pickup_point_id' => $this->pickup_point_id,
                        'currency' => 'Kshs'
                    ]);

                    foreach ($items as $item) {
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'unit_amount' => $item['unit_amount'],
                            'total_amount' => $item['total_amount'],
                        ]);
                    }
                    session()->flash('order_success', 'Payment successful!Order placed successfully.');
                    CartManagement::clearCartItemsFromCookie();
                    return redirect()->route('home'); // Adjust as needed
                }
            }
        }

        session()->flash('error', 'Payment failed. Please try again.');
        return redirect()->route('checkout'); // Adjust as needed
    }

    public function handleCancel()
    {
        session()->flash('payment_error', 'Payment was canceled.Please try again.');
        return redirect()->route('checkout');
    }
    public function render()
    {
        return view('livewire.create-i-p-n');
    }
}
