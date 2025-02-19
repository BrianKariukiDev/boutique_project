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
    ];
}
