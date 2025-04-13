<?php

namespace App\Livewire;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class ProductLeaflets extends Component
{

public static function download(Category $category)
{
    $products = $category->products;

    $pdf = Pdf::loadView('livewire.product', [
        'category' => $category,
        'products' => $products,
    ]);

    return $pdf->download($category->name . '-leaflet.pdf');
}

    public function render()
    {
       
    $categories = Category::with(['products'])->get();

    return view('livewire.product', [
        'categories' => $categories
    ]);
    }
}
