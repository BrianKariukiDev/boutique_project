<?php

use App\Livewire\BrandsPage;
use App\Livewire\CategoriesPage;
use App\Livewire\HomePage;
use App\Livewire\ProductsPage;
use Illuminate\Support\Facades\Route;

Route::get('/',HomePage::class);
Route::get('/categories',CategoriesPage::class);
Route::get('/brands',BrandsPage::class);
Route::get('/products',ProductsPage::class);
