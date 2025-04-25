<?php

namespace App\Models;

use App\Mail\OrderDelivered;
use App\Mail\OrderShipped;
use App\Services\AfricasTalkingService;
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


                // Send an SMS for "Order Received"
                $sms = new AfricasTalkingService();
                $message = "Hello {$order->user->name}, your order (#{$order->id}) has left for delivery. We will notify you once it reaches the pickup point. Thank you!";
                $sms->sendSmsWithSubject($order->user->phone, 'Order Shipped', $message);
            }

            if ($order->isDirty('status') && $order->status == 'delivered' || $order->status == 'Delivered') {
                //Log::info('Sending email to: ' . $order->user->email);
                Mail::to($order->user->email)->send(new OrderDelivered($order));

                // Send an SMS for "Order Received"
                $sms = new AfricasTalkingService();
                $message = "Hello {$order->user->name}, your order (#{$order->id}) has arrived.Kindly colleect it at {$order->pickupPoint->name}. You are required to pay Kshs{$order->grand_total} before picking. Thank you!";
                $sms->sendSmsWithSubject($order->user->phone, 'Order Delivered', $message);
            }
        });
    }
}
