<?php

use App\Models\Product;

it('Can create a Product slug automatically', function () {
    Product::where('name', 'New Product')->delete();

    $product = Product::factory()->create([
        'name' => 'New Product'
    ]);

    expect($product->fresh()->slug)->toBe('new-product');
});