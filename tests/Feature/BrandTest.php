<?php

use App\Models\Brand;

it('Can create a brand slug automatically',function(){
    Brand::where('name','New Brand')->delete();

    $brand = Brand::factory()->create([
        'name' => 'New Brand'
    ]);

    expect($brand->fresh()->slug)->toBe('new-brand');
});
