<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVendorController;


Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::group([ 'middleware' => 'auth' ], function(){
    Route::resource('product-vendors', ProductVendorController::class);
    Route::resource('product-brands', ProductBrandController::class);
    Route::get('product-types', [ProductTypeController::class, 'index']);
    Route::post('add-product-type', [ProductTypeController::class, 'store']);
    Route::resource('products', ProductController::class);
});
