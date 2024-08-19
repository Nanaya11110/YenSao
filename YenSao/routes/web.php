<?php

use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\LoginController;
use App\Livewire\AboutUs;
use App\Livewire\AllProduct;
use App\Livewire\Cart;
use App\Livewire\CheckOut;
use App\Livewire\Contact;
use App\Livewire\PostDetail;
use App\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('Home');

Route::get('AllProduct',AllProduct::class)->name('AllProduct');
Route::get('/product/{id}',ProductDetail::class)->name('ProductDetail');
Route::get('/Post/{id}',PostDetail::class)->name('PostDetail');
Route::get('/AboutUs',AboutUs::class)->name('AboutUs');
Route::get('/Contact',Contact::class)->name('Contact');
Route::get('/Cart',Cart::class)->name('Cart');
Route::get('/Checkout',CheckOut::class)->name('CheckOut');




Route::controller(LoginController::class)->group(function()
{
    Route::get('/Login','show')->name('Login');
    Route::post('/authenticate', 'authenticate')->name('Auth');
    Route::get('/logout','logout')->name('Logout');
    Route::get('/SignUp','SignUp')->name('SignUp');
    Route::post('/SignUpStore','SignUpStore')->name('SignUpStore');
});