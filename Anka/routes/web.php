<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers as Co;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('home', Co\HomeController::class);
Route::resource('participant', Co\ParticipantController::class);
Route::resource('product', Co\ProductController::class);


//Route::get('/home', [HomeController::class, 'index'])->name('home');
//
//// You could change products to be the starting page as we need products upfront
//Route::get('/products', [ProductController::class, 'index'])->name('products');
//Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
//Route::get('/sales',[SalesController::class, 'index'])->name('sales');
//Route::get('/participants', [ParticipantController::class, 'index'])->name('participants');
//Route::get('/customers', [customerController::class, 'index'])->name('customers');
//Route::get('/deliver',[DeliveryController::class, 'index'])->name('delivery');
//Route::post('/deliver',[DeliveryController::class, 'store'])->name('delivery');
//
//Route::get('/items',[ItemController::class, 'index'])->name('items');
//Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
