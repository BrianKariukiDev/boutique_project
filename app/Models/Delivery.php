<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'order_id',
        'address_id',
        'is_pickupPoint',
        'nearest_pickup_point_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function pickupPoint()
    {
        return $this->belongsTo(PickupPoint::class);
    }
}
