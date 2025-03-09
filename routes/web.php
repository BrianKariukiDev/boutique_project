<?php

use App\Livewire\Auth\ForgotPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPage;
use App\Livewire\BrandsPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\MapPage;
use App\Livewire\MyOrderDetailsPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\ProductPage;
use App\Livewire\ProductsPage;
use App\Livewire\SuccessPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/forgot',ForgotPage::class);
    Route::get('/login',LoginPage::class)->name('login');
    Route::get('/register',RegisterPage::class);
    Route::get('/reset',ResetPage::class);
});

Route::middleware('auth')->group(function(){
    Route::get('/logout',function(){
        Auth::logout();
        return redirect()->route('home');
    });
    Route::get('/checkout',CheckoutPage::class);
    Route::get('/my-orders',MyOrdersPage::class);
    Route::get('/my-orders/{order}',MyOrderDetailsPage::class);
    Route::get('/success',SuccessPage::class);
    Route::get('/cancel',CancelPage::class);
    
});

Route::get('/',HomePage::class)->name('home');
Route::get('/categories',CategoriesPage::class);
Route::get('/brands',BrandsPage::class);
Route::get('/products',ProductsPage::class);
Route::get('/products/{slug}',ProductPage::class);
Route::get('/cart',CartPage::class);

Route::get('/map/{mapid}',MapPage::class);