<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
