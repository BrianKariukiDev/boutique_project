<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PickupPoint extends Model
{
    protected $fillable = [
        'name',
        'city',
        'latitude',
        'longitude',
        'user_id'
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

    // In app/Models/PickupPoint.php
protected static function booted()
{
    static::saved(function ($pickupPoint) {
        if ($pickupPoint->user_id) {
            $user = User::find($pickupPoint->user_id);
            if ($user && $user->role !== 'agent') {
                $user->update(['role' => 'agent']);
            }
        }
    });
}

}
