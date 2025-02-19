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
        'agent_id'
    ];
}
