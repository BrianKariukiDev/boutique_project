<?php

namespace App\Models;

use App\Observers\BrandObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(BrandObserver::class)]
class Brand extends Model
{
    protected $fillable=[
        'name',
        'slug',
        'image',
        'is_active'
    ];
}
