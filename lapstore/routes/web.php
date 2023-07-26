<?php

use App\Http\Controllers\AdminAuthController;
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

Route::get('/', function () {
    return view('welcome');
});

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