<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
use DB;
use Carbon\Carbon;
use App\Sucursal;

class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
        Carbon::setLocale('es');

    }
    public function importar()
    {
        $data = array();
        $carbon =  Carbon::today()->format('d-m-Y');
        Excel::create('Reporte de actividad a:'.$carbon, function($excel) 
        {
            
            $excel->sheet('Reporte', function($sheet) 
            {

                $carbon =  Carbon::today()->format('d-m-Y');
                $atendidos = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)->whereRaw('Date(created_at) = CURDATE()')->count();
                $abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->whereRaw('Date(created_at) = CURDATE()')->count();
                $aclaraciones=DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(created_at) = CURDATE()')->count();  
                $aclaraciones_abandonadas = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(created_at) = CURDATE()')->count(); 
                $tramites = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('subasunto','Trámites')->whereRaw('Date(created_at) = CURDATE()')->count();
                $tramites_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('subasunto','Trámites')->whereRaw('Date(created_at) = CURDATE()')->count();
                $pago = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('subasunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->count();
                $pago_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('subasunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->count(); 

                //Tramites
                $contrato = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Contrato')->whereRaw('Date(created_at) = CURDATE()')->count();
                $contrato_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Contrato')->whereRaw('Date(created_at) = CURDATE()')->count();
                $convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Convenio')->whereRaw('Date(created_at) = CURDATE()')->count();
                $convenio_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Convenio')->whereRaw('Date(created_at) = CURDATE()')->count();
                $cambio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Cambio de nombre')->whereRaw('Date(created_at) = CURDATE()')->count();
                $cambio_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Cambio de nombre')->whereRaw('Date(created_at) = CURDATE()')->count();
                $carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Carta de adeudo')->whereRaw('Date(created_at) = CURDATE()')->count();
                $carta_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Carta de adeudo')->whereRaw('Date(created_at) = CURDATE()')->count();
                $factibilidad = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Factibilidad')->whereRaw('Date(created_at) = CURDATE()')->count();
                $factibilidad_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Factibilidad')->whereRaw('Date(created_at) = CURDATE()')->count();
                $dosomas = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','2 ó más trámites')->whereRaw('Date(created_at) = CURDATE()')->count();
                $dosomas_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','2 ó más trámites')->whereRaw('Date(created_at) = CURDATE()')->count();

                //Aclaraciones
                $alto = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Alto consumo (con y sin medidor)')->whereRaw('Date(created_at) = CURDATE()')->count();
                $alto_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Alto consumo (con y sin medidor)')->whereRaw('Date(created_at) = CURDATE()')->count();
                $reconexion = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Reconexión de servicio')->whereRaw('Date(created_at) = CURDATE()')->count();
                $reconexion_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Reconexión de servicio')->whereRaw('Date(created_at) = CURDATE()')->count();   
                $error = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Error en lectura')->whereRaw('Date(created_at) = CURDATE()')->count();     
                $error_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Error en lectura')->whereRaw('Date(created_at) = CURDATE()')->count();  
                $notoma = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','No toma lectura')->whereRaw('Date(created_at) = CURDATE()')->count();     
                $notoma_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','No toma lectura')->whereRaw('Date(created_at) = CURDATE()')->count();
                $noentrega = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','No entrega de recibo')->whereRaw('Date(created_at) = CURDATE()')->count();     
                $noentrega_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','No entrega de recibo')->whereRaw('Date(created_at) = CURDATE()')->count();
                $cambiotarifa = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Cambio de tarifa')->whereRaw('Date(created_at) = CURDATE()')->count();     
                $cambiodetarifa_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Cambio de tarifa')->whereRaw('Date(created_at) = CURDATE()')->count(); 
                $solicitud = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Solicitud de medidor')->whereRaw('Date(created_at) = CURDATE()')->count();     
                $solicitud_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Solicitud de medidor')->whereRaw('Date(created_at) = CURDATE()')->count();                
                $otros = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Otros trámites')->whereRaw('Date(created_at) = CURDATE()')->count();     
                $otros_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Otros trámites')->whereRaw('Date(created_at) = CURDATE()')->count();

                //Pagos
                $pago = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->count();     
                $pago_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->count();
                $pago_convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Pago de convenio')->whereRaw('Date(created_at) = CURDATE()')->count();     
                $pago_convenio_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Pago de convenio')->whereRaw('Date(created_at) = CURDATE()')->count();
                $pago_carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Pago carta no adeudo')->whereRaw('Date(created_at) = CURDATE()')->count();     
                $pago_carta_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Pago carta no adeudo')->whereRaw('Date(created_at) = CURDATE()')->count();                            
                $sheet->appendRow(array('Reporte de actividad a:',$carbon));
                $sheet->appendRow(2,array('','Atendidos','Abandonados')); 
                $sheet->appendRow(array('Turnos totales:',$atendidos, $abandonados));
                $sheet->appendRow(array('Subasunto'));
                $sheet->appendRow(array('Pago',$pago,$pago_abandonado)); 
                $sheet->appendRow(array('Tramites',$tramites,$tramites_abandonados)); 
                $sheet->appendRow(array('Aclaraciones',$aclaraciones,$aclaraciones_abandonadas)); 
                $sheet->appendRow(array('','Tramites',));
                $sheet->appendRow(array('Contrato',$contrato,$contrato_abandonado));
                $sheet->appendRow(array('Convenio',$convenio,$convenio_abandonado));
                $sheet->appendRow(array('Cambio de Nombre',$cambio,$cambio_abandonado));
                $sheet->appendRow(array('Carta de no adeudo',$carta,$carta_abandonado));
                $sheet->appendRow(array('Factibilidad de servicios',$factibilidad,$factibilidad_abandonado));
                $sheet->appendRow(array('2 o mas tramites',$dosomas,$dosomas_abandonado));
                $sheet->appendRow(array('','Aclaraciones',));
                $sheet->appendRow(array('Alto Consumo',$alto,$alto_abandonado));
                $sheet->appendRow(array('Reconexion de servicio',$reconexion,$reconexion_abandonado));
                $sheet->appendRow(array('Error de lectura',$error,$error_abandonados));
                $sheet->appendRow(array('No toma de lectura',$notoma,$notoma_abandonados));
                $sheet->appendRow(array('No entrega de recibo',$noentrega,$noentrega_abandonados));
                $sheet->appendRow(array('Cambio de tarifa',$cambiotarifa,$cambiodetarifa_abandonados));
                $sheet->appendRow(array('Solicitud de medidor',$solicitud,$solicitud_abandonados));
                $sheet->appendRow(array('Otros tramites',$otros,$otros_abandonados));
                $sheet->appendRow(array('','Pagos'));
                $sheet->appendRow(array('Recibo',$pago,$pago_abandonados));
                $sheet->appendRow(array('Convenio',$pago_convenio,$pago_convenio_abandonados));
                $sheet->appendRow(array('Carta de no adeudo',$pago_carta,$pago_carta_abandonados));
            });
            $excel->sheet('Promedio', function($sheet) 
            {
                $carbon =  Carbon::today()->format('d-m-Y');

                $promedio_tramites=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Tramites')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first();

                $promedio_tramitesa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Tramites')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first();

                $promedio_aclaraciones=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first();

                $promedio_aclaracionesa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Aclaraciones y Otros')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first();    

                $promedio_pago=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Pago')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first();

                $promedio_pagoa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Pago')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first();     

                $promedio_contrato=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Contrato')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first();

                $promedio_convenio=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Convenio')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first(); 
                    
                $promedio_cambio=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Cambio de nombre')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first(); 
                    
                    
                $promedio_carta=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Carta de adeudo')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first(); 
                    
                $promedio_factibilidad=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Factibilidad')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first(); 
                    
                $promedio_dosomas=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','2 o mas tramites')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first();

                $promedio_contrato_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Contrato')
                    ->where('estado',1)
                     ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first();

                $promedio_convenio_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Convenio')
                    ->where('estado',1)
                     ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first(); 

                $promedio_cambio_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Cambio de nombre')
                    ->where('estado',1)
                     ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first(); 

                $promedio_carta_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Carta de adeudo')
                    ->where('estado',1)
                     ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first(); 
                    
                $promedio_factibilidad_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Factibilidad')
                    ->where('estado',1)
                     ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first(); 
                    
                $promedio_dosomas_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','2 o mas tramites')
                    ->where('estado',1)
                     ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first();     

                
                
                $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
                $promedio_atendido = round(($promedio_tramitesa->tiempo + $promedio_aclaracionesa->tiempo + $promedio_pagoa->tiempo ) / 3 );    
                $sheet->appendRow(array('Reporte de actividad a:',$carbon, 'General'));
                $sheet->appendRow(array('','Promedio de tiempo de espera','Promedio de tiempo de atencion'));
                $sheet->appendRow(array('Global',$promedio,$promedio_atendido));
                    
                foreach ($promedio_tramites as $p) 
                {
                    foreach ($promedio_tramitesa as $pt) 
                    {   
                        $sheet->appendRow(array('Tramites',$p,$pt));
                    }
                }
                foreach ($promedio_aclaraciones as $p) 
                {
                    foreach ($promedio_aclaracionesa as $pa) 
                    {   
                        $sheet->appendRow(array('Aclaraciones',$p,$pa));
                    }
                }
                foreach ($promedio_pago as $p) 
                {
                    foreach ($promedio_pagoa as $pa) 
                    {   
                        $sheet->appendRow(array('Pago',$p,$pa));
                    }
                }
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Tramites','Promedio de tiempo de espera','Promedio de tiempo de atencion'));

                foreach ($promedio_contrato_espera as $p) 
                {
                    foreach ($promedio_contrato as $pt) 
                    {   
                        $sheet->appendRow(array('Contrato',$p,$pt));
                    }
                }
                 foreach ($promedio_convenio_espera as $p) 
                {
                    foreach ($promedio_convenio as $pt) 
                    {   
                        $sheet->appendRow(array('Convenio',$p,$pt));
                    }
                }
                foreach ($promedio_cambio_espera as $p) 
                {
                    foreach ($promedio_cambio as $pt) 
                    {   
                        $sheet->appendRow(array('Cambio de nombre',$p,$pt));
                    }
                }
                foreach ($promedio_carta_espera as $p) 
                {
                    foreach ($promedio_carta as $pt) 
                    {   
                        $sheet->appendRow(array('Carta de no adeudo',$p,$pt));
                    }
                }
                foreach ($promedio_factibilidad_espera as $p) 
                {
                    foreach ($promedio_factibilidad as $pt) 
                    {   
                        $sheet->appendRow(array('Factibilidad de servicio',$p,$pt));
                    }
                }
                foreach ($promedio_dosomas_espera as $p) 
                {
                    foreach ($promedio_dosomas as $pt) 
                    {   
                        $sheet->appendRow(array('2 o mas tramites',$p,$pt));
                    }
                }
                
                $promedio_tramites_mes=DB::table('tikets')
                ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME)  as tiempo_atencion, CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, MONTH(created_at) as mes')
                ->where('subasunto','Trámites')
                ->where('estado',1)
                ->groupBy('mes')
                ->get();
        
                $promedio_aclaraciones_mes=DB::table('tikets')
                ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME)  as tiempo_atencion,  CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, MONTH(created_at) as mes')
                ->where('subasunto','Aclaraciones y Otros')
                ->where('estado',1)
                ->groupBy('mes')
                ->get();
        
                $promedio_pago_mes=DB::table('tikets')
                ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME)  as tiempo_atencion,  CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, MONTH(created_at) as mes')
                ->where('subasunto','Pago')
                ->where('estado',1)
                ->groupBy('mes')
                ->get();

                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio tiempo tramites por mes'));
                $sheet->appendRow(array('Mes','Promedio de tiempo de espera','Promedio de tiempo de atencion'));   

                foreach ($promedio_tramites_mes as $p) 
                {
                    if($p->mes == '1')
                    {
                        $sheet->appendRow(array('Enero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '2')
                    {
                        $sheet->appendRow(array('Febrero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '3')
                    {
                        $sheet->appendRow(array('Marzo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '4')
                    {
                        $sheet->appendRow(array('Abril', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '5')
                    {
                        $sheet->appendRow(array('Mayo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '6')
                    {
                        $sheet->appendRow(array('Junio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '7')
                    {
                        $sheet->appendRow(array('Julio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '8')
                    {
                        $sheet->appendRow(array('Agosto', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '9')
                    {
                        $sheet->appendRow(array('Septiembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '10')
                    {
                        $sheet->appendRow(array('Octubre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '11')
                    {
                        $sheet->appendRow(array('Noviembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '12')
                    {
                        $sheet->appendRow(array('Diciembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                }
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio tiempo aclaraciones por mes'));
                $sheet->appendRow(array('Mes','Promedio de tiempo de espera','Promedio de tiempo de atencion'));   

                foreach ($promedio_aclaraciones_mes as $p) 
                {
                    if($p->mes == '1')
                    {
                        $sheet->appendRow(array('Enero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '2')
                    {
                        $sheet->appendRow(array('Febrero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '3')
                    {
                        $sheet->appendRow(array('Marzo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '4')
                    {
                        $sheet->appendRow(array('Abril', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '5')
                    {
                        $sheet->appendRow(array('Mayo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '6')
                    {
                        $sheet->appendRow(array('Junio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '7')
                    {
                        $sheet->appendRow(array('Julio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '8')
                    {
                        $sheet->appendRow(array('Agosto', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '9')
                    {
                        $sheet->appendRow(array('Septiembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '10')
                    {
                        $sheet->appendRow(array('Octubre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '11')
                    {
                        $sheet->appendRow(array('Noviembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '12')
                    {
                        $sheet->appendRow(array('Diciembre', $p->tiempo, $p->tiempo_atencion ));
                    }

                }

                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio tiempo pago por mes'));
                $sheet->appendRow(array('Mes','Promedio de tiempo de espera','Promedio de tiempo de atencion'));   

                foreach ($promedio_pago_mes as $p) 
                {
                    if($p->mes == '1')
                    {
                        $sheet->appendRow(array('Enero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '2')
                    {
                        $sheet->appendRow(array('Febrero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '3')
                    {
                        $sheet->appendRow(array('Marzo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '4')
                    {
                        $sheet->appendRow(array('Abril', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '5')
                    {
                        $sheet->appendRow(array('Mayo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '6')
                    {
                        $sheet->appendRow(array('Junio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '7')
                    {
                        $sheet->appendRow(array('Julio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '8')
                    {
                        $sheet->appendRow(array('Agosto', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '9')
                    {
                        $sheet->appendRow(array('Septiembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '10')
                    {
                        $sheet->appendRow(array('Octubre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '11')
                    {
                        $sheet->appendRow(array('Noviembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '12')
                    {
                        $sheet->appendRow(array('Diciembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                }   
            });
            $excel->sheet('Meses', function($sheet)  
            {
                $carbon =  Carbon::today()->format('d-m-Y');
 
                $asunto_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero,subasunto, MONTH(created_at) as mes')
                     ->where('estado',1)
                    ->groupBy('mes')
                    ->groupBy('subasunto')
                    ->get();

                $sheet->appendRow(array('Reporte de actividad a:',$carbon, 'General'));
                $sheet->appendRow(array('Mes','Asunto','Numero'));
                foreach ($asunto_mes as $am) 
                {
                    if ($am->mes == '1') 
                    {
                        $sheet->appendRow(array('Enero', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '2') 
                    {
                        $sheet->appendRow(array('Febrero', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '3') 
                    {
                        $sheet->appendRow(array('Marzo', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '4') 
                    {
                        $sheet->appendRow(array('Abril', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '5') 
                    {
                        $sheet->appendRow(array('Mayo', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '6') 
                    {
                        $sheet->appendRow(array('Junio', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '7') 
                    {
                        $sheet->appendRow(array('Julio', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '8') 
                    {
                        $sheet->appendRow(array('Agosto', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '9') 
                    {
                        $sheet->appendRow(array('Septiembre', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '10') 
                    {
                        $sheet->appendRow(array('Octubre', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '11') 
                    {
                        $sheet->appendRow(array('Noviembre', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '12') 
                    {
                        $sheet->appendRow(array('Diciembre', $am->subasunto, $am->numero));

                    }

                }
                $tramites_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
                     ->where('estado',1)
                    ->where('subasunto','Tramites')
                    ->groupBy('mes')
                    ->groupBy('asunto')
                    ->get();
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Mes','Tramites','Numero'));

                foreach ($tramites_mes as $tm) 
                {
                    if ($tm->mes == '1') 
                    {
                        $sheet->appendRow(array('Enero', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '2') 
                    {
                        $sheet->appendRow(array('Febrero', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '3') 
                    {
                        $sheet->appendRow(array('Marzo', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '4') 
                    {
                        $sheet->appendRow(array('Abril', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '5') 
                    {
                        $sheet->appendRow(array('Mayo', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '6') 
                    {
                        $sheet->appendRow(array('Junio', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '7') 
                    {
                        $sheet->appendRow(array('Julio', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '8') 
                    {
                        $sheet->appendRow(array('Agosto', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '9') 
                    {
                        $sheet->appendRow(array('Septiembre', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '10') 
                    {
                        $sheet->appendRow(array('Octubre', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '11') 
                    {
                        $sheet->appendRow(array('Noviembre', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '12') 
                    {
                        $sheet->appendRow(array('Diciembre', $tm->asunto, $tm->numero));

                    }
                }
                $aclaraciones_mes = DB::table('tikets')
                    ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
                     ->where('estado',1)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->groupBy('mes')
                    ->groupBy('asunto')
                    ->get();

                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Mes','Aclaraciones','Numero'));

                foreach ($aclaraciones_mes as $acm) 
                {
                    if ($acm->mes == '1') 
                    {
                        $sheet->appendRow(array('Enero', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '2') 
                    {
                        $sheet->appendRow(array('Febrero', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '3') 
                    {
                        $sheet->appendRow(array('Marzo', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '4') 
                    {
                        $sheet->appendRow(array('Abril', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '5') 
                    {
                        $sheet->appendRow(array('Mayo', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '6') 
                    {
                        $sheet->appendRow(array('Junio', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '7') 
                    {
                        $sheet->appendRow(array('Julio', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '8') 
                    {
                        $sheet->appendRow(array('Agosto', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '9') 
                    {
                        $sheet->appendRow(array('Septiembre', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '10') 
                    {
                        $sheet->appendRow(array('Octubre', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '11') 
                    {
                        $sheet->appendRow(array('Noviembre', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '12') 
                    {
                        $sheet->appendRow(array('Diciembre', $acm->asunto, $acm->numero));

                    }
                }

                 $pago_mes = DB::table('tikets')
                    ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
                     ->where('estado',1)
                    ->where('subasunto','Pago')
                    ->groupBy('mes')
                    ->groupBy('asunto')
                    ->get();
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Mes','Pagos','Numero'));
                foreach ($pago_mes as $pm) 
                {
                    if ($pm->mes == '1') 
                    {
                        $sheet->appendRow(array('Enero', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '2') 
                    {
                        $sheet->appendRow(array('Febrero', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '3') 
                    {
                        $sheet->appendRow(array('Marzo', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '4') 
                    {
                        $sheet->appendRow(array('Abril', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '5') 
                    {
                        $sheet->appendRow(array('Mayo', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '6') 
                    {
                        $sheet->appendRow(array('Junio', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '7') 
                    {
                        $sheet->appendRow(array('Julio', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '8') 
                    {
                        $sheet->appendRow(array('Agosto', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '9') 
                    {
                        $sheet->appendRow(array('Septiembre', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '10') 
                    {
                        $sheet->appendRow(array('Octubre', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '11') 
                    {
                        $sheet->appendRow(array('Noviembre', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '12') 
                    {
                        $sheet->appendRow(array('Diciembre', $pm->asunto, $pm->numero));

                    }
                }
            });
            $excel->sheet('Horas', function($sheet)
            {
                $carbon =  Carbon::today()->format('d-m-Y');

                $sheet->appendRow(array('Reporte de actividad a:',$carbon, 'General'));

                $horas_tramites = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                     ->where('estado',1)
                    ->where('subasunto','Tramites')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();

                $horas_aclaraciones = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                     ->where('estado',1)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();    

                $horas_pagos = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                     ->where('estado',1)
                    ->where('subasunto','Pago')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();  

                
                $sheet->appendRow(array('Tramites','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_tramites as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }

                $sheet->appendRow(array('','',''));
                $sheet->appendRow(array('Aclaraciones','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_aclaraciones as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }

                $sheet->appendRow(array('','',''));
                $sheet->appendRow(array('Pagos','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_pagos as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }
            });
            
        })->export('xls');
    }
    public function importar_sucursal($id)
    {
  
        $data = array();
        $carbon =  Carbon::today()->format('d-m-Y');
        $sucursal = Sucursal::where('id', $id)->first();

        Excel::create('Reporte de actividad a:'.$carbon.' Sucursal: '.$sucursal->nombre,  function($excel) use($id)
        {
            //dd($id);
            //dd($id_sucursal);
            $excel->sheet('Reporte', function($sheet) use($id)
            {

                $carbon =  Carbon::today()->format('d-m-Y');
                $sucursal = Sucursal::where('id', $id)->first();

                $atendidos = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $aclaraciones=DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $aclaraciones_abandonadas = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count(); 
                $tramites = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('subasunto','Trámites')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $tramites_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('subasunto','Trámites')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $pago = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('subasunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $pago_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('subasunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count(); 

                //Tramites
                $contrato = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Contrato')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $contrato_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Contrato')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Convenio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $convenio_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Convenio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $cambio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Cambio de nombre')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $cambio_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Cambio de nombre')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Carta de adeudo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $carta_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Carta de adeudo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $factibilidad = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Factibilidad')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $factibilidad_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Factibilidad')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $dosomas = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','2 ó más trámites')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $dosomas_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','2 ó más trámites')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();

                //Aclaraciones
                $alto = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Alto consumo (con y sin medidor)')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)
                    ->count();
                $alto_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Alto consumo (con y sin medidor)')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)
                    ->count();
                $reconexion = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Reconexión de servicio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $reconexion_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Reconexión de servicio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)
                    ->count();   
                $error = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Error en lectura')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();     
                $error_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Error en lectura')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();  
                $notoma = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','No toma lectura')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();     
                $notoma_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','No toma lectura')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $noentrega = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','No entrega de recibo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();   
                $noentrega_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','No entrega de recibo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $cambiotarifa = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Cambio de tarifa')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();     
                $cambiodetarifa_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Cambio de tarifa')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count(); 
                $solicitud = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Solicitud de medidor')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();   
                $solicitud_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Solicitud de medidor')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $otros = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Otros trámites')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();     
                $otros_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Otros trámites')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();

                //Pagos
                $pago = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();     
                $pago_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $pago_convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Pago de convenio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();     
                $pago_convenio_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Pago de convenio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();
                $pago_carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
                    ->where('asunto','Pago carta no adeudo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();  
                $pago_carta_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
                    ->where('asunto','Pago carta no adeudo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal', $id)->count();                            
                
                $sheet->appendRow(array('Reporte de actividad a:',$carbon, $sucursal->nombre));
                $sheet->appendRow(2,array('','Atendidos','Abandonados')); 
                $sheet->appendRow(array('Turnos totales:',$atendidos, $abandonados));
                $sheet->appendRow(array('Subasunto'));
                $sheet->appendRow(array('Pago',$pago,$pago_abandonado)); 
                $sheet->appendRow(array('Tramites',$tramites,$tramites_abandonados)); 
                $sheet->appendRow(array('Aclaraciones',$aclaraciones,$aclaraciones_abandonadas)); 
                $sheet->appendRow(array('','Tramites',));
                $sheet->appendRow(array('Contrato',$contrato,$contrato_abandonado));
                $sheet->appendRow(array('Convenio',$convenio,$convenio_abandonado));
                $sheet->appendRow(array('Cambio de Nombre',$cambio,$cambio_abandonado));
                $sheet->appendRow(array('Carta de no adeudo',$carta,$carta_abandonado));
                $sheet->appendRow(array('Factibilidad de servicios',$factibilidad,$factibilidad_abandonado));
                $sheet->appendRow(array('2 o mas tramites',$dosomas,$dosomas_abandonado));
                $sheet->appendRow(array('','Aclaraciones',));
                $sheet->appendRow(array('Alto Consumo',$alto,$alto_abandonado));
                $sheet->appendRow(array('Reconexion de servicio',$reconexion,$reconexion_abandonado));
                $sheet->appendRow(array('Error de lectura',$error,$error_abandonados));
                $sheet->appendRow(array('No toma de lectura',$notoma,$notoma_abandonados));
                $sheet->appendRow(array('No entrega de recibo',$noentrega,$noentrega_abandonados));
                $sheet->appendRow(array('Cambio de tarifa',$cambiotarifa,$cambiodetarifa_abandonados));
                $sheet->appendRow(array('Solicitud de medidor',$solicitud,$solicitud_abandonados));
                $sheet->appendRow(array('Otros tramites',$otros,$otros_abandonados));
                $sheet->appendRow(array('','Pagos'));
                $sheet->appendRow(array('Recibo',$pago,$pago_abandonados));
                $sheet->appendRow(array('Convenio',$pago_convenio,$pago_convenio_abandonados));
                $sheet->appendRow(array('Carta de no adeudo',$pago_carta,$pago_carta_abandonados));
            });
            $excel->sheet('Promedio', function($sheet) use($id) 
            {
                $carbon =  Carbon::today()->format('d-m-Y');
                $sucursal = Sucursal::where('id', $id)->first();

                $promedio_tramites=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Tramites')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal', $id)
                    ->first();

                $promedio_tramitesa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Tramites')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal', $id)
                    ->first();

                $promedio_aclaraciones=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal', $id)
                    ->first();

                $promedio_aclaracionesa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Aclaraciones y Otros')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal', $id)
                    ->first();    

                $promedio_pago=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Pago')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal', $id)
                    ->first();

                $promedio_pagoa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Pago')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal', $id)
                    ->first();     

                $promedio_contrato=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Contrato')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal', $id)
                    ->first();

                $promedio_convenio=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Convenio')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal',$id)            
                    ->first(); 
                    
                $promedio_cambio=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Cambio de nombre')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal',$id)            
                    ->first(); 
                    
                    
                $promedio_carta=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Carta de adeudo')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal',$id)            
                    ->first(); 
                    
                $promedio_factibilidad=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Factibilidad')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal',$id)            
                    ->first(); 
                    
                $promedio_dosomas=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','2 o mas tramites')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal',$id)            
                    ->first();

                $promedio_contrato_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Contrato')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first();

                $promedio_convenio_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Convenio')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first(); 

                $promedio_cambio_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Cambio de nombre')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first(); 

                $promedio_carta_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Carta de adeudo')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first(); 
                    
                $promedio_factibilidad_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Factibilidad')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first(); 
                    
                $promedio_dosomas_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','2 o mas tramites')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first();     

                 $promedio_tramites_cajera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo_atencion, fk_caja as caja')
                    ->where('subasunto','Trámites')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal',$id)
                    ->groupBy('caja')
                    ->get();

                $promedio_aclaraciones_cajera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo_atencion, fk_caja as caja')
                    ->where('subasunto','Aclaraciones y Otros')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal',$id)
                    ->groupBy('caja')
                    ->get();
                
                $promedio_pago_cajera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo_atencion, fk_caja as caja')
                    ->where('subasunto','Pago')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('id_sucursal',$id)
                    ->groupBy('caja')
                    ->get();   


                $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
                $promedio_atendido = round(($promedio_tramitesa->tiempo + $promedio_aclaracionesa->tiempo + $promedio_pagoa->tiempo ) / 3 );    
                $sheet->appendRow(array('Reporte de actividad a:',$carbon, $sucursal->nombre));
                $sheet->appendRow(array('','Promedio de tiempo de espera','Promedio de tiempo de atencion'));
                $sheet->appendRow(array('Global',$promedio,$promedio_atendido));
                    
                foreach ($promedio_tramites as $p) 
                {
                    foreach ($promedio_tramitesa as $pt) 
                    {   
                        $sheet->appendRow(array('Tramites',$p,$pt));
                    }
                }
                foreach ($promedio_aclaraciones as $p) 
                {
                    foreach ($promedio_aclaracionesa as $pa) 
                    {   
                        $sheet->appendRow(array('Aclaraciones',$p,$pa));
                    }
                }
                foreach ($promedio_pago as $p) 
                {
                    foreach ($promedio_pagoa as $pa) 
                    {   
                        $sheet->appendRow(array('Pago',$p,$pa));
                    }
                }
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Tramites','Promedio de tiempo de espera','Promedio de tiempo de atencion'));

                foreach ($promedio_contrato_espera as $p) 
                {
                    foreach ($promedio_contrato as $pt) 
                    {   
                        $sheet->appendRow(array('Contrato',$p,$pt));
                    }
                }
                 foreach ($promedio_convenio_espera as $p) 
                {
                    foreach ($promedio_convenio as $pt) 
                    {   
                        $sheet->appendRow(array('Convenio',$p,$pt));
                    }
                }
                foreach ($promedio_cambio_espera as $p) 
                {
                    foreach ($promedio_cambio as $pt) 
                    {   
                        $sheet->appendRow(array('Cambio de nombre',$p,$pt));
                    }
                }
                foreach ($promedio_carta_espera as $p) 
                {
                    foreach ($promedio_carta as $pt) 
                    {   
                        $sheet->appendRow(array('Carta de no adeudo',$p,$pt));
                    }
                }
                foreach ($promedio_factibilidad_espera as $p) 
                {
                    foreach ($promedio_factibilidad as $pt) 
                    {   
                        $sheet->appendRow(array('Factibilidad de servicio',$p,$pt));
                    }
                }
                foreach ($promedio_dosomas_espera as $p) 
                {
                    foreach ($promedio_dosomas as $pt) 
                    {   
                        $sheet->appendRow(array('2 o mas tramites',$p,$pt));
                    }
                }
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio Tramites por agentes'));
                $sheet->appendRow(array('Ventanilla','Promedio de tiempo de espera','Promedio de tiempo de atencion'));

                foreach ($promedio_tramites_cajera as $p) 
                {
                    $sheet->appendRow(array( $p->caja, $p->tiempo, $p->tiempo_atencion ));
                }

                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio Aclaraciones por agentes'));
                $sheet->appendRow(array('Ventanilla','Promedio de tiempo de espera','Promedio de tiempo de atencion'));

                foreach ($promedio_aclaraciones_cajera as $p) 
                {
                    $sheet->appendRow(array( $p->caja, $p->tiempo, $p->tiempo_atencion ));
                }
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio Pagos por agentes'));
                $sheet->appendRow(array('Ventanilla','Promedio de tiempo de espera','Promedio de tiempo de atencion'));
                
                foreach ($promedio_pago_cajera as $p) 
                {
                    $sheet->appendRow(array( $p->caja, $p->tiempo, $p->tiempo_atencion ));
                }

          
            $promedio_tramites_mes=DB::table('tikets')
                ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME)  as tiempo_atencion, CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, MONTH(created_at) as mes')
                ->where('subasunto','Trámites')
                ->where('estado',1)
                ->where('id_sucursal',$id)
                ->groupBy('mes')
                ->get();
        
            $promedio_aclaraciones_mes=DB::table('tikets')
                ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME)  as tiempo_atencion,  CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, MONTH(created_at) as mes')
                ->where('subasunto','Aclaraciones y Otros')
                ->where('estado',1)
                ->where('id_sucursal',$id)
                ->groupBy('mes')
                ->get();
        
            $promedio_pago_mes=DB::table('tikets')
                ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME)  as tiempo_atencion,  CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, MONTH(created_at) as mes')
                ->where('subasunto','Pago')
                ->where('estado',1)
                ->where('id_sucursal',$id)
                ->groupBy('mes')
                ->get();

                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio tiempo tramites por mes'));
                $sheet->appendRow(array('Mes','Promedio de tiempo de espera','Promedio de tiempo de atencion'));   

                foreach ($promedio_tramites_mes as $p) 
                {
                    if($p->mes == '1')
                    {
                        $sheet->appendRow(array('Enero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '2')
                    {
                        $sheet->appendRow(array('Febrero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '3')
                    {
                        $sheet->appendRow(array('Marzo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '4')
                    {
                        $sheet->appendRow(array('Abril', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '5')
                    {
                        $sheet->appendRow(array('Mayo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '6')
                    {
                        $sheet->appendRow(array('Junio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '7')
                    {
                        $sheet->appendRow(array('Julio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '8')
                    {
                        $sheet->appendRow(array('Agosto', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '9')
                    {
                        $sheet->appendRow(array('Septiembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '10')
                    {
                        $sheet->appendRow(array('Octubre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '11')
                    {
                        $sheet->appendRow(array('Noviembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '12')
                    {
                        $sheet->appendRow(array('Diciembre', $p->tiempo, $p->tiempo_atencion ));
                    }                
                }
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio tiempo aclaraciones por mes'));
                $sheet->appendRow(array('Mes','Promedio de tiempo de espera','Promedio de tiempo de atencion'));   

                foreach ($promedio_aclaraciones_mes as $p) 
                {
                    if($p->mes == '1')
                    {
                        $sheet->appendRow(array('Enero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '2')
                    {
                        $sheet->appendRow(array('Febrero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '3')
                    {
                        $sheet->appendRow(array('Marzo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '4')
                    {
                        $sheet->appendRow(array('Abril', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '5')
                    {
                        $sheet->appendRow(array('Mayo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '6')
                    {
                        $sheet->appendRow(array('Junio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '7')
                    {
                        $sheet->appendRow(array('Julio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '8')
                    {
                        $sheet->appendRow(array('Agosto', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '9')
                    {
                        $sheet->appendRow(array('Septiembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '10')
                    {
                        $sheet->appendRow(array('Octubre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '11')
                    {
                        $sheet->appendRow(array('Noviembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '12')
                    {
                        $sheet->appendRow(array('Diciembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                }

                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio tiempo pago por mes'));
                $sheet->appendRow(array('Mes','Promedio de tiempo de espera','Promedio de tiempo de atencion'));   

                foreach ($promedio_pago_mes as $p) 
                {
                    if($p->mes == '1')
                    {
                        $sheet->appendRow(array('Enero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '2')
                    {
                        $sheet->appendRow(array('Febrero', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '3')
                    {
                        $sheet->appendRow(array('Marzo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '4')
                    {
                        $sheet->appendRow(array('Abril', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '5')
                    {
                        $sheet->appendRow(array('Mayo', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '6')
                    {
                        $sheet->appendRow(array('Junio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '7')
                    {
                        $sheet->appendRow(array('Julio', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '8')
                    {
                        $sheet->appendRow(array('Agosto', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '9')
                    {
                        $sheet->appendRow(array('Septiembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '10')
                    {
                        $sheet->appendRow(array('Octubre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '11')
                    {
                        $sheet->appendRow(array('Noviembre', $p->tiempo, $p->tiempo_atencion ));
                    }
                    else if($p->mes == '12')
                    {
                        $sheet->appendRow(array('Diciembre', $p->tiempo, $p->tiempo_atencion ));
                    }

                }
            });
            $excel->sheet('Agentes', function($sheet) use($id)
            {
                $carbon =  Carbon::today()->format('d-m-Y');
                $sucursal = Sucursal::where('id', $id)->first();

                $cajas = DB::table('tikets')
                    ->selectRaw('count(turno) as numero, subasunto, fk_caja as caja')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('estado',1)
                    ->groupBy('caja')
                    ->groupBy('subasunto')
                    ->get();

                $cajas_tramites = DB::table('tikets')
                    ->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
                    ->where("id_sucursal",$id)->where('subasunto','Tramites')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('estado',1)
                    ->groupBy('caja')
                    ->groupBy('subasunto')
                    ->get();
                    //dd($cajas_tramites);
        
                $cajas_pago=DB::table('tikets')
                    ->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
                    ->where("id_sucursal",$id)
                    ->where('subasunto','Pago')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('estado',1)
                    ->groupBy('caja')
                    ->groupBy('subasunto')
                    ->get();
        
                $cajas_aclaraciones=DB::table('tikets')
                    ->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
                    ->where("id_sucursal",$id)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->where('estado',1)
                    ->groupBy('caja')
                    ->groupBy('subasunto')
                    ->get();
                                    
                    $sheet->appendRow(array('Reporte de actividad a:',$carbon, $sucursal->nombre));
                    $sheet->appendRow(array('Ventanilla','Subasunto','Numero'));
                    foreach ($cajas as $c) 
                    {
                        $sheet->appendRow(array($c->caja, $c->subasunto, $c->numero));
                    }

                    $sheet->appendRow(array('','  ',''));
                    $sheet->appendRow(array('Ventanilla','Tramites','Numero'));
                    foreach ($cajas_tramites as $c) 
                    {
                        $sheet->appendRow(array($c->caja, $c->asunto, $c->numero));
                    }
                    
                    $sheet->appendRow(array('','  ',''));
                    $sheet->appendRow(array('Ventanilla','Aclaraciones','Numero'));
                    foreach ($cajas_aclaraciones as $c) 
                    {
                        $sheet->appendRow(array($c->caja, $c->asunto, $c->numero));
                    }

                    $sheet->appendRow(array('','  ',''));
                    $sheet->appendRow(array('Ventanilla','Pagos','Numero'));
                    
                    foreach ($cajas_pago as $c) 
                    {
                        $sheet->appendRow(array($c->caja, $c->asunto, $c->numero));
                    }
            });

            $excel->sheet('Meses', function($sheet) use($id)
            {
                $carbon =  Carbon::today()->format('d-m-Y');
                $sucursal = Sucursal::where('id', $id)->first();

                $asunto_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero,subasunto, MONTH(created_at) as mes')
                    ->where('id_sucursal',$id)
                    ->where('estado',1)
                    ->groupBy('mes')
                    ->groupBy('subasunto')
                    ->get();

                $sheet->appendRow(array('Reporte de actividad a:',$carbon, $sucursal->nombre));
                $sheet->appendRow(array('Mes','Asunto','Numero'));
                foreach ($asunto_mes as $am) 
                {
                    if ($am->mes == '1') 
                    {
                        $sheet->appendRow(array('Enero', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '2') 
                    {
                        $sheet->appendRow(array('Febrero', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '3') 
                    {
                        $sheet->appendRow(array('Marzo', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '4') 
                    {
                        $sheet->appendRow(array('Abril', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '5') 
                    {
                        $sheet->appendRow(array('Mayo', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '6') 
                    {
                        $sheet->appendRow(array('Junio', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '7') 
                    {
                        $sheet->appendRow(array('Julio', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '8') 
                    {
                        $sheet->appendRow(array('Agosto', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '9') 
                    {
                        $sheet->appendRow(array('Septiembre', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '10') 
                    {
                        $sheet->appendRow(array('Octubre', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '11') 
                    {
                        $sheet->appendRow(array('Noviembre', $am->subasunto, $am->numero));

                    }
                    else if ($am->mes == '12') 
                    {
                        $sheet->appendRow(array('Diciembre', $am->subasunto, $am->numero));

                    }

                }
                $tramites_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
                    ->where('id_sucursal',$id)
                    ->where('estado',1)
                    ->where('subasunto','Tramites')
                    ->groupBy('mes')
                    ->groupBy('asunto')
                    ->get();
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Mes','Tramites','Numero'));

                foreach ($tramites_mes as $tm) 
                {
                    if ($tm->mes == '1') 
                    {
                        $sheet->appendRow(array('Enero', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '2') 
                    {
                        $sheet->appendRow(array('Febrero', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '3') 
                    {
                        $sheet->appendRow(array('Marzo', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '4') 
                    {
                        $sheet->appendRow(array('Abril', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '5') 
                    {
                        $sheet->appendRow(array('Mayo', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '6') 
                    {
                        $sheet->appendRow(array('Junio', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '7') 
                    {
                        $sheet->appendRow(array('Julio', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '8') 
                    {
                        $sheet->appendRow(array('Agosto', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '9') 
                    {
                        $sheet->appendRow(array('Septiembre', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '10') 
                    {
                        $sheet->appendRow(array('Octubre', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '11') 
                    {
                        $sheet->appendRow(array('Noviembre', $tm->asunto, $tm->numero));

                    }
                    else if ($tm->mes == '12') 
                    {
                        $sheet->appendRow(array('Diciembre', $tm->asunto, $tm->numero));

                    }
                }
                $aclaraciones_mes = DB::table('tikets')
                    ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
                    ->where('id_sucursal',$id)
                    ->where('estado',1)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->groupBy('mes')
                    ->groupBy('asunto')
                    ->get();

                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Mes','Aclaraciones','Numero'));

                foreach ($aclaraciones_mes as $acm) 
                {
                    if ($acm->mes == '1') 
                    {
                        $sheet->appendRow(array('Enero', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '2') 
                    {
                        $sheet->appendRow(array('Febrero', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '3') 
                    {
                        $sheet->appendRow(array('Marzo', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '4') 
                    {
                        $sheet->appendRow(array('Abril', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '5') 
                    {
                        $sheet->appendRow(array('Mayo', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '6') 
                    {
                        $sheet->appendRow(array('Junio', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '7') 
                    {
                        $sheet->appendRow(array('Julio', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '8') 
                    {
                        $sheet->appendRow(array('Agosto', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '9') 
                    {
                        $sheet->appendRow(array('Septiembre', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '10') 
                    {
                        $sheet->appendRow(array('Octubre', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '11') 
                    {
                        $sheet->appendRow(array('Noviembre', $acm->asunto, $acm->numero));

                    }
                    else if ($acm->mes == '12') 
                    {
                        $sheet->appendRow(array('Diciembre', $acm->asunto, $acm->numero));

                    }
                }

                 $pago_mes = DB::table('tikets')
                    ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
                    ->where('id_sucursal',$id)
                    ->where('estado',1)
                    ->where('subasunto','Pago')
                    ->groupBy('mes')
                    ->groupBy('asunto')
                    ->get();
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Mes','Pagos','Numero'));
                foreach ($pago_mes as $pm) 
                {
                    if ($pm->mes == '1') 
                    {
                        $sheet->appendRow(array('Enero', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '2') 
                    {
                        $sheet->appendRow(array('Febrero', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '3') 
                    {
                        $sheet->appendRow(array('Marzo', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '4') 
                    {
                        $sheet->appendRow(array('Abril', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '5') 
                    {
                        $sheet->appendRow(array('Mayo', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '6') 
                    {
                        $sheet->appendRow(array('Junio', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '7') 
                    {
                        $sheet->appendRow(array('Julio', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '8') 
                    {
                        $sheet->appendRow(array('Agosto', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '9') 
                    {
                        $sheet->appendRow(array('Septiembre', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '10') 
                    {
                        $sheet->appendRow(array('Octubre', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '11') 
                    {
                        $sheet->appendRow(array('Noviembre', $pm->asunto, $pm->numero));

                    }
                    else if ($pm->mes == '12') 
                    {
                        $sheet->appendRow(array('Diciembre', $pm->asunto, $pm->numero));

                    }
                }
            });

            $excel->sheet('Horas', function($sheet) use($id)
            {
                $carbon =  Carbon::today()->format('d-m-Y');
                $sucursal = Sucursal::where('id', $id)->first();

                $sheet->appendRow(array('Reporte de actividad a:',$carbon, $sucursal->nombre));

                $horas_tramites = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                    ->where('id_sucursal',$id)
                    ->where('estado',1)
                    ->where('subasunto','Tramites')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();

                $horas_aclaraciones = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                    ->where('id_sucursal',$id)
                    ->where('estado',1)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();    

                $horas_pagos = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                    ->where('id_sucursal',$id)
                    ->where('estado',1)
                    ->where('subasunto','Pago')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();  

                
                $sheet->appendRow(array('Tramites','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_tramites as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }

                $sheet->appendRow(array('','',''));
                $sheet->appendRow(array('Aclaraciones','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_aclaraciones as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }

                $sheet->appendRow(array('','',''));
                $sheet->appendRow(array('Pagos','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_pagos as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }


            });
            
        })->export('xls');
    }
    public function importar_fecha($fecha, $fecha_dos)
    {
           //dd($fecha); 

        Excel::create('Reporte de actividad de: '.$fecha.' a: '.$fecha_dos, function($excel) use($fecha, $fecha_dos) 
        {
            
            $excel->sheet('Reporte', function($sheet) use($fecha, $fecha_dos)
            {

                $atendidos = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $aclaraciones=DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();  
                
                $aclaraciones_abandonadas = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count(); 
                
                $tramites = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('subasunto','Tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $tramites_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('subasunto','Tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $pago = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('subasunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $pago_abandonado = DB::table('tikets')
                    ->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('subasunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count(); 

                //Tramites
                $contrato = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Contrato')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $contrato_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Contrato')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $convenio = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Convenio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $convenio_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Convenio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $cambio = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Cambio de nombre')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $cambio_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Cambio de nombre')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $carta = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Carta de adeudo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $carta_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Carta de adeudo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $factibilidad = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Factibilidad')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();

                $factibilidad_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Factibilidad')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $dosomas = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','2 o mas tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $dosomas_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','2 o mas tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();

                //Aclaraciones
                $alto = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Alto consumo (con y sin medidor)')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $alto_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Alto consumo (con y sin medidor)')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $reconexion = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Reconexion de servicio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $reconexion_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Reconexión de servicio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();   
                
                $error = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Error en lectura')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();     
                
                $error_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Error en lectura')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();  

                $notoma = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','No toma lectura')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();  

                $notoma_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','No toma lectura')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $noentrega = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','No entrega de recibo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();     

                $noentrega_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','No entrega de recibo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $cambiotarifa = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Cambio de tarifa')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();     
                
                $cambiodetarifa_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Cambio de tarifa')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count(); 
                
                $solicitud = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Solicitud de medidor')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();

                $solicitud_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Solicitud de medidor')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();                
                
                $otros = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Otros tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();     
                
                $otros_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Otros tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();

                //Pagos
                $pago = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count(); 

                $pago_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();

                $pago_convenio = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Pago de convenio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();     

                $pago_convenio_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Pago de convenio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();
                
                $pago_carta = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Pago carta no adeudo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();     
                
                $pago_carta_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Pago carta no adeudo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->count();                            
                
                $sheet->appendRow(array('Reporte de actividad de:',$fecha,'a:',$fecha_dos,'General'));
                $sheet->appendRow(2,array('','Atendidos','Abandonados')); 
                $sheet->appendRow(array('Turnos totales:',$atendidos, $abandonados));
                $sheet->appendRow(array('Subasunto'));
                $sheet->appendRow(array('Pago',$pago,$pago_abandonado)); 
                $sheet->appendRow(array('Tramites',$tramites,$tramites_abandonados)); 
                $sheet->appendRow(array('Aclaraciones',$aclaraciones,$aclaraciones_abandonadas)); 
                $sheet->appendRow(array('','Tramites',));
                $sheet->appendRow(array('Contrato',$contrato,$contrato_abandonado));
                $sheet->appendRow(array('Convenio',$convenio,$convenio_abandonado));
                $sheet->appendRow(array('Cambio de Nombre',$cambio,$cambio_abandonado));
                $sheet->appendRow(array('Carta de no adeudo',$carta,$carta_abandonado));
                $sheet->appendRow(array('Factibilidad de servicios',$factibilidad,$factibilidad_abandonado));
                $sheet->appendRow(array('2 o mas tramites',$dosomas,$dosomas_abandonado));
                $sheet->appendRow(array('','Aclaraciones',));
                $sheet->appendRow(array('Alto Consumo',$alto,$alto_abandonado));
                $sheet->appendRow(array('Reconexion de servicio',$reconexion,$reconexion_abandonado));
                $sheet->appendRow(array('Error de lectura',$error,$error_abandonados));
                $sheet->appendRow(array('No toma de lectura',$notoma,$notoma_abandonados));
                $sheet->appendRow(array('No entrega de recibo',$noentrega,$noentrega_abandonados));
                $sheet->appendRow(array('Cambio de tarifa',$cambiotarifa,$cambiodetarifa_abandonados));
                $sheet->appendRow(array('Solicitud de medidor',$solicitud,$solicitud_abandonados));
                $sheet->appendRow(array('Otros tramites',$otros,$otros_abandonados));
                $sheet->appendRow(array('','Pagos'));
                $sheet->appendRow(array('Recibo',$pago,$pago_abandonados));
                $sheet->appendRow(array('Convenio',$pago_convenio,$pago_convenio_abandonados));
                $sheet->appendRow(array('Carta de no adeudo',$pago_carta,$pago_carta_abandonados));
            });
            $excel->sheet('Promedio', function($sheet) use($fecha, $fecha_dos)
            {

                $promedio_tramites=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Tramites')
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                     ->first();

                $promedio_tramitesa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Tramites')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                     ->first();

                $promedio_aclaraciones=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                     ->first();

                $promedio_aclaracionesa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Aclaraciones y Otros')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                     ->first();    

                $promedio_pago=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                     ->first();

                $promedio_pagoa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Pago')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                     ->first();     

                $promedio_contrato=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Contrato')
                    ->where('estado',1)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first();

                $promedio_convenio=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Convenio')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                     ->first(); 
                    
                $promedio_cambio=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Cambio de nombre')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                     ->first(); 
                    
                    
                $promedio_carta=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Carta de adeudo')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                     ->first(); 
                    
                $promedio_factibilidad=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Factibilidad')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                     ->first(); 
                    
                $promedio_dosomas=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','2 o mas tramites')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                     ->first();

                $promedio_contrato_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Contrato')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first();

                $promedio_convenio_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Convenio')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first(); 

                $promedio_cambio_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Cambio de nombre')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first(); 

                $promedio_carta_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Carta de adeudo')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first(); 
                    
                $promedio_factibilidad_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Factibilidad')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first(); 
                    
                $promedio_dosomas_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','2 o mas tramites')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first();     

                
                
                $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
                $promedio_atendido = round(($promedio_tramitesa->tiempo + $promedio_aclaracionesa->tiempo + $promedio_pagoa->tiempo ) / 3 );    
                $sheet->appendRow(array('Reporte de actividad de:',$fecha,'a:',$fecha_dos,'General'));
                $sheet->appendRow(array('','Promedio de tiempo de espera','Promedio de tiempo de atencion'));
                $sheet->appendRow(array('Global',$promedio,$promedio_atendido));
                    
                foreach ($promedio_tramites as $p) 
                {
                    foreach ($promedio_tramitesa as $pt) 
                    {   
                        $sheet->appendRow(array('Tramites',$p,$pt));
                    }
                }
                foreach ($promedio_aclaraciones as $p) 
                {
                    foreach ($promedio_aclaracionesa as $pa) 
                    {   
                        $sheet->appendRow(array('Aclaraciones',$p,$pa));
                    }
                }
                foreach ($promedio_pago as $p) 
                {
                    foreach ($promedio_pagoa as $pa) 
                    {   
                        $sheet->appendRow(array('Pago',$p,$pa));
                    }
                }
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Tramites','Promedio de tiempo de espera','Promedio de tiempo de atencion'));

                foreach ($promedio_contrato_espera as $p) 
                {
                    foreach ($promedio_contrato as $pt) 
                    {   
                        $sheet->appendRow(array('Contrato',$p,$pt));
                    }
                }
                 foreach ($promedio_convenio_espera as $p) 
                {
                    foreach ($promedio_convenio as $pt) 
                    {   
                        $sheet->appendRow(array('Convenio',$p,$pt));
                    }
                }
                foreach ($promedio_cambio_espera as $p) 
                {
                    foreach ($promedio_cambio as $pt) 
                    {   
                        $sheet->appendRow(array('Cambio de nombre',$p,$pt));
                    }
                }
                foreach ($promedio_carta_espera as $p) 
                {
                    foreach ($promedio_carta as $pt) 
                    {   
                        $sheet->appendRow(array('Carta de no adeudo',$p,$pt));
                    }
                }
                foreach ($promedio_factibilidad_espera as $p) 
                {
                    foreach ($promedio_factibilidad as $pt) 
                    {   
                        $sheet->appendRow(array('Factibilidad de servicio',$p,$pt));
                    }
                }
                foreach ($promedio_dosomas_espera as $p) 
                {
                    foreach ($promedio_dosomas as $pt) 
                    {   
                        $sheet->appendRow(array('2 o mas tramites',$p,$pt));
                    }
                }
            });
            $excel->sheet('Horas', function($sheet) use($fecha, $fecha_dos)
            {

                $sheet->appendRow(array('Reporte de actividad de:',$fecha,'a:',$fecha_dos,'General'));

                $horas_tramites = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                    ->where('estado',1)
                    ->where('subasunto','Tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();

                $horas_aclaraciones = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                     ->where('estado',1)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();    

                $horas_pagos = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                     ->where('estado',1)
                    ->where('subasunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();  

                
                $sheet->appendRow(array('Tramites','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_tramites as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }

                $sheet->appendRow(array('','',''));
                $sheet->appendRow(array('Aclaraciones','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_aclaraciones as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }

                $sheet->appendRow(array('','',''));
                $sheet->appendRow(array('Pagos','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_pagos as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }
            });
            
            
        })->export('xls');

    }
    public function importar_sucursal_fecha($id, $fecha, $fecha_dos)
    {

        //dd($fecha, $fecha_dos);
        //dd('entrando '.$fecha.' - '.$id);
        $sucursal = Sucursal::where('id', $id)->first();

    Excel::create('Reporte de actividad de:'.$fecha.'a:'.$fecha_dos.'Sucursal: '.$sucursal->nombre,function($excel) use($fecha,$fecha_dos,$id)
        {
            
            $excel->sheet('Reporte', function($sheet) use($fecha,$fecha_dos, $id)
            {
                $sucursal = Sucursal::where('id', $id)->first();
                
                $atendidos = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $aclaraciones=DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();  
                
                $aclaraciones_abandonadas = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count(); 
                
                $tramites = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('subasunto','Trámites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $tramites_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('subasunto','Tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $pago = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('subasunto','Pago')
                    ->whereDate('created_at','=',$fecha)
                    ->where('id_sucursal',$id)
                    ->count();

                $pago_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('subasunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count(); 

                //Tramites
                $contrato = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Contrato')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $contrato_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Contrato')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $convenio = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Convenio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                $convenio_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Convenio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $cambio = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Cambio de nombre')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
               
                $cambio_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Cambio de nombre')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $carta = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Carta de adeudo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                $carta_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Carta de adeudo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                $factibilidad = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Factibilidad')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                $factibilidad_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Factibilidad')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                $dosomas = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','2 ó más trámites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                $dosomas_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','2 ó más trámites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                //Aclaraciones
                $alto = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Alto consumo (con y sin medidor)')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                $alto_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Alto consumo (con y sin medidor)')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                $reconexion = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Reconexion de servicio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                $reconexion_abandonado = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Reconexión de servicio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();   
                
                $error = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Error en lectura')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();     
                
                $error_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Error en lectura')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();  
                
                $notoma = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','No toma lectura')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();     
                
                $notoma_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','No toma lectura')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $noentrega = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','No entrega de recibo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();   

                $noentrega_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','No entrega de recibo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $cambiotarifa = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Cambio de tarifa')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count(); 

                $cambiodetarifa_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Cambio de tarifa')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count(); 

                $solicitud = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Solicitud de medidor')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();     
                
                $solicitud_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Solicitud de medidor')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();                
                
                $otros = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Otros tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();     
                
                $otros_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Otros tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();

                //Pagos
                $pago = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();     
                
                $pago_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $pago_convenio = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Pago de convenio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();     
                
                $pago_convenio_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Pago de convenio')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();
                
                $pago_carta = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',1)
                    ->where('asunto','Pago carta no adeudo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();     
                
                $pago_carta_abandonados = DB::table('tikets')->select(DB::raw('*'))
                    ->where('estado',2)
                    ->where('asunto','Pago carta no adeudo')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->count();                            
                
                $sheet->appendRow(array('Reporte de actividad de:',$fecha,'a:',$fecha_dos, $sucursal->nombre));
                $sheet->appendRow(2,array('','Atendidos','Abandonados')); 
                $sheet->appendRow(array('Turnos totales:',$atendidos, $abandonados));
                $sheet->appendRow(array('Subasunto'));
                $sheet->appendRow(array('Pago',$pago,$pago_abandonado)); 
                $sheet->appendRow(array('Tramites',$tramites,$tramites_abandonados)); 
                $sheet->appendRow(array('Aclaraciones',$aclaraciones,$aclaraciones_abandonadas)); 
                $sheet->appendRow(array('','Tramites',));
                $sheet->appendRow(array('Contrato',$contrato,$contrato_abandonado));
                $sheet->appendRow(array('Convenio',$convenio,$convenio_abandonado));
                $sheet->appendRow(array('Cambio de Nombre',$cambio,$cambio_abandonado));
                $sheet->appendRow(array('Carta de no adeudo',$carta,$carta_abandonado));
                $sheet->appendRow(array('Factibilidad de servicios',$factibilidad,$factibilidad_abandonado));
                $sheet->appendRow(array('2 o mas tramites',$dosomas,$dosomas_abandonado));
                $sheet->appendRow(array('','Aclaraciones',));
                $sheet->appendRow(array('Alto Consumo',$alto,$alto_abandonado));
                $sheet->appendRow(array('Reconexion de servicio',$reconexion,$reconexion_abandonado));
                $sheet->appendRow(array('Error de lectura',$error,$error_abandonados));
                $sheet->appendRow(array('No toma de lectura',$notoma,$notoma_abandonados));
                $sheet->appendRow(array('No entrega de recibo',$noentrega,$noentrega_abandonados));
                $sheet->appendRow(array('Cambio de tarifa',$cambiotarifa,$cambiodetarifa_abandonados));
                $sheet->appendRow(array('Solicitud de medidor',$solicitud,$solicitud_abandonados));
                $sheet->appendRow(array('Otros tramites',$otros,$otros_abandonados));
                $sheet->appendRow(array('','Pagos'));
                $sheet->appendRow(array('Recibo',$pago,$pago_abandonados));
                $sheet->appendRow(array('Convenio',$pago_convenio,$pago_convenio_abandonados));
                $sheet->appendRow(array('Carta de no adeudo',$pago_carta,$pago_carta_abandonados));
            });
            $excel->sheet('Promedio', function($sheet) use($id, $fecha, $fecha_dos) 
            {
                $sucursal = Sucursal::where('id', $id)->first();

                $promedio_tramites=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal', $id)
                    ->first();

                $promedio_tramitesa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Tramites')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal', $id)
                    ->first();

                $promedio_aclaraciones=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal', $id)
                    ->first();

                $promedio_aclaracionesa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Aclaraciones y Otros')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal', $id)
                    ->first();    

                $promedio_pago=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('subasunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal', $id)
                    ->first();

                $promedio_pagoa=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('subasunto','Pago')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal', $id)
                    ->first();     

                $promedio_contrato=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Contrato')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal', $id)
                    ->first();

                $promedio_convenio=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Convenio')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)            
                    ->first(); 
                    
                $promedio_cambio=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Cambio de nombre')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)            
                    ->first(); 
                    
                    
                $promedio_carta=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Carta de adeudo')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)            
                    ->first(); 
                    
                $promedio_factibilidad=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','Factibilidad')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)            
                    ->first(); 
                    
                $promedio_dosomas=DB::table('tikets')
                    ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo')
                    ->where('asunto','2 o mas tramites')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)            
                    ->first();

                $promedio_contrato_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Contrato')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first();

                $promedio_convenio_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Convenio')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first(); 

                $promedio_cambio_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Cambio de nombre')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first(); 

                $promedio_carta_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Carta de adeudo')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw('Date(tikets.created_at) = CURDATE()')
                    ->first(); 
                    
                $promedio_factibilidad_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','Factibilidad')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first(); 
                    
                $promedio_dosomas_espera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo')
                    ->where('asunto','2 o mas tramites')
                    ->where('estado',1)
                    ->where('id_sucursal',$id)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->first();     

                 $promedio_tramites_cajera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo_atencion, fk_caja as caja')
                    ->where('subasunto','Trámites')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->groupBy('caja')
                    ->get();

                $promedio_aclaraciones_cajera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo_atencion, fk_caja as caja')
                    ->where('subasunto','Aclaraciones y Otros')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->groupBy('caja')
                    ->get();
                
                $promedio_pago_cajera=DB::table('tikets')
                    ->selectRaw(' CAST(AVG( timestampdiff(SECOND, llegada, atendido ) ) / 60  as TIME) AS tiempo, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS tiempo_atencion, fk_caja as caja')
                    ->where('subasunto','Pago')
                    ->where('estado',1)
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('id_sucursal',$id)
                    ->groupBy('caja')
                    ->get();    
                    //dd($promedio_pago_cajera);
                
                $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
                $promedio_atendido = round(($promedio_tramitesa->tiempo + $promedio_aclaracionesa->tiempo + $promedio_pagoa->tiempo ) / 3 );    
                $sheet->appendRow(array('Reporte de actividad de:',$fecha,'a:',$fecha_dos, $sucursal->nombre));
                $sheet->appendRow(array('','Promedio de tiempo de espera','Promedio de tiempo de atencion'));
                $sheet->appendRow(array('Global',$promedio,$promedio_atendido));
                    
                foreach ($promedio_tramites as $p) 
                {
                    foreach ($promedio_tramitesa as $pt) 
                    {   
                        $sheet->appendRow(array('Tramites',$p,$pt));
                    }
                }
                foreach ($promedio_aclaraciones as $p) 
                {
                    foreach ($promedio_aclaracionesa as $pa) 
                    {   
                        $sheet->appendRow(array('Aclaraciones',$p,$pa));
                    }
                }
                foreach ($promedio_pago as $p) 
                {
                    foreach ($promedio_pagoa as $pa) 
                    {   
                        $sheet->appendRow(array('Pago',$p,$pa));
                    }
                }
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Tramites','Promedio de tiempo de espera','Promedio de tiempo de atencion'));

                foreach ($promedio_contrato_espera as $p) 
                {
                    foreach ($promedio_contrato as $pt) 
                    {   
                        $sheet->appendRow(array('Contrato',$p,$pt));
                    }
                }
                 foreach ($promedio_convenio_espera as $p) 
                {
                    foreach ($promedio_convenio as $pt) 
                    {   
                        $sheet->appendRow(array('Convenio',$p,$pt));
                    }
                }
                foreach ($promedio_cambio_espera as $p) 
                {
                    foreach ($promedio_cambio as $pt) 
                    {   
                        $sheet->appendRow(array('Cambio de nombre',$p,$pt));
                    }
                }
                foreach ($promedio_carta_espera as $p) 
                {
                    foreach ($promedio_carta as $pt) 
                    {   
                        $sheet->appendRow(array('Carta de no adeudo',$p,$pt));
                    }
                }
                foreach ($promedio_factibilidad_espera as $p) 
                {
                    foreach ($promedio_factibilidad as $pt) 
                    {   
                        $sheet->appendRow(array('Factibilidad de servicio',$p,$pt));
                    }
                }
                foreach ($promedio_dosomas_espera as $p) 
                {
                    foreach ($promedio_dosomas as $pt) 
                    {   
                        $sheet->appendRow(array('2 o mas tramites',$p,$pt));
                    }
                }
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio Tramites por agentes'));
                $sheet->appendRow(array('Ventanilla','Promedio de tiempo de espera','Promedio de tiempo de atencion'));

                foreach ($promedio_tramites_cajera as $p) 
                {
                    $sheet->appendRow(array( $p->caja, $p->tiempo, $p->tiempo_atencion ));
                }

                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio Aclaraciones por agentes'));
                $sheet->appendRow(array('Ventanilla','Promedio de tiempo de espera','Promedio de tiempo de atencion'));

                foreach ($promedio_aclaraciones_cajera as $p) 
                {
                    $sheet->appendRow(array( $p->caja, $p->tiempo, $p->tiempo_atencion ));
                }
                
                $sheet->appendRow(array('','  ',''));
                $sheet->appendRow(array('Promedio Pagos por agentes'));
                $sheet->appendRow(array('Ventanilla','Promedio de tiempo de espera','Promedio de tiempo de atencion'));
                
                foreach ($promedio_pago_cajera as $p) 
                {
                    $sheet->appendRow(array( $p->caja, $p->tiempo, $p->tiempo_atencion ));
                }

            });
            $excel->sheet('Agentes', function($sheet) use($id, $fecha, $fecha_dos)
            {
                 $sucursal = Sucursal::where('id', $id)->first();

                $cajas = DB::table('tikets')
                    ->selectRaw('count(turno) as numero, subasunto, fk_caja as caja')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('estado',1)
                    ->groupBy('caja')
                    ->groupBy('subasunto')
                    ->get();

                $cajas_tramites = DB::table('tikets')
                    ->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
                    ->where("id_sucursal",$id)
                    ->where('subasunto','Tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('estado',1)
                    ->groupBy('caja')
                    ->groupBy('subasunto')
                    ->get();
                    //dd($cajas_tramites);
        
                $cajas_pago=DB::table('tikets')
                    ->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
                    ->where("id_sucursal",$id)
                    ->where('subasunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('estado',1)
                    ->groupBy('caja')
                    ->groupBy('subasunto')
                    ->get();
        
                $cajas_aclaraciones=DB::table('tikets')
                    ->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
                    ->where("id_sucursal",$id)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->where('estado',1)
                    ->groupBy('caja')
                    ->groupBy('subasunto')
                    ->get();
                                    
                    $sheet->appendRow(array('Reporte de actividad de:',$fecha,'a:',$fecha_dos, $sucursal->nombre));
                    $sheet->appendRow(array('Ventanilla','Subasunto','Numero'));
                    foreach ($cajas as $c) 
                    {
                        $sheet->appendRow(array($c->caja, $c->subasunto, $c->numero));
                    }

                    $sheet->appendRow(array('','  ',''));
                    $sheet->appendRow(array('Ventanilla','Tramites','Numero'));
                    foreach ($cajas_tramites as $c) 
                    {
                        $sheet->appendRow(array($c->caja, $c->asunto, $c->numero));
                    }
                    
                    $sheet->appendRow(array('','  ',''));
                    $sheet->appendRow(array('Ventanilla','Aclaraciones','Numero'));
                    foreach ($cajas_aclaraciones as $c) 
                    {
                        $sheet->appendRow(array($c->caja, $c->asunto, $c->numero));
                    }

                    $sheet->appendRow(array('','  ',''));
                    $sheet->appendRow(array('Ventanilla','Pagos','Numero'));
                    
                    foreach ($cajas_pago as $c) 
                    {
                        $sheet->appendRow(array($c->caja, $c->asunto, $c->numero));
                    }
            });
            $excel->sheet('Horas', function($sheet) use($id, $fecha, $fecha_dos)
            {
                $sucursal = Sucursal::where('id', $id)->first();

                $sheet->appendRow(array('Reporte de actividad de:',$fecha,'a:',$fecha_dos, $sucursal->nombre));

                $horas_tramites = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                    ->where('id_sucursal',$id)
                    ->where('estado',1)
                    ->where('subasunto','Tramites')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();

                $horas_aclaraciones = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                    ->where('id_sucursal',$id)
                    ->where('estado',1)
                    ->where('subasunto','Aclaraciones y Otros')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();    

                $horas_pagos = DB::table('tikets')
                    ->selectRaw('HOUR(created_at) as hora, COUNT(turno) as numero')
                    ->where('id_sucursal',$id)
                    ->where('estado',1)
                    ->where('subasunto','Pago')
                    ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
                    ->groupBy('hora')
                    ->orderBy('hora','ASC')  
                    ->get();  

                
                $sheet->appendRow(array('Tramites','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_tramites as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }

                $sheet->appendRow(array('','',''));
                $sheet->appendRow(array('Aclaraciones','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_aclaraciones as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }

                $sheet->appendRow(array('','',''));
                $sheet->appendRow(array('Pagos','',''));
                $sheet->appendRow(array('Hora','Numero'));
                
                foreach ($horas_pagos as $h) 
                {
                    $sheet->appendRow(array($h->hora, $h->numero));

                }


            });
            
        })->export('xls');
    }
}