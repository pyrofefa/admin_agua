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
Route::get('graficas/linealtramiteshorafecha/{fecha}/{fecha_dos}','GraficasLinealController@lineal_subasunto_tramites_hora_fecha');
Route::get('graficas/linealaclaracioneshorafecha/{fecha}/{fecha_dos}','GraficasLinealController@lineal_subasunto_aclaraciones_hora_fecha');
Route::get('graficas/linealpagohorafecha/{fecha}/{fecha_dos}','GraficasLinealController@lineal_subasunto_pagos_hora_fecha');
Route::get('graficas/linealtramiteshorafechaabandonados/{fecha}/{fecha_dos}','GraficasLinealController@lineal_subasunto_tramites_hora_fecha_abandonados');
Route::get('graficas/linealaclaracioneshorafechaabandonados/{fecha}/{fecha_dos}','GraficasLinealController@lineal_subasunto_aclaraciones_hora_fecha_aban');
Route::get('graficas/linealpagohorafechaabandonados/{fecha}/{fecha_dos}','GraficasLinealController@lineal_subasunto_pagos_hora_fecha_abandonado');
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
Route::get('graficas/graficasubasuntosfecha/{fecha}/{fecha_dos}','GraficasPieController@grafica_subasunto_fecha');
Route::get('graficas/graficasubasuntos_abandonados/{id}','GraficasPieController@grafica_subasunto_abandonado_id');
Route::get('graficas/graficasubasuntos_abandonados_fecha/{fecha}/{fecha_dos}','GraficasPieController@grafica_subasunto_abandonado_fecha');
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
Route::get('graficas/graficapagosfecha/{fecha}/{fecha_dos}','GraficasPieController@grafica_pagos_fecha');
Route::get('graficas/graficaaclaraciones/{id}','GraficasPieController@grafica_aclaraciones_id');
Route::get('graficas/graficaaclaracionesfecha/{fecha}/{fecha_dos}','GraficasPieController@grafica_aclaraciones_fecha');
Route::get('graficas/graficatramites/{id}','GraficasPieController@grafica_tramites_id');
Route::get('graficas/graficatramitesfecha/{fecha}/{fecha_dos}','GraficasPieController@grafica_tramites_fecha');
Route::get('graficas/graficatramitesabandonadosfecha/{fecha}/{fecha_dos}','GraficasPieController@grafica_tramites_abandonados_fecha');
Route::get('graficas/graficaaclaracionesabandonadosfecha/{fecha}/{fecha_dos}','GraficasPieController@grafica_aclaraciones_abandonados_fecha');
Route::get('graficas/graficapagosabandonadosfecha/{fecha}/{fecha_dos}','GraficasPieController@grafica_pagos_abandonados_fecha');
Route::get('graficas/graficasubasuntossucursalfecha/{id}/{fecha}/{fecha_dos}','GraficasPieController@grafica_subasunto_fecha_sucursal');
Route::get('graficas/graficasubasuntossucursalfechaabandonados/{id}/{fecha}/{fecha_dos}','GraficasPieController@grafica_subasunto_fecha_sucursalab');
Route::get('graficas/graficatramitessucursalfecha/{id}/{fecha}/{fecha_dos}','GraficasPieController@grafica_tramites_fecha_sucursal');
Route::get('graficas/graficatramitessucursalfechaabandonados/{id}/{fecha}/{fecha_dos}','GraficasPieController@grafica_tramites_fecha_sucursal_ab');
Route::get('graficas/graficaaclaracionessucursalfecha/{id}/{fecha}/{fecha_dos}','GraficasPieController@grafica_aclaraciones_fecha_sucursal');
Route::get('graficas/graficaaclaracionessucursalfechaabandonados/{id}/{fecha}/{fecha_dos}','GraficasPieController@grafica_aclaraciones_fecha_sucursal_ab');
Route::get('graficas/graficapagossucursalfecha/{id}/{fecha}/{fecha_dos}','GraficasPieController@grafica_pagos_fecha_sucursal');
Route::get('graficas/graficapagossucursalfechaabandonados/{id}/{fecha}/{fecha_dos}','GraficasPieController@grafica_pagos_fecha_sucursal_abandonados');

