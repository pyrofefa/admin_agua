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
Route::get('home/general/fecha','HomeController@general_fecha');
Route::get('home/sucursal/{id}','HomeController@sucursal');
Route::get('home/mostrarpagos/{id}','HomeController@mostrar_pagos');
Route::get('home/mostraraclaraciones/{id}','HomeController@mostrar_aclaraciones');
Route::get('home/excel','ExcelController@importar');

//Graficas Lineales
Route::get('graficas/linealsubasuntos','GraficasLinealController@lineal_subasunto_tramites');
Route::get('graficas/linealsubasuntos/{id}','GraficasLinealController@lineal_subasunto_tramites_id');
Route::get('graficas/linealsubasuntosabandonados','GraficasLinealController@lineal_subasunto_tramites_abandonados');
Route::get('graficas/linealsubasuntosabandonados/{id}','GraficasLinealController@lineal_subasunto_tramites_abandonados_id');
Route::get('graficas/linealsubasuntosa','GraficasLinealController@lineal_subasunto_aclaraciones');
Route::get('graficas/linealsubasuntosa/{id}','GraficasLinealController@lineal_subasunto_aclaraciones_id');
Route::get('graficas/linealsubasuntosaabandonados','GraficasLinealController@lineal_subasunto_aclaraciones_abandonados');
Route::get('graficas/linealsubasuntosaabandonados/{id}','GraficasLinealController@lineal_subasunto_aclaraciones_abandonados_id');
Route::get('graficas/linealsubasuntosp','GraficasLinealController@lineal_subasunto_pagos');
Route::get('graficas/linealsubasuntosp/{id}','GraficasLinealController@lineal_subasunto_pagos_id');
Route::get('graficas/linealsubasuntospabandonados','GraficasLinealController@lineal_subasunto_pagos_abandonados');
Route::get('graficas/linealsubasuntospabandonados/{id}','GraficasLinealController@lineal_subasunto_pagos_abandonados_id');
Route::get('graficas/linealpagoshora','GraficasLinealController@lineal_subasunto_pagos_hora');
Route::get('graficas/linealtramiteshora','GraficasLinealController@lineal_subasunto_tramites_hora');
Route::get('graficas/linealaclaracioneshora','GraficasLinealController@lineal_subasunto_aclaraciones_hora');
Route::get('graficas/linealaclaracioneshoraabandonados','GraficasLinealController@lineal_subasunto_aclaraciones_hora_abandonados');
Route::get('graficas/linealtramiteshoraabandonados','GraficasLinealController@lineal_subasunto_tramites_hora_abandonados');
Route::get('graficas/linealpagoshoraabandonados','GraficasLinealController@lineal_subasunto_pagos_hora_abandonados');
Route::get('graficas/linealtiempoesperaglobal','GraficasLinealController@lineal_tiempo_espera_global');
Route::get('graficas/linealtiempoesperatramites','GraficasLinealController@lineal_tiempo_espera_tramites');
Route::get('graficas/linealtiempoesperaaclaraciones','GraficasLinealController@lineal_tiempo_espera_aclaraciones');
Route::get('graficas/linealtiempoespagos','GraficasLinealController@lineal_tiempo_espera_pago');

Route::get('graficas/linealtiempoesperaglobalhora','GraficasLinealController@lineal_tiempo_espera_global_hora');
Route::get('graficas/linealtiempoesperatramiteshora','GraficasLinealController@lineal_tiempo_espera_tramites_hora');
Route::get('graficas/linealtiempoesperaaclaracioneshora','GraficasLinealController@lineal_tiempo_espera_aclaraciones_hora');
Route::get('graficas/linealtiempoespagoshora','GraficasLinealController@lineal_tiempo_espera_pago_hora');

//Graficas Pastel
Route::get('graficas/graficasubasuntos','GraficasPieController@grafica_subasunto');
Route::get('graficas/graficasubasuntos_abandonados','GraficasPieController@grafica_subasunto_abandonado');
Route::get('graficas/graficasubasuntos/{id}','GraficasPieController@grafica_subasunto_id');
Route::get('graficas/graficasubasuntosfecha/{fecha}','GraficasPieController@grafica_subasunto_fecha');
Route::get('graficas/graficasubasuntos_abandonados/{id}','GraficasPieController@grafica_subasunto_abandonado_id');
Route::get('graficas/graficasubasuntos_abandonados_fecha/{id}','GraficasPieController@grafica_subasunto_abandonado_fecha');
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
Route::get('graficas/graficapagosfecha/{fecha}','GraficasPieController@grafica_pagos_fecha');
Route::get('graficas/graficaaclaraciones/{id}','GraficasPieController@grafica_aclaraciones_id');
Route::get('graficas/graficaaclaracionesfecha/{fecha}','GraficasPieController@grafica_aclaraciones_fecha');
Route::get('graficas/graficatramites/{id}','GraficasPieController@grafica_tramites_id');
Route::get('graficas/graficatramitesfecha/{fecha}','GraficasPieController@grafica_tramites_fecha');
Route::get('graficas/graficatramitesabandonadosfecha/{fecha}','GraficasPieController@grafica_tramites_abandonados_fecha');
Route::get('graficas/graficaaclaracionesabandonadosfecha/{fecha}','GraficasPieController@grafica_aclaraciones_abandonados_fecha');
Route::get('graficas/graficapagosabandonadosfecha/{fecha}','GraficasPieController@grafica_pagos_abandonados_fecha');

//comunicacion con api
//turnomatic
Route::get('api/pagos/{id}','apiController@pagos');
Route::get('api/aclaraciones/{id}','apiController@aclaraciones');
Route::post('api/tikets_pago','apiController@agregar_tiket_pagos');
Route::post('api/tikets_aclaraciones','apiController@agregar_tiket_aclaraciones');

Route::put('api/actualizarpagos/{id}','apiController@actualizar');
Route::put('api/actualizaraclaraciones/{id}','apiController@actualizar_aclaraciones');
//mostrador
Route::get('api/comerciales','apiController@mostrar');
//usuarios
Route::post('api/iniciar/{id}','apiController@iniciar');
Route::get('api/mostrarpagos/{id}','apiController@mostrar_pagos');
Route::get('api/mostraraclaraciones/{id}','apiController@mostrar_aclaraciones');
Route::put('api/tikets/actualizar/{id}','apiController@actualizar_tiket');

Route::resource('home','HomeController');
Route::get('turnos/sucursal/{id}','TurnosController@sucursal');
Route::get('turnos/sucursal/{id}/espera','TurnosController@en_espera');
Route::put('turnos/terminar/{id}','TurnosController@terminar');
Route::resource('turnos','TurnosController');
Route::resource('sucursales','SucursalesController');