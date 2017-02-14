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
Route::get('home/general','HomeController@general');
Route::get('home/sucursal/{id}','HomeController@sucursal');
Route::get('home/mostrarpagos/{id}','HomeController@mostrar_pagos');
Route::get('home/mostraraclaraciones/{id}','HomeController@mostrar_aclaraciones');

//Graficas Lineales
Route::get('graficas/linealsubasuntos','GraficasLinealController@lineal_subasunto_tramites');
Route::get('graficas/linealsubasuntosabandonados','GraficasLinealController@lineal_subasunto_tramites_abandonados');
Route::get('graficas/linealsubasuntosa','GraficasLinealController@lineal_subasunto_aclaraciones');
Route::get('graficas/linealsubasuntosaabandonados','GraficasLinealController@lineal_subasunto_aclaraciones_abandonados');
Route::get('graficas/linealsubasuntosp','GraficasLinealController@lineal_subasunto_pagos');
Route::get('graficas/linealsubasuntospabandonados','GraficasLinealController@lineal_subasunto_pagos_abandonados');

//Graficas Pastel
Route::get('graficas/graficasubasuntos','GraficasPieController@grafica_subasunto');
Route::get('graficas/graficasubasuntos_abandonados','GraficasPieController@grafica_subasunto_abandonado');
Route::get('graficas/graficasubasuntos/{id}','GraficasPieController@grafica_subasunto_id');
Route::get('graficas/graficasubasuntos_abandonados/{id}','GraficasPieController@grafica_subasunto_abandonado_id');
Route::get('graficas/graficapagos','GraficasPieController@grafica_pagos');
Route::get('graficas/graficatramites','GraficasPieController@grafica_tramites');
Route::get('graficas/graficaaclaraciones','GraficasPieController@grafica_aclaraciones');
Route::get('graficas/graficapagosabandonados','GraficasPieController@grafica_pagos_abandonados');
Route::get('graficas/graficapagosabandonados/{id}','GraficasPieController@grafica_pagos_abandonados_id');
Route::get('graficas/graficatramitesabandonados','GraficasPieController@grafica_tramites_abandonados');
Route::get('graficas/graficatramitesabandonados/{id}','GraficasPieController@grafica_tramites_abandonados_id');
Route::get('graficas/graficaaclaracionesabandonados','GraficasPieController@grafica_aclaraciones_abandonados');
Route::get('graficas/graficaaclaracionesabandonados/{id}','GraficasPieController@grafica_aclaraciones_abandonados_id');
Route::get('graficas/graficapagos/{id}','GraficasPieController@grafica_pagos_id');
Route::get('graficas/graficaaclaraciones/{id}','GraficasPieController@grafica_aclaraciones_id');
Route::get('graficas/graficatramites/{id}','GraficasPieController@grafica_tramites_id');

Route::resource('home','HomeController');
Route::get('turnos/sucursal/{id}','TurnosController@sucursal');
Route::get('turnos/sucursal/{id}/espera','TurnosController@en_espera');
Route::put('turnos/terminar/{id}','TurnosController@terminar');
Route::resource('turnos','TurnosController');
Route::resource('sucursales','SucursalesController');