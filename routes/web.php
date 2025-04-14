<?php

use App\Livewire\Agent;
use App\Livewire\Auth\ForgotPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPage;
use App\Livewire\BrandsPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\Chatbot;
use App\Livewire\CheckoutPage;
use App\Livewire\CreateIPN;
use App\Livewire\HomePage;
use App\Livewire\MapPage;
use App\Livewire\MyOrderDetailsPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\ProductPage;
use App\Livewire\ProductsPage;
use App\Livewire\SuccessPage;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/forgot',ForgotPage::class)->name('password.request');
    Route::get('/login',LoginPage::class)->name('login');
    Route::get('/register',RegisterPage::class);
    Route::get('/reset/{token}',ResetPage::class)->name('password.reset');
});

Route::middleware('auth')->group(function(){
    Route::get('/logout',function(){
        Auth::logout();
        return redirect()->route('home');
    });
    Route::get('/checkout',CheckoutPage::class)->name('checkout');
    Route::get('/my-orders',MyOrdersPage::class);
    Route::get('/my-orders/{order_id}',MyOrderDetailsPage::class)->name('my-orders.show');
    Route::get('/success',SuccessPage::class);
    Route::get('/cancel',CancelPage::class);

    Route::get('/agent',Agent::class)->name('agent');

    
});

Route::get('/',HomePage::class)->name('home');
Route::get('/categories',CategoriesPage::class);
Route::get('/brands',BrandsPage::class);
Route::get('/products',ProductsPage::class);
Route::get('/products/{slug}',ProductPage::class);
Route::get('/cart',CartPage::class);

Route::get('/map/{mapid}',MapPage::class);


Route::get('/ipn',CreateIPN::class);


Route::get('/pesapal/ipn', [CreateIPN::class, 'handleIPN'])->name('pesapal.ipn');
Route::get('/pesapal/callback', [CreateIPN::class, 'handleCallback'])->name('pesapal.callback');
Route::get('/pesapal/cancel', [CreateIPN::class, 'handleCancel'])->name('pesapal.cancel');

Route::get('/bot',Chatbot::class)->name('chatbot');

use App\Http\Controllers\LeafletController;
use App\Livewire\ProductLeaflets;
use App\Livewire\UssdHandler;

Route::get('/leaflets/{category}', [ProductLeaflets::class, 'download']);

Route::match(['get','post'],'/ussd',UssdHandler::class)->name('ussd')
->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class]);;

