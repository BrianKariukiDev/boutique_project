<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Product Page-Karis Boutique')]
class ProductPage extends Component
{

    public $slug;

    public function mount($slug)
    {
        $this->slug=$slug;
    }

    public function render()
    {
        $product=Product::where('slug',$this->slug)->get();
        return view('livewire.product-page',[
            'product'=>$product,
        ]);
    }
}
