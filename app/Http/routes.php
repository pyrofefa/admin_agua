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
Route::get('home/sucursal/{id}/fecha','HomeController@sucursal_fecha');
Route::get('home/sucursal/{id}','HomeController@sucursal');
Route::get('home/mostrarpagos/{id}','HomeController@mostrar_pagos');
Route::get('home/mostraraclaraciones/{id}','HomeController@mostrar_aclaraciones');
Route::get('home/excel','ExcelController@importar');
Route::get('home/excel/{id}','ExcelController@importar_sucursal');
Route::get('home/excelfecha/{fecha}','ExcelController@importar_fecha');
Route::get('home/sucursal/excel/{id}/{fecha}','ExcelController@importar_sucursal_fecha');

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
Route::get('graficas/linealtramiteshorafecha/{fecha}','GraficasLinealController@lineal_subasunto_tramites_hora_fecha');
Route::get('graficas/linealaclaracioneshorafecha/{fecha}','GraficasLinealController@lineal_subasunto_aclaraciones_hora_fecha');
Route::get('graficas/linealpagohorafecha/{fecha}','GraficasLinealController@lineal_subasunto_pagos_hora_fecha');
Route::get('graficas/linealtramiteshorafechaabandonados/{fecha}','GraficasLinealController@lineal_subasunto_tramites_hora_fecha_abandonados');
Route::get('graficas/linealaclaracioneshorafechaabandonados/{fecha}','GraficasLinealController@lineal_subasunto_aclaraciones_hora_fecha_aban');
Route::get('graficas/linealpagohorafechaabandonados/{fecha}','GraficasLinealController@lineal_subasunto_pagos_hora_fecha_abandonado');
Route::get('graficas/linealtramiteshorafechaid/{fecha}/{id}','GraficasLinealController@lineal_subasunto_tramites_hora_fecha_id');
Route::get('graficas/linealaclaracioneshorafechaid/{fecha}/{id}','GraficasLinealController@lineal_subasunto_aclaraciones_hora_fecha_id');
Route::get('graficas/linealpagohorafechaid/{fecha}/{id}','GraficasLinealController@lineal_subasunto_pagos_hora_fecha_id');
Route::get('graficas/linealtramiteshorafechaida/{fecha}/{id}','GraficasLinealController@lineal_subasunto_tramites_hora_fecha_id_a');
Route::get('graficas/linealaclaracioneshorafechaida/{fecha}/{id}','GraficasLinealController@lineal_subasunto_aclaraciones_hora_fecha_id_a');
Route::get('graficas/linealpagohorafechaida/{fecha}/{id}','GraficasLinealController@lineal_subasunto_pagos_hora_fecha_id_a');
Route::get('graficas/linealtiempoesperaglobalhorafecha/{fecha}','GraficasLinealController@lineal_tiempo_espera_global_hora_fecha');
Route::get('graficas/linealtiempoesperatramiteshorafecha/{fecha}','GraficasLinealController@lineal_tiempo_espera_tramites_hora_fecha');
Route::get('graficas/linealtiempoesperaaclaracioneshora/{fecha}','GraficasLinealController@lineal_tiempo_espera_aclaraciones_hora_fecha');
Route::get('graficas/linealtiempoespagoshorafecha/{fecha}','GraficasLinealController@lineal_tiempo_espera_pago_hora_fecha');
Route::get('graficas/linealtiempoesperaglobalhorafechaid/{fecha}/{id}','GraficasLinealController@lineal_tiempo_espera_global_hora_fecha_id');
Route::get('graficas/linealtiempoesperatramiteshorafechaid/{fecha}/{id}','GraficasLinealController@lineal_tiempo_espera_tramites_hora_fecha_id');
Route::get('graficas/linealtiempoesperaaclaracioneshoraid/{fecha}/{id}','GraficasLinealController@lineal_tiempo_espera_acla_hora_fecha_id');
Route::get('graficas/linealtiempoespagoshorafechaid/{fecha}/{id}','GraficasLinealController@lineal_tiempo_espera_pago_hora_fecha_id');
Route::get('graficas/linealtiempoatencionglobal','GraficasLinealController@promedio_tiempo_atencion_global');
Route::get('graficas/linealtiempoatenciontramites','GraficasLinealController@promedio_tiempo_atencion_tramites');
Route::get('graficas/linealtiempoatencionaclaraciones','GraficasLinealController@promedio_tiempo_atencion_aclaraciones');
Route::get('graficas/linealtiempoatencionpago','GraficasLinealController@promedio_tiempo_atencion_pago');
Route::get('graficas/linealtiempoatencionglobalhora','GraficasLinealController@promedio_tiempo_atencion_global_hora');
Route::get('graficas/linealtiempoatenciontramiteshora','GraficasLinealController@promedio_tiempo_atencion_tramites_hora');
Route::get('graficas/linealtiempoatencionaclaracioneshora','GraficasLinealController@promedio_tiempo_atencion_aclaraciones_hora');
Route::get('graficas/linealtiempoatencionpagohora','GraficasLinealController@promedio_tiempo_atencion_pago_hora');
Route::get('graficas/linealtiempoatencionglobalhorafecha/{fecha}','GraficasLinealController@promedio_tiempo_atencion_global_hora_fecha');
Route::get('graficas/linealtiempoatenciontramiteshorafecha/{fecha}','GraficasLinealController@promedio_tiempo_atencion_tramites_hora_fecha');
Route::get('graficas/linealtiempoatencionaclaracioneshorafecha/{fecha}','GraficasLinealController@promedio_tiempo_atencion_acla_hora_fecha');
Route::get('graficas/linealtiempoatencionpagohorafecha/{fecha}','GraficasLinealController@promedio_tiempo_atencion_pago_hora_fecha');
Route::get('graficas/linealtiempoatencionglobalhoraid/{id}','GraficasLinealController@promedio_tiempo_atencion_global_hora_id');
Route::get('graficas/linealtiempoatenciontramiteshoraid/{id}','GraficasLinealController@promedio_tiempo_atencion_tramites_hora_id');
Route::get('graficas/linealtiempoatencionaclaracioneshoraid/{id}','GraficasLinealController@promedio_tiempo_atencion_aclaraciones_hora_id');
Route::get('graficas/linealtiempoatencionpagohoraid/{id}','GraficasLinealController@promedio_tiempo_atencion_pago_hora_id');
Route::get('graficas/linealtiempoatencionglobalid/{id}','GraficasLinealController@promedio_tiempo_atencion_global_id');
Route::get('graficas/linealtiempoatenciontramitesid/{id}','GraficasLinealController@promedio_tiempo_atencion_tramites_id');
Route::get('graficas/linealtiempoatencionaclaracionesid/{id}','GraficasLinealController@promedio_tiempo_atencion_aclaraciones_id');
Route::get('graficas/linealtiempoatencionpagoid/{id}','GraficasLinealController@promedio_tiempo_atencion_pago_id');
Route::get('graficas/linealtiempoesperaglobalid/{id}','GraficasLinealController@lineal_tiempo_espera_global_id');
Route::get('graficas/linealtiempoesperatramitesid/{id}','GraficasLinealController@lineal_tiempo_espera_tramites_id');
Route::get('graficas/linealtiempoesperaaclaracionesid/{id}','GraficasLinealController@lineal_tiempo_espera_aclaraciones_id');
Route::get('graficas/linealtiempoespagosid/{id}','GraficasLinealController@lineal_tiempo_espera_pago_id');
Route::get('graficas/linelpromedioesperaglobalid/{id}','GraficasLinealController@lineal_tiempo_espera_global_hora_id');
Route::get('graficas/linelpromedioesperatramitesid/{id}','GraficasLinealController@lineal_tiempo_espera_tramites_hora_id');
Route::get('graficas/linelpromedioesperaaclaracionesid/{id}','GraficasLinealController@lineal_tiempo_espera_aclaraciones_hora_id');
Route::get('graficas/linelpromedioesperapagoid/{id}','GraficasLinealController@lineal_tiempo_espera_pago_hora_id');
Route::get('graficas/linealtiempodeatencionglobalhoraidfecha/{fecha}/{id}','GraficasLinealController@promedio_tiempo_aten_global_hora_fecha_id');
Route::get('graficas/linealtiempodeatencionhoratridfecha/{fecha}/{id}','GraficasLinealController@promedio_tiempo_aten_tramites_hora_fechaid');
Route::get('graficas/linealtiempodeatencionhoraaclaidfecha/{fecha}/{id}','GraficasLinealController@promedio_tiempo_atencion_acla_hora_fechaid');
Route::get('graficas/linealtiempodeatencionhorapagosidfecha/{fecha}/{id}','GraficasLinealController@promedio_tiempo_atencion_pago_hora_fechaid');
Route::get('graficas/linealpagoshoraid/{id}','GraficasLinealController@lineal_subasunto_pagos_hora_id');
Route::get('graficas/linealtramiteshoraid/{id}','GraficasLinealController@lineal_subasunto_tramites_hora_id');
Route::get('graficas/linealaclaracioneshoraid/{id}','GraficasLinealController@lineal_subasunto_aclaraciones_hora_id');
Route::get('graficas/linealpagoshoraidabandonados/{id}','GraficasLinealController@lineal_subasunto_pagos_hora_id_aban');
Route::get('graficas/linealtramiteshoraidabandonados/{id}','GraficasLinealController@lineal_subasunto_tramites_hora_id_aban');
Route::get('graficas/linealaclaracioneshoraidabandonados/{id}','GraficasLinealController@lineal_subasunto_aclaraciones_hora_id_aban');

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
Route::get('graficas/graficasubasuntossucursalfecha/{id}/{fecha}','GraficasPieController@grafica_subasunto_fecha_sucursal');
Route::get('graficas/graficasubasuntossucursalfechaabandonados/{id}/{fecha}','GraficasPieController@grafica_subasunto_fecha_sucursalab');
Route::get('graficas/graficatramitessucursalfecha/{id}/{fecha}','GraficasPieController@grafica_tramites_fecha_sucursal');
Route::get('graficas/graficatramitessucursalfechaabandonados/{id}/{fecha}','GraficasPieController@grafica_tramites_fecha_sucursal_ab');
Route::get('graficas/graficaaclaracionessucursalfecha/{id}/{fecha}','GraficasPieController@grafica_aclaraciones_fecha_sucursal');
Route::get('graficas/graficaaclaracionessucursalfechaabandonados/{id}/{fecha}','GraficasPieController@grafica_aclaraciones_fecha_sucursal_ab');
Route::get('graficas/graficapagossucursalfecha/{id}/{fecha}','GraficasPieController@grafica_pagos_fecha_sucursal');
Route::get('graficas/graficapagossucursalfechaabandonados/{id}/{fecha}','GraficasPieController@grafica_pagos_fecha_sucursal_abandonados');


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
Route::post('turnos/sucursal/busqueda','TurnosController@busqueda');
Route::put('turnos/terminar/{id}','TurnosController@terminar');
Route::resource('turnos','TurnosController');
Route::resource('sucursales','SucursalesController');