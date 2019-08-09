<?php

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

Route::group(['prefix' => 'admin','namespace' => 'admin', 'middleware' => ['auth.admin']], function () {
    Route::group([ 'prefix' => 'users' , 'middleware' => ['auth.superadmin']], function () {
        Route::get('/', 'UsersController@index')->name('admin.users.index');
        Route::get('create', 'UsersController@create')->name('admin.users.create');
        Route::post('create', 'UsersController@save')->name('admin.users.create');
        Route::get('edit/{id?}', 'UsersController@edit')->name('admin.users.edit');
        Route::post('update', 'UsersController@update')->name('admin.users.update');
        Route::get('delete/{id?}', 'UsersController@delete')->name('admin.users.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', 'CategoriesController@index')->name('admin.categories.index');
        Route::get('create', 'CategoriesController@create')->name('admin.categories.create');
        Route::post('create', 'CategoriesController@save')->name('admin.categories.create');
        Route::get('edit/{id?}', 'CategoriesController@edit')->name('admin.categories.edit');
        Route::post('update', 'CategoriesController@update')->name('admin.categories.update');
        Route::get('delete/{id?}', 'CategoriesController@delete')->name('admin.categories.delete');
    });


    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductsController@index')->name('admin.products.index');
        Route::get('create', 'ProductsController@create')->name('admin.products.create');
        Route::post('create', 'ProductsController@save')->name('admin.products.create');
        Route::get('edit/{id?}', 'ProductsController@edit')->name('admin.products.edit');
        Route::post('update', 'ProductsController@update')->name('admin.products.update');
        Route::get('delete/{id?}', 'ProductsController@delete')->name('admin.products.delete');
        Route::post('get_child', 'ProductsController@get_child_cate')->name('admin.products.get_child_cate');
    });

    Route::prefix('vendors')->group(function () {
        Route::get('/', 'VendorsController@index')->name('admin.vendors.index');
        Route::get('create', 'VendorsController@create')->name('admin.vendors.create');
        Route::post('create', 'VendorsController@save')->name('admin.vendors.create');
        Route::get('edit/{id?}', 'VendorsController@edit')->name('admin.vendors.edit');
        Route::post('update', 'VendorsController@update')->name('admin.vendors.update');
        Route::get('delete/{id?}', 'VendorsController@delete')->name('admin.vendors.delete');
    });


    Route::prefix('orders')->group(function () {
        Route::get('/', 'OrdersController@index')->name('admin.orders.index');
        Route::get('create', 'OrdersController@create')->name('admin.orders.create');
        Route::post('create', 'OrdersController@save')->name('admin.orders.create');
        Route::get('edit/{id?}', 'OrdersController@edit')->name('admin.orders.edit');
        Route::post('update', 'OrdersController@update')->name('admin.orders.update');
        Route::get('delete/{id?}', 'OrdersController@delete')->name('admin.orders.delete');
        Route::get('products', 'OrdersController@get_products')->name('admin.orders.products');
        Route::get('product', 'OrdersController@get_product')->name('admin.orders.product');
    });

    Route::prefix('options')->group(function () {
        Route::get('/', 'OptionsController@index')->name('admin.options.index');
        Route::get('header-setting', 'OptionsController@header')->name('admin.options.header');
        Route::post('header-setting', 'OptionsController@header_save')->name('admin.options.header');
        Route::get('footer-setting', 'OptionsController@footer')->name('admin.options.footer');
        Route::post('footer-setting', 'OptionsController@footer_save')->name('admin.options.footer');
        Route::get('home-setting', 'OptionsController@home')->name('admin.options.home');
        Route::post('home-setting', 'OptionsController@home_save')->name('admin.options.home');
    });


    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::get('category/{slug?}', 'HomeController@category')->name('client.category');
Route::get('product/{slug?}', 'HomeController@product')->name('client.product');

Route::get('cart', 'OrdersController@index')->name('cart.index');
Route::get('add-to-cart', 'OrdersController@add_to_cart')->name('cart.add');
Route::get('count_items', 'OrdersController@count_items')->middleware('cors')->name('cart.count_items');
Route::post('update_cart_item', 'OrdersController@update_cart_item')->name('cart.update_item');
Route::post('add-order', 'OrdersController@add_order')->name('orders.add');
Route::post('delete_item', 'OrdersController@delete_item')->name('cart.delete_item');
Route::post('delete_cart', 'OrdersController@delete_cart')->name('cart.delete_cart');
Route::get('checkout', 'OrdersController@checkout')->name('cart.checkout');
Route::post('checkout', 'OrdersController@checkout_save')->name('cart.checkout');
Route::get('profile', 'UserController@profile')->middleware('auth')->name('client.profile');
Route::post('profile', 'UserController@save')->middleware('auth')->name('client.profile');
Route::get('changepass', 'UserController@changepass')->middleware('auth')->name('client.changepass');
Route::post('changepass', 'UserController@changepass_save')->middleware('auth')->name('client.changepass');

Route::get('orders/{code?}', 'OrdersController@view_order')->name('client.orders');

Route::get('thankyou',function(){
    return view('client.thankyou');
})->name('client.thankyou');

Route::get('search','HomeController@search')->name('client.search');

Route::get('demovue',function(){
    return view('demo');
});


// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@Postlogin')->name('login');
Route::get('home',function(){
    return redirect('/');
});
Route::get('/', 'HomeController@index')->name('home');
