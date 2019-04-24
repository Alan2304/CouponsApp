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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createEstablishmentAcc', 'AdminController@createEstablishment')
        ->name('createEstablishmentAcc')
        ->middleware('auth');

Route::post('/registerEstablishmentAcc', 'AdminController@registerEstablishmentAcc')
        ->name('registerEstablishmentAcc')
        ->middleware('auth');

//Establishment routes
Route::get('/createEstablishment', 'EstablishmentController@form')
        ->name('createEstablishment')
        ->middleware('auth');

Route::post('/registerEstablishment', 'EstablishmentController@create')
        ->name('registerEstablishment')
        ->middleware('auth');

Route::get('/establishments', 'EstablishmentController@index')
        ->name('establishments')
        ->middleware('auth');

//Inventory routes
Route::get('/createProduct', 'InventoryController@form')
        ->name('createProduct')
        ->middleware('auth');

Route::post('/registerProduct', 'InventoryController@create')
        ->name('registerProduct')
        ->middleware('auth');

Route::get('/inventory/{id}', 'InventoryController@index')
        ->name('inventory')
        ->middleware('auth');

Route::get('/product/delete/{id}', 'InventoryController@delete')
        ->name('deleteProduct')
        ->middleware('auth');

Route::get('/product/update/{id}', 'InventoryController@formUpdate')
        ->name('updateProductForm')
        ->middleware('auth');

Route::post('/product/update/{id}', 'InventoryController@update')
        ->name('updateProduct')
        ->middleware('auth');

//Coupons Route
Route::get('/createCoupon/{id}', 'CouponController@form')
        ->name('createCouponForm')
        ->middleware('auth');

Route::post('/coupon/create/{id}', 'CouponController@create')
        ->name('createCoupon')
        ->middleware('auth');

Route::get('/coupon/{id}', 'CouponController@index')
        ->name('showCoupons')
        ->middleware('auth');

Route::get('/coupon/delete/{id}', 'CouponController@delete')
        ->name('deleteCoupon')
        ->middleware('auth');

Route::get('/coupon/update/{id}', 'CouponController@updateForm')
        ->name('updateCouponForm')
        ->middleware('auth');

Route::post('/coupon/update/{id}', 'CouponController@update')
        ->name('updateCoupon')
        ->middleware('auth');

Route::get('/coupons', 'CouponController@categorizedCoupons')
        ->name('categorizedCoupons');

Route::get('/coupons/type/{type}', 'CouponController@couponsByType')
        ->name('couponsByType');

Route::get('/myCoupons', 'CouponController@myCoupons')
        ->name('myCoupons')
        ->middleware('auth');

Route::get('/myCoupons/delete/{id}', 'CouponController@myCouponsDelete')
        ->name('myCouponsDelete')
        ->middleware('auth');
