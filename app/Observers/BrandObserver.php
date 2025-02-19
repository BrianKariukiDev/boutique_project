<?php

namespace App\Observers;

use App\Models\Brand;
use Illuminate\Support\Str;

class BrandObserver
{
    /**
     * Handle the Brand "created" event.
     */
    public function creating(Brand $brand): void
    {
        $brand->slug = Str::slug($brand->name);
    }
}