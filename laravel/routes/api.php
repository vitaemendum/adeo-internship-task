<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//api/v1
Route::group(['namespace' => 'App\Http\Controllers\api'],function(){
    Route::apiResource('products', ProductApiController::class);
    Route::get('products/recommended/{city}', 'ProductApiController@recommended');
});




