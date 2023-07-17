<?php

use App\Http\Controllers\AdminAuthController;
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

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout']);
    Route::get('/user', [AdminAuthController::class, 'getUser']); // Wrap in an array
});

Route::post('/login', [AdminAuthController::class, 'login']);
