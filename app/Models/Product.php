<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
