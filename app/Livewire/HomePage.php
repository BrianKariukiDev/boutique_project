<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class HomePage extends Component
{
    public function mount()
    {
        if (session('payment_success')) {
            LivewireAlert::title('Order placed Successfully')->success()->position('top-center')->timer(1000)->toast()->show();
        }
    }
    public function render()
    {
        $brands = Brand::where('is_active', '1')->get();
        $categories = Category::where('is_active', '1')->get();
        $latestProducts = Product::latest()->limit(6)->get();
        $selectedForYou = Product::inRandomOrder()->limit(6)->get();
        $trendingProducts = Product::inRandomOrder()->limit(6)->get();
        return view('livewire.home-page', [
            'brands' => $brands,
            'categories' => $categories,
            'latestProducts' => $latestProducts,
            'selectedProducts' => $selectedForYou,
            'trendingProducts' => $trendingProducts,
        ]);
    }
}
