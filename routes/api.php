<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::group(['namespace' => 'api', 'middleware' => ['api','cors']], function () {
	Route::get('test','ApiController@test')->name('api.test');
	Route::post('test','ApiController@test')->name('api.test');
	Route::get('best_seller','ApiController@best_seller')->name('api.best_seller');
	Route::post('get_product_cart','ApiController@get_product_cart')->name('api.get_product_cart');
	Route::get('get_cat','ProductController@get_cat');
	Route::get('get_product_by_slug','ApiController@get_product_by_slug')->name('api.get_product_by_slug');
	Route::get('get_relate_product','ApiController@get_relate_product')->name('api.get_relate_product');
	Route::get('option_header','ApiController@get_option_header')->name('api.option_header');
	Route::get('get_menus','ApiController@get_menus')->name('api.get_menus');
	Route::get('get_footer','ApiController@get_footer')->name('api.get_footer');
	Route::get('get_number_cart','ApiController@get_number_cart')->name('api.get_number_cart');
	Route::get('get_current_user/{id}','ApiController@get_current_user')->name('api.get_current_user');
	Route::get('get_item_checkout','ApiController@get_item_checkout')->middleware(['web','api'])->name('api.get_item_checkout');




	Route::resource('product','ProductsController');
	Route::resource('category','CategoriesController');
	Route::resource('vendor','VendorsController');
});