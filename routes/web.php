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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',function(){
	return redirect('/admin');
});

Auth::routes();

Route::Auth();
Route::middleware('auth')->group(function(){
Route::get('/customer','CustomerController@create')->name('customer.create');
Route::post('/customer','CustomerController@store')->name('customer.store');
Route::get('/book/maskapai','BookController@carimaskapai')->name('book.carimaskapai');
});

Route::middleware('admin')->group(function(){
Route::get('/admin', 'UserController@index');
Route::get('/admin/customers', 'CustomerController@index');
Route::get('/customers/create', 'CustomerController@create');
Route::get('/admin/customers/edit/{id}', 'CustomerController@edit');

Route::get('/admin/rutes', 'RuteController@index');
Route::get('/admin/rutes/create','RuteController@create');
Route::post('/admin/rutes/create','RuteController@store');

Route::resource('users','UserController');
Route::resource('customers','CustomerController');
Route::resource('rutes','RuteController');



});

