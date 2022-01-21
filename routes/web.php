<?php

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
Auth::routes();
Route::get('/activate/{code}', 'ActivationController@activateUserAccount')->name('user.activate');
Route::get('/resend/{email}', 'ActivationController@resendCode')->name('code.resend');
Route::get('/ActivateUserAccount', function () {
    return view('emails.ActivateUserAccount');
                })->name('ActivateUserAccount');
route::get('/logout', function () {
                Auth::logout();
                return redirect("/");
                });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', "HomeController@product")->name('index');
Route::get('/categories', 'Cat@showcat')->name('categories');
Route::get('/categories/{id}', 'Cat@getProductByCategory')->name('category.products');
Route::get('/Details/{id}', 'Cat@show')->name('details-item');
Route::get('/wishlist','HomeController@showcart')->name('wishlist');


Route::post('/addcart/{id}', 'HomeController@addcart');
Route::get('/delete/{id}', 'HomeController@deletecart');
Route::post('/order', 'HomeController@confirmOrder');

//Admin routes
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/login', 'AdminController@showAdminForm')->name('admin.login');
Route::post('/admin/login', 'AdminController@adminLogin')->name('admin.login');
Route::post('/admin/logout', 'AdminController@adminLogout')->name('admin.logout');

Route::get('/admin/orders', 'AdminController@getOrders')->name('admin.orders');
Route::get('/admin/products', 'AdminController@getProducts')->name('admin.products');

//Order routes
Route::resource('orders', 'OrderController');

//Product routes
Route::resource('product', 'ProductController');
Route::get('/admin/createProduct', 'ProductController@create')->name('admin.create');
Route::get('/admin/editProduct/{product:id}', 'ProductController@edit')->name('admin.edit');


















