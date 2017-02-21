<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
use DB;
use Carbon\Carbon;


class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        //$this->middleware('auth');
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

                $promedio=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
                $promedio_atendido=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
                
                $promedio_tramites=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Trámites')->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

                $promedio_tramitesa=DB::table('tikets')
                ->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')->where('subasunto','Trámites')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

                $promedio_aclaraciones=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

                $promedio_aclaracionesa=DB::table('tikets')
                    ->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')->where('subasunto','Aclaraciones y Otros')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();    

                $promedio_pago=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

                $promedio_pagoa=DB::table('tikets')
                    ->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
                    ->where('subasunto','Pago')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();     

                $sheet->appendRow(array('Reporte de actividad a:',$carbon));
                $sheet->appendRow(array('','Promedio de tiempo de espera','Promedio de tiempo de atencion'));
                foreach ($promedio as $p) 
                {
                    foreach ($promedio_atendido as $pa) 
                    {   
                        $sheet->appendRow(array('Global',$p,$pa));
                    }
                }
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


            });
            
        })->export('xls');
    }
}
