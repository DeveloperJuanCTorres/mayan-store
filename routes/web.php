<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/tienda', [HomeController::class, 'tienda'])->name('tienda');
Route::get('/contactanos', [HomeController::class, 'contactanos'])->name('contactanos');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/product/{id}', [HomeController::class, 'show']);

Route::get('/apibrand', [HomeController::class, 'apiBrand'])->name('apibrand');
Route::get('/apicategory', [HomeController::class, 'apiCategory'])->name('apicategory');
Route::get('/apiproduct', [HomeController::class, 'apiProduct'])->name('apiproduct');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/content', [CartController::class, 'content']);
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');;
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

Route::post('/checkout/pedido', [PedidoController::class, 'pedido'])
    ->name('checkout.pedido');

Route::post('/correo',[App\Http\Controllers\HomeController::class,'correoContact']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
