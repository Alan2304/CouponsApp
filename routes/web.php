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

Route::get('/createEstablishment', 'EstablishmentController@form')
        ->name('createEstablishment')
        ->middleware('auth');

Route::post('/registerEstablishment', 'EstablishmentController@create')
        ->name('registerEstablishment')
        ->middleware('auth');
Route::get('/establishments', 'EstablishmentController@index')
        ->name('establishments')
        ->middleware('auth');
