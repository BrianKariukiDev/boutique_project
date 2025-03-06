<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Product Page-Karis Boutique')]
class ProductPage extends Component
{
    public $slug;

    public $quantity=1;

    public function decrementQty()
    {
        if($this->quantity>1){
            $this->quantity--;
        }
    }

    public function incrementQty()
    {
        $this->quantity++;
        //dd(Cookie::get('cart_items'));

    }

    public function addToCartWithQty($product_id,$quantity){
         $totalCount=CartManagement::addItemTocartWithQty($product_id,$quantity);
         $this->dispatch('update-cart-count',totalCount: $totalCount)->to(Navbar::class);

         LivewireAlert::title('Added to cart successfully')->success()->position('bottom-end')->timer(1000)->toast()->show();
    }

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
