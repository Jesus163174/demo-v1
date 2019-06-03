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

Route::get('/','DashboardController@index')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('productos','ProductosController')->middleware('auth');
Route::resource('usuarios','UsersController')->middleware('auth');
Route::resource('categorias','CategoriesController')->middleware('auth');
Route::resource('sucursales','BusinessController')->middleware('auth');
Route::resource('proveedores','ProvideersController')->middleware('auth');
Route::resource('marcas','MarcasController')->middleware('auth');
Route::resource('ventas','VentasController')->middleware('auth');
Route::resource('clientes','CustomersController')->middleware('auth');

Route::get('filtros_ventas','VentasController@index')->middleware('auth');
Route::get('vender','VentasController@vender');

Route::post('agregar','ProductsOrderController@store');
Route::post('quitar','ProductsOrderController@destroy');
Route::post('terminar','VentasController@store');
Route::post('configuracion','OrdersController@config');
Route::get('ticket/{folio}','VentasController@ticket');

Route::get('traspasos','TraspasosController@index');
Route::get('traspasos/{id}','TraspasosController@show');
Route::post('aceptar_traspaso','TraspasosController@acept');
Route::post('autorizar_traspaso','TraspasosController@autorizar');