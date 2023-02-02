<?php

use App\Http\Controllers\View\ProductViewController;
use Illuminate\Support\Facades\Route;

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

// all products
Route::get('/',[ProductViewController::class, 'index']);

// show create form
Route::get('/products/create',[ProductViewController::class, 'create']);

//  store product data
Route::post('/products',[ProductViewController::class, 'store']);

// show edit form
Route::get('/products/{product}/edit',[ProductViewController::class, 'edit']);

// edit submit to update
Route::put('/products/{product}',[ProductViewController::class, 'update']);

// delete product
Route::delete('/products/{product}',[ProductViewController::class, 'destroy']);

Route::get('/recommended',[ProductViewController::class, 'recommended']);
Route::post('/recommended/submit', [ProductViewController::class, 'submit']);

// single listing (/products/{product}) if route with {} must be at the bottom
Route::get('/products/{product}',[ProductViewController::class, 'show']);