//graficas tramites
Route::get('graficas/tramites/contrato/{fecha}/{fecha_dos}','GraficaTramites@grafica_contrato_fecha');
Route::get('graficas/tramites/convenio/{fecha}/{fecha_dos}','GraficaTramites@grafica_convenio_fecha');
Route::get('graficas/tramites/cambio/{fecha}/{fecha_dos}','GraficaTramites@grafica_cambiodenombre_fecha');
Route::get('graficas/tramites/carta/{fecha}/{fecha_dos}','GraficaTramites@grafica_cartadenoadeudo_fecha');
Route::get('graficas/tramites/factibilidad/{fecha}/{fecha_dos}','GraficaTramites@grafica_factibilidad_fecha');
Route::get('graficas/tramites/dosomas/{fecha}/{fecha_dos}','GraficaTramites@grafica_dosomastramites_fecha');
Route::get('graficas/tramites/contrato_id/{id}/{fecha}/{fecha_dos}','GraficaTramites@grafica_contrato_id_fecha');
Route::get('graficas/tramites/convenio_id/{id}/{fecha}/{fecha_dos}','GraficaTramites@grafica_convenio_id_fecha');
Route::get('graficas/tramites/cambio_id/{id}/{fecha}/{fecha_dos}','GraficaTramites@grafica_cambiodenombre_id_fecha');
Route::get('graficas/tramites/carta_id/{id}/{fecha}/{fecha_dos}','GraficaTramites@grafica_cartadenoadeudo_id_fecha');
Route::get('graficas/tramites/factibilidad_id/{id}/{fecha}/{fecha_dos}','GraficaTramites@grafica_factibilidad_id_fecha');
Route::get('graficas/tramites/dosomas_id/{id}/{fecha}/{fecha_dos}','GraficaTramites@grafica_dosomastramites_id_fecha');
Route::get('graficas/tramites/contrato','GraficaTramites@grafica_contrato');
Route::get('graficas/tramites/convenio','GraficaTramites@grafica_convenio');
Route::get('graficas/tramites/cambio','GraficaTramites@grafica_cambiodenombre');
Route::get('graficas/tramites/carta','GraficaTramites@grafica_cartadenoadeudo');
Route::get('graficas/tramites/factibilidad','GraficaTramites@grafica_factibilidad');
Route::get('graficas/tramites/dosomas','GraficaTramites@grafica_dosomastramites');
Route::get('graficas/tramites/contrato/{id}','GraficaTramites@grafica_contrato_id');
Route::get('graficas/tramites/convenio/{id}','GraficaTramites@grafica_convenio_id');
Route::get('graficas/tramites/cambio/{id}','GraficaTramites@grafica_cambiodenombre_id');
Route::get('graficas/tramites/carta/{id}','GraficaTramites@grafica_cartadenoadeudo_id');
Route::get('graficas/tramites/factibilidad/{id}','GraficaTramites@grafica_factibilidad_id');
Route::get('graficas/tramites/dosomas/{id}','GraficaTramites@grafica_dosomastramites_id');

