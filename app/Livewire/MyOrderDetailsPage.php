<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PickupPoint;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('My Order Details Page')]
class MyOrderDetailsPage extends Component
{
    public $order_id;
    public $user;
    public $order;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
        $this->order=Order::where('id',$this->order_id)->first(['user_id','created_at','status','payment_status','grand_total','pickup_point_id']);
        $this->user=User::where('id',$this->order->user_id)->first(['name','phone']);
    }

    public function render()
    {
        $items=OrderItem::where('order_id',$this->order_id)->get(['unit_amount','quantity','total_amount','product_id']);
        $pickup_point=PickupPoint::where('id',$this->order->pickup_point_id)->first(['name','city']);
        return view('livewire.my-order-details-page',[
            'items'=>$items,
            'order'=>$this->order,
            'pickup_point'=>$pickup_point,
            'user'=>$this->user,
        ]);
    }
}
