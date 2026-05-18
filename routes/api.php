<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('apikey')->group(function () {
    
    Route::post('editarstock', [ProductController::class, 'editarStock']);
    Route::post('addbrand', [ProductController::class, 'addBrand']);
    Route::post('addcategory', [ProductController::class, 'addCategory']);
    Route::post('addproduct', [ProductController::class, 'addProduct']);
    Route::get('/products', [ProductController::class, 'listProducts']);

    Route::post('/products/buscar', [ProductController::class, 'buscar']);

});