//graficas aclaraciones
Route::get('graficas/aclaraciones/altoconsumo/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_altoconsumo_fecha');
Route::get('graficas/aclaraciones/reconexion/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_reconexion_fecha');
Route::get('graficas/aclaraciones/errordelectura/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_errorenlectura_fecha');
Route::get('graficas/aclaraciones/notoma/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_notoma_fecha');
Route::get('graficas/aclaraciones/noentrega/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_noentrega_fecha');
Route::get('graficas/aclaraciones/cambiodetarifa/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_cambiodetarifa_fecha');
Route::get('graficas/aclaraciones/solicitud/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_solicitud_fecha');
Route::get('graficas/aclaraciones/otros/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_otrostramites_fecha');
Route::get('graficas/aclaraciones/altoconsumo_id/{id}/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_altoconsumo_id_fecha');
Route::get('graficas/aclaraciones/reconexion_id/{id}/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_reconexion_id_fecha');
Route::get('graficas/aclaraciones/errordelectura_id/{id}/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_errorenlectura_id_fecha');
Route::get('graficas/aclaraciones/notoma_id/{id}/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_notoma_id_fecha');
Route::get('graficas/aclaraciones/noentrega_id/{id}/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_noentrega_id_fecha');
Route::get('graficas/aclaraciones/cambiodetarifa_id/{id}/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_cambiodetarifa_id_fecha');
Route::get('graficas/aclaraciones/solicitud_id/{id}/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_solicitud_id_fecha');
Route::get('graficas/aclaraciones/otros_id/{id}/{fecha}/{fecha_dos}','GraficaAclaraciones@grafica_otrostramites_id_fecha');
Route::get('graficas/aclaraciones/altoconsumo','GraficaAclaraciones@grafica_altoconsumo');
Route::get('graficas/aclaraciones/reconexion','GraficaAclaraciones@grafica_reconexion');
Route::get('graficas/aclaraciones/errordelectura','GraficaAclaraciones@grafica_errorenlectura');
Route::get('graficas/aclaraciones/notoma','GraficaAclaraciones@grafica_notoma');
Route::get('graficas/aclaraciones/noentrega','GraficaAclaraciones@grafica_noentrega');
Route::get('graficas/aclaraciones/cambiodetarifa','GraficaAclaraciones@grafica_cambiodetarifa');
Route::get('graficas/aclaraciones/solicitud','GraficaAclaraciones@grafica_solicitud');
Route::get('graficas/aclaraciones/otros','GraficaAclaraciones@grafica_otrostramites');
Route::get('graficas/aclaraciones/altoconsumo/{id}','GraficaAclaraciones@grafica_altoconsumo_id');
Route::get('graficas/aclaraciones/reconexion/{id}','GraficaAclaraciones@grafica_reconexion_id');
Route::get('graficas/aclaraciones/errordelectura/{id}','GraficaAclaraciones@grafica_errorenlectura_id');
Route::get('graficas/aclaraciones/notoma/{id}','GraficaAclaraciones@grafica_notoma_id');
Route::get('graficas/aclaraciones/noentrega/{id}','GraficaAclaraciones@grafica_noentrega_id');
Route::get('graficas/aclaraciones/cambiodetarifa/{id}','GraficaAclaraciones@grafica_cambiodetarifa_id');
Route::get('graficas/aclaraciones/solicitud/{id}','GraficaAclaraciones@grafica_solicitud_id');
Route::get('graficas/aclaraciones/otros/{id}','GraficaAclaraciones@grafica_otrostramites_id');

//graficas pagos
Route::get('graficas/pago/recibo/{fecha}/{fecha_dos}','GraficaPagos@grafica_recibo_fecha');
Route::get('graficas/pago/convenio/{fecha}/{fecha_dos}','GraficaPagos@grafica_pagoconvenio_fecha');
Route::get('graficas/pago/carta/{fecha}/{fecha_dos}','GraficaPagos@grafica_pagocarta_fecha');
Route::get('graficas/pago/recibo_id/{id}/{fecha}/{fecha_dos}','GraficaPagos@grafica_recibo_fecha');
Route::get('graficas/pago/convenio_id/{id}/{fecha}/{fecha_dos}','GraficaPagos@grafica_pagoconvenio_fecha');
Route::get('graficas/pago/carta_id/{id}/{fecha}/{fecha_dos}','GraficaPagos@grafica_pagocarta_fecha');
Route::get('graficas/pago/recibo','GraficaPagos@grafica_recibo');
Route::get('graficas/pago/convenio','GraficaPagos@grafica_pagoconvenio');
Route::get('graficas/pago/carta','GraficaPagos@grafica_pagocarta');
Route::get('graficas/pago/recibo/{id}','GraficaPagos@grafica_recibo_id');
Route::get('graficas/pago/convenio/{id}','GraficaPagos@grafica_pagoconvenio_id');
Route::get('graficas/pago/carta/{is}','GraficaPagos@grafica_pagocarta_id');

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