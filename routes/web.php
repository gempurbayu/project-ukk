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

Route::middleware('admin')->group(function(){
Route::get('/admin', 'UserController@index');
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/create', 'CustomerController@create');
Route::get('/customers/edit/{id}', 'CustomerController@edit');
Route::resource('users','UserController');
Route::resource('customers','CustomerController');


});

