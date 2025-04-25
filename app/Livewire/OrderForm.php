<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;
use App\Services\AfricasTalkingService;

class OrderForm extends Component
{
    public $customer_name;
    public $customer_phone;
    public $selectedProducts = [];
    public $quantities = [];

    protected $rules = [
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:15',
        'selectedProducts' => 'required|array|min:1',
        'quantities.*' => 'required|integer|min:1',
    ];

    public function submit()
    {
        $this->validate();

        $order = Order::create([
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
        ]);

        $total = 0;

        foreach ($this->selectedProducts as $index => $productId) {
            $product = Product::findOrFail($productId);
            $quantity = $this->quantities[$index] ?? 1;

            $order->products()->attach($product->id, ['quantity' => $quantity]);
            $total += $product->price * $quantity;
        }

    }

    public function render()
    {
        return view('livewire.order-form', [
            'products' => Product::all()
        ]);
    }
}
