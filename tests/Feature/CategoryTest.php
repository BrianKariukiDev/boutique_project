<?php

declare(strict_types=1);

use App\Models\Category;

it('Can create a category slug automatically',function(){
    Category::where('name','New Category')->delete();
    
    $category = Category::factory()->create([
        'name' => 'New Category'
    ]);

    expect($category->fresh()->slug)->toBe('new-category');
});
