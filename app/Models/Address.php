<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'is_pickup_point',
        'latitude',
        'longitude'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
