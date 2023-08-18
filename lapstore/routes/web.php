<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [FrontendController::class,'index'])->name('products.index');
Route::get('product/{slug}',[ProductController::class,'show']);
Route::get('/search',[ProductController::class,'search']);
Route::get('/products/{slug}',[ProductController::class,'category'])->name('products.category');

Route::get('/cart',[CartController::class,'index'])->name('cart.view');
Route::post('/cart/add/{slug}',[CartController::class,'Add'])->name('cart.add');

Route::post('/favourite/addremove/{slug}',[FavouriteController::class,'addremove'])->name('favourite.add');
Route::get('/favourite',[FavouriteController::class,'index'])->name('favourite.view');

Route::middleware('auth:sanctum')->group(function () {
Route::get('/user', [AdminAuthController::class, 'getUser']);
Route::post('/api/logout', [AdminAuthController::class, 'logout']);
Route::post('/api/new-product',[ProductController::class,'create']);
Route::get('/api/get-Products',[ProductController::class,'all']);
Route::get('/api/get-product/{slug}',[ProductController::class,'get']);
Route::post('/api/delete-product/{slug}',[ProductController::class,'destroy']);
Route::post('/api/edit-product/{slug}',[ProductController::class,'edit']);

});


Route::post('/api/login', [AdminAuthController::class, 'login']);