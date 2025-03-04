<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Brands Page-Karis Boutique')]
class BrandsPage extends Component
{
    use WithPagination;

    public $priceRange=500000;

    #[Url(as:'sortBy', history:true)]
    public $sort="1";

    #[Url(as:'categories', history:true)]
    public $selectedCategories = [];

    #[Url(as:'brands',history:true)]
    public $selectedBrands = [];

    //public function updatedSelectedCategories()
    //{
    //    $this->resetPage();
    //}

    //public function updatedSelectedBrands()
    //{
    //    $this->resetPage();
    //}

    public function mount(){
        $this->selectedCategories=Category::where('is_active',1)->pluck('id')->toArray();
    }

    public function render()
    {
        $query = Product::query();

        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }

        if (!empty($this->selectedBrands)) {
            $query->whereIn('brand_id', $this->selectedBrands);
        }

        if($this->sort==="2"){
            $query->orderBy('sale_price','asc');
        }else{
            $query->orderBy('created_at','desc');
        }

        if($this->priceRange){
            $query->where('sale_price','<=',$this->priceRange);
        }

        $products = $query->paginate(6);

        $categories = Category::where('is_active', 1)->get();
        $brands = Brand::where('is_active', 1)->get();

        return view('livewire.categories-page', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'priceRange'=>$this->priceRange
        ]);
    }
}
