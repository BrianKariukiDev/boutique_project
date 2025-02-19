<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ProductObserver::class)]
class Product extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'image',
        'description',
        'buying_price',
        'sale_price',
        'is_active',
        'is_featured',
        'in_stock',
        'on_sale',
    ];

    protected  $casts=[
        'images'=>'array'
    ];
}
