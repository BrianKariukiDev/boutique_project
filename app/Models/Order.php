<?php

namespace App\Models;

use App\Mail\OrderDelivered;
use App\Mail\OrderShipped;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'grand_total',
        'payment_method',
        'payment_status',
        'status',
        'currency',
        'shipping_amount',
        'shipping_discount',
        'notes',
        'shipping_method',
        'pickup_point_id',
        'order_tracking_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public function Orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function Address()
    {
        return $this->hasOne(Address::class);
    }

    public function pickupPoint()
    {
        return $this->belongsTo(PickupPoint::class);
    }



    protected static function booted()
{
    static::updating(function ($order) {
        //if ($order->isDirty('status')) {
        //    Log::info('Old status: ' . $order->getOriginal('status'));
        //    Log::info('New status: ' . $order->status);
        //}
    
        if ($order->isDirty('status') && $order->status == 'shipped' || $order->status == 'Shipped') {
            //Log::info('Sending email to: ' . $order->user->email);
            Mail::to($order->user->email)->send(new OrderShipped($order));
        }

        if ($order->isDirty('status') && $order->status == 'delivered' || $order->status == 'Delivered') {
            //Log::info('Sending email to: ' . $order->user->email);
            Mail::to($order->user->email)->send(new OrderDelivered($order));
        }
    });
    
}
}
