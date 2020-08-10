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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'userController@index')->name('admin')->middleware('auth');
Route::post('/storgadmin', 'userController@storg')->name('storgadmin')->middleware('auth');

Route::get('/deleteadmin/{id}','userController@Eliminar')->name('Eliminar');

Route::post('/updategadmin', 'userController@update')->name('updategadmin')->middleware('auth');
Route::post('/getdatagadmin', 'userController@getdata')->name('getdatagadmin')->middleware('auth');



Route::get('/Cliente', 'ClienteController@index')->name('Cliente');
Route::post('/storgCliente', 'ClienteController@storg')->name('storgCliente')->middleware('auth');
Route::get('/deleteCliente/{id}','ClienteController@Eliminar')->name('EliminarCliente');
Route::post('/updategCliente', 'ClienteController@update')->name('updategCliente')->middleware('auth');
Route::post('/getdatagCliente', 'ClienteController@getdata')->name('getdatagCliente')->middleware('auth');
