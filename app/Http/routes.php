<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('/',function(){
	return view('auth.login');
});

Route::get('comerciales/mostrar','ComercialesController@mostrar');
Route::resource('comerciales', 'ComercialesController');
Route::post('user/iniciar/{id}', 'UsersController@iniciar');
Route::resource('user', 'UsersController');
Route::resource('clientes', 'ClientesController');
Route::get('cajas/sucursal/{id}', 'CajasController@sucursal');
Route::resource('cajas', 'CajasController');
Route::put('folios/actualizar/{id}','FoliosController@actualizar');
Route::put('folios/actualizar_aclaraciones/{id}','FoliosController@actualizar_aclaraciones');
Route::get('folios/pagos/{id}','FoliosController@pagos');
Route::get('folios/aclaraciones/{id}','FoliosController@aclaraciones');
Route::resource('folios','FoliosController');
Route::put('tikets/actualizar/{id}','TiketsController@actualizar');
Route::resource('tikets','TiketsController');
Route::get('home/mostrar','HomeController@mostrar');
Route::get('home/sucursal/{id}','HomeController@sucursal');
Route::get('home/mostrarpagos/{id}','HomeController@mostrar_pagos');
Route::get('home/mostraraclaraciones/{id}','HomeController@mostrar_aclaraciones');
Route::get('home/graficapagos','HomeController@grafica_pagos');
Route::get('home/graficaaclaraciones','HomeController@grafica_aclaraciones');
Route::get('home/graficapagos/{id}','HomeController@grafica_pagos_id');
Route::get('home/graficaaclaraciones/{id}','HomeController@grafica_aclaraciones_id');
Route::resource('home','HomeController');
Route::get('turnos/sucursal/{id}','TurnosController@sucursal');
Route::get('turnos/sucursal/{id}/espera','TurnosController@en_espera');
Route::put('turnos/terminar/{id}','TurnosController@terminar');
Route::resource('turnos','TurnosController');
Route::resource('sucursales','SucursalesController');