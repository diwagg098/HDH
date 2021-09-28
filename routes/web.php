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

Route::get('/', 'HomeController@index');
Route::get('/shop', 'ShopController@index');
Route::get('/about', function () {
    return view('about');
});
Route::get('/reservation', 'RoomController@index');
Route::get('/login', function () {
    return view('login');
});
Route::get('/create', function () {
    return view('create');
});
Route::get('/payment/{id_guest}/{cartr_id}', 'BookingController@index');


//Route Auth
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');


// Route Checkout
Route::get('/checkout/{id_guest}', 'CartController@index');
Route::post('/checkout/makecart', 'CartController@makeCart');
Route::post('/checkout/makereserv', 'CartController@makereserv');

// Route Room
Route::get('/rooms/makereserv/{id_kamar}', 'RoomController@reserv');


// Route Payment
Route::post('/finishpayment', 'PaymentController@payment');
Route::get('/midtrans/{id_guest}/{cartr_id}', 'PaymentController@midtrans');
Route::post('/midtrans/transaction', 'PaymentController@transaction');
