<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/classifications','Api\ApiController@getClassification');
Route::post('/first-3-products','Api\ApiController@getFirst3Products');
Route::post('/products','Api\ApiController@getProducts');
Route::post('/add-to-cart','Api\ApiController@addToCart');
Route::post('/remove-from-cart','Api\ApiController@removeFromCart');
Route::post('/get-products-in-cart','Api\ApiController@getMyCart');
Route::post('/new-order','Api\ApiController@newOrder');
Route::get('/about-us','Api\ApiController@getAboutUs');
Route::get('/contact-us','Api\ApiController@getContactUs');
