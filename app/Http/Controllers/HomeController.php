<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Tiket; 
use App\User;
use App\Sucursal;
use App\Role;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
        Carbon::setLocale('es');

    }
    public function index()
    {
        //$tiket = DB::table('tikets')->selectRaw('asunto, count(asunto) as cantidad')->groupBy('asunto')->get();        
        $sucursal = Sucursal::all();
        return view('home.index',compact('sucursal'));
    }
    //api
    public function mostrar()
    {
        $turno=Tiket::where('estado', 0)->first();
        return [$turno];
    }
    public function mostrar_pagos($id)
    {
        $turno=Tiket::where('estado', 0)->where('subasunto','Pago')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        //dd($turno);
        return [$turno];
    }
    public function mostrar_aclaraciones($id)
    {
        $turno=Tiket::where('estado', 0)->whereRaw("(subasunto = 'Aclaraciones y Otros' or subasunto = 'Tramites')")
            ->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        return [$turno];
    }
    public function update(Request $request, $id)
    {
        $caja=caja::find($id);
        $caja->update($request->all());
        return response()->json(['status'=>'ok','data'=>$caja], 200);
    }
    public function sucursal($id)
    {
        $carbon =  Carbon::today()->format('d-m-Y');
        $atendidos = DB::table('tikets')->select(DB::raw('*'))
            ->where('estado',1)->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $espera = DB::table('tikets')->select(DB::raw('*'))->where('estado',0)->whereRaw('Date(created_at) = CURDATE()')
            ->where('id_sucursal',$id)->count();
        $abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)->where('id_sucursal',$id)
            ->whereRaw('Date(created_at) = CURDATE()')->count();

        $aclaraciones=DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(created_at) = CURDATE()')
                ->where('id_sucursal',$id)->count();  
        $aclaraciones_abandonadas = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('id_sucursal',$id)->where('subasunto','Aclaraciones y Otros')
                ->whereRaw('Date(created_at) = CURDATE()')->count();
        $tramites = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('subasunto','Trámites')->where('id_sucursal',$id)->whereRaw('Date(created_at) = CURDATE()')->count();
        $tramites_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('subasunto','Trámites')->where('id_sucursal',$id)->whereRaw('Date(created_at) = CURDATE()')->count();
        $pago = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('subasunto','Pago')->where('id_sucursal',$id)->whereRaw('Date(created_at) = CURDATE()')->count();
        $pago_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('subasunto','Pago')->where('id_sucursal',$id)->whereRaw('Date(created_at) = CURDATE()')->count();     
        
        //Tramites
        $contrato = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Contrato')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $contrato_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Contrato')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Convenio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $convenio_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Convenio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $cambio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Cambio de nombre')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $cambio_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Cambio de nombre')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Carta de adeudo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $carta_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)->where('id_sucursal',$id)
            ->where('asunto','Carta de adeudo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $factibilidad = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Factibilidad')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $factibilidad_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Factibilidad')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $dosomas = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','2 ó más trámites')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $dosomas_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','2 ó más trámites')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();

        //Aclaraciones
        $alto = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Alto consumo (con y sin medidor)')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $alto_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Alto consumo (con y sin medidor)')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $reconexion = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Reconexión de servicio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $reconexion_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Reconexión de servicio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();   
        $error = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Error en lectura')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();     
        $error_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Error en lectura')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();  
        $notoma = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','No toma lectura')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();     
        $notoma_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','No toma lectura')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $noentrega = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','No entrega de recibo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();     
        $noentrega_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','No entrega de recibo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $cambiotarifa = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Cambio de tarifa')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();     
        $cambiodetarifa_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Cambio de tarifa')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count(); 
        $solicitud = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Solicitud de medidor')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();     
        $solicitud_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Solicitud de medidor')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();                
        $otros = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Otros trámites')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();     
        $otros_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Otros trámites')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();   

        //Pagos
        $pago_recibo = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();     
        $pago_recibo_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('id_sucursal',$id)->where('estado',2)
            ->where('asunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $pago_convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago de convenio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();     
        $pago_convenio_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago de convenio')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();
        $pago_carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago carta no adeudo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();     
        $pago_carta_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago carta no adeudo')->whereRaw('Date(created_at) = CURDATE()')->where('id_sucursal',$id)->count();

        //promedios
       $promedio_tramites=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->first(); 
        
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->first();    
        
        $promedio_pago=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->first(); 


        $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
    
        $promedio_tramitesa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->where('id_sucursal',$id)
            ->first();
        
        $promedio_aclaracionesa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->where('id_sucursal',$id)
            ->first();
        
        $promedio_pagoa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->where('id_sucursal',$id)
            ->first();

        $promedio_atendido = round(($promedio_tramitesa->tiempo + $promedio_aclaracionesa->tiempo + $promedio_pagoa->tiempo ) / 3 );        
        
        $sucursal = Sucursal::where('id', $id)->first();

        $cajas=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.fk_caja')
            ->where("tikets.id_sucursal",$id)->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('tikets.fk_caja')->get();


        $cajas_tramites = DB::table('tikets')->selectRaw('count(turno) as numero, subasunto, fk_caja as caja')
            ->where("id_sucursal",$id)->where('subasunto','Tramites')->whereRaw('Date(tikets.created_at) = CURDATE()')->where('estado',1)
            ->groupBy('caja')->groupBy('subasunto')->get();
        $cajas_pago=DB::table('tikets')->selectRaw('count(turno) as numero, subasunto, fk_caja as caja')
            ->where("id_sucursal",$id)->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')->where('estado',1)
            ->groupBy('caja')->groupBy('subasunto')->get();
        $cajas_aclaraciones=DB::table('tikets')->selectRaw('count(turno) as numero, subasunto, fk_caja as caja')
            ->where("id_sucursal",$id)->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('estado',1)
            ->groupBy('caja')->groupBy('subasunto')->get();
        //Asuntos mes
        $pagos_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, subasunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->groupBy('mes')
            ->groupBy('subasunto')
            ->get();

        $aclaraciones_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, subasunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
             ->groupBy('mes')
            ->groupBy('subasunto')
            ->get();

        $tramites_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, subasunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->groupBy('mes')
            ->groupBy('subasunto')
            ->get();

        //Tramites por mes   
         $contrato_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','Contrato')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $convenio_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','Convenio')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
            
        $cambio_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','Cambio de nombre')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $carta_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','Carta de adeudo')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $factibilidad_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','Factibilidad')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $dosomas_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','2 o mas tramites')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

         //aclaraciones mes 
         $alto_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

         
        $reconexion_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Reconexion de servicio')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $error_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Error en lectura')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $notoma_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','No toma lectura')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $noentrega_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','No entrega de recibo')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $cambiotarifa_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Cambio de tarifa')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $solicitud_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Solicitud de medidor')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $otro_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Otros tramites')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();     
        
        //Pagos por mes    
        $pago_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->where('asunto','Pago')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $pago_mes_convenio = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->where('asunto','Pago de convenio')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $pago_mes_carta = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->where('asunto','Pago carta no adeudo')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();    

        $promedio_mes=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();
        
        $promedio_tramites_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();

         //dd($promedio_tramites_mes);   
        
        $promedio_aclaraciones_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();
        
        $promedio_pago_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();

            //dd($promedio_pago_mes);      
        
        $promedio_atendido_mes=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();

        //dd($promedio_atendido_mes);

        
        $promedio_tramitesa_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Trámites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('mes')
            ->get();


        $promedio_aclaracionesa_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('mes')
            ->get();
        
        $promedio_pagoa_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('mes')
            ->get();

        $promedio_cajera = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $promedio_tramites_cajera = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')        
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $promedio_aclaraciones_cajera = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $promedio_pago_cajera = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        //dd($promedio_cajera);
        $promedio_atendido_cajera = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('fin', '<>', '00:00:00')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $promedio_tramitesa_cajera = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where('fin', '<>', '00:00:00')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $promedio_aclaracionesa_cajera = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where('fin', '<>', '00:00:00')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $promedio_pagoa_cajera = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Pago')
                 ->where('fin', '<>', '00:00:00')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $suma_promedio_cajera = DB::table('tikets')
            ->selectRaw('SUM(TIME_TO_SEC(tiempo)) as tiempo, fk_caja as caja')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();

        //Promedio tramites    
        $promedio_contrato=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")
            ->first();

        $promedio_convenio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")            
            ->first(); 
            
        $promedio_cambio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")          
            ->first(); 
            
            
        $promedio_carta=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")          
            ->first();


        $promedio_factibilidad=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")            
            ->first(); 
        
        $promedio_dosomas=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")            
            ->first();                  


        $promedio_contrato_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();


        $promedio_convenio_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 


        $promedio_cambio_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 

        $promedio_carta_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_factibilidad_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            



        $promedio_dosomas_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        //Promedio espera aclaraciones
        $promedio_alto_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_reconexion_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Reconexion de servicio')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_error_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Error en lectura')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_notoma_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','No toma lectura')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_noentrega_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','No entrega de recibo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_cambiotarifa_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Cambio de tarifa')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_solicitud_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Solicitud de medidor')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        $promedio_otros_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Otros tramites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

         //aclaraciones tiempo de atencion
         $promedio_alto=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")          
            ->first(); 
        
        $promedio_reconexion=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Reconexion de servicio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)            
            ->first(); 
        
        $promedio_error=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Error en lectura')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")          
            ->first(); 
        
        $promedio_notoma=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','No toma lectura')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")            
            ->first(); 
        
        $promedio_noentega=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','No entrega de recibo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)            
            ->first(); 
        
        $promedio_cambiotarifa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Cambio de tarifa')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")           
            ->first(); 
        
        $promedio_solicitud=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Solicitud de medidor')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")           
            ->first(); 

        $promedio_otros=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Otros tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")            
            ->first();

        //Promedio espera pago
        $promedio_pago_espera=DB::table('tikets')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();


        $promedio_pago_convenio_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago de convenio')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        
        $promedio_pago_carta_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago carta no adeudo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        //dd($promedio_pago_carta_espera);
   

        //pago tiempo de atencion
         $promedio_pagos=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")           
            ->first(); 
        
        $promedio_pago_convenio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago de convenio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")       
            ->first(); 
        
        $promedio_pago_carta=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago carta no adeudo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")            
            ->first();         

        //Tramites por cajas
        
        $caja_contrato = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Contrato')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        //dd($caja_contrato);

        $caja_convenio = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Convenio')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();
            
        $caja_cambio = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de nombre')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        //dd($caja_cambio);
         
        $caja_carta = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Carta de adeudo')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();


        $caja_factibilidad = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Factibilidad')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();


        $caja_dosomas = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','2 o mas tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();
        


        //aclaraciones por caja
        $caja_alto = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Alto consumo (con y sin medidor)')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_reconexion = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Reconexion de servicio')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_error = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Error en lectura')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_notoma = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No toma lectura')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_noentrega = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No entrega de recibo')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_cambiotarifa = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de tarifa')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_solicitud = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de medidor')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_otros = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Otros tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        //Pagos por caja
        $caja_recivo = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_pago_carta = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago carta no adeudo')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_pago_convenio = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago de convenio')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        
            

        $cajas_promedio = DB::table('tikets')
            ->selectRaw('CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS numero, fk_caja as caja')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('caja')
            ->get();  

        return view('home.sucursal',compact('promedio_pagos','caja_recivo','caja_pago_carta','caja_pago_convenio','caja_otros','caja_solicitud','caja_cambiotarifa','caja_noentrega','caja_notoma','caja_error','caja_reconexion','caja_alto','caja_dosomas','caja_factibilidad','caja_carta','caja_cambio','caja_convenio','caja_contrato','alto_mes','reconexion_mes','error_mes','notoma_mes','noentrega_mes','cambiotarifa_mes','solicitud_mes','otro_mes','contrato_mes','convenio_mes','cambio_mes','carta_mes','factibilidad_mes','dosomas_mes','promedio_pago_carta','promedio_pago_convenio','promedio_pago','promedio_pago_espera','promedio_pago_convenio_espera','promedio_pago_carta_espera','promedio_alto','promedio_reconexion','promedio_error','promedio_notoma','promedio_noentega','promedio_cambiotarifa','promedio_solicitud','promedio_otros','promedio_otros_espera','promedio_solicitud_espera','promedio_cambiotarifa_espera','promedio_noentrega_espera','promedio_notoma_espera','promedio_error_espera','promedio_reconexion_espera','promedio_alto_espera','suma_promedio_cajera','pago_mes_carta','pago_mes_convenio','cajas_promedio','promedio_contrato_espera','promedio_convenio_espera','promedio_cambio_espera','promedio_carta_espera','promedio_factibilidad_espera','promedio_dosomas_espera','promedio_contrato','promedio_convenio','promedio_cambio','promedio_carta','promedio_factibilidad','promedio_dosomas','cajas_pago_sub','cajas_aclaraciones_sub','cajas_tramites_sub','promedio_atendido_cajera','promedio_tramitesa_cajera','promedio_aclaracionesa_cajera','promedio_pagoa_cajera','promedio_cajera','promedio_tramites_cajera','promedio_aclaraciones_cajera','promedio_pago_cajera','promedio_pagoa_mes','promedio_aclaracionesa_mes','promedio_tramitesa_mes','promedio_atendido_mes','promedio_pago_mes','promedio_aclaraciones_mes','promedio_tramites_mes','promedio_mes','pago_mes','aclaraciones_mes','tramites_mes','pagos_mes','asunto_mes','cajas_tramites','cajas_aclaraciones','cajas_pago','sucursal','carbon','atendidos','espera','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cajas','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados','sucursal'));
    }
    public function general()
    {
        $carbon =  Carbon::today()->format('d-m-Y');
        $atendidos = DB::table('tikets')->select(DB::raw('*'))
            ->where('estado',1)->whereRaw('Date(created_at) = CURDATE()')->count();
        $espera = DB::table('tikets')->select(DB::raw('*'))->where('estado',0)->whereRaw('Date(created_at) = CURDATE()')->count();
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
        $pago_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('subasunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->count();     
        
        //Tramites
        $contrato = DB::table('tikets')
            ->select(DB::raw('*'))
            ->where('estado',1)
            ->where('asunto','Contrato')
            ->whereRaw('Date(created_at) = CURDATE()')
            ->count();
        
        $contrato_abandonado = DB::table('tikets')
            ->select(DB::raw('*'))
            ->where('estado',2)
            ->where('asunto','Contrato')
            ->whereRaw('Date(created_at) = CURDATE()')
            ->count();
        
        $convenio = DB::table('tikets')
            ->select(DB::raw('*'))
            ->where('estado',1)
            ->where('asunto','Convenio')
            ->whereRaw('Date(created_at) = CURDATE()')
            ->count();
        
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
        $pago_recibo = DB::table('tikets')
            ->select(DB::raw('*'))
            ->where('estado',1)
            ->where('asunto','Pago')
            ->whereRaw('Date(created_at) = CURDATE()')
            ->count();     
        
        $pago_recibo_abandonados = DB::table('tikets')
            ->select(DB::raw('*'))
            ->where('estado',2)
            ->where('asunto','Pago')
            ->whereRaw('Date(created_at) = CURDATE()')
            ->count();
        
        $pago_convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago de convenio')->whereRaw('Date(created_at) = CURDATE()')->count();     
        $pago_convenio_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago de convenio')->whereRaw('Date(created_at) = CURDATE()')->count();
        $pago_carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago carta no adeudo')->whereRaw('Date(created_at) = CURDATE()')->count();     
        $pago_carta_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago carta no adeudo')->whereRaw('Date(created_at) = CURDATE()')->count();

        //promedios
        $promedio_tramites=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
        
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();    
        
        $promedio_pago=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
        
        $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
    

        $promedio_tramitesa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Trámites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first();
        
        $promedio_aclaracionesa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first();
        
        $promedio_pagoa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first();        
    
        $promedio_atendido =round(($promedio_tramitesa->tiempo + $promedio_aclaracionesa->tiempo + $promedio_pagoa->tiempo ) / 3 );


        $promedio_mes=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo, MONTH(created_at) as mes')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();

        $promedio_tramites_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();
        
        $promedio_aclaraciones_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();
        
        $promedio_pago_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();      
        

        $promedio_atendido_mes=DB::table('tikets')
            ->selectRaw('id, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, MONTH(created_at) as mes')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();

        //dd($promedio_atendido_mes);
 
        $promedio_tramitesa_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('mes')
            ->get();
        
        $promedio_aclaracionesa_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('mes')
            ->get();
        
        $promedio_pagoa_mes=DB::table('tikets')
            ->selectRaw('Count(turno) as numero, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('mes')
            ->get();

        $promedio_contrato=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first();

        $promedio_convenio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
            
        $promedio_cambio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
            
        $promedio_carta=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
            
        $promedio_factibilidad=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
            
        $promedio_dosomas=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first();     

        
        $promedio_contrato_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        $promedio_convenio_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 

        $promedio_cambio_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 

        $promedio_carta_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_factibilidad_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_dosomas_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        //Promedio espera aclaraciones
        $promedio_alto_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_reconexion_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Reconexion de servicio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_error_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Error en lectura')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_notoma_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','No toma lectura')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_noentrega_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','No entrega de recibo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_cambiotarifa_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Cambio de tarifa')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_solicitud_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Solicitud de medidor')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        $promedio_otros_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Otros tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

         //aclaraciones tiempo de atencion
         $promedio_alto=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_reconexion=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Reconexion de servicio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_error=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Error en lectura')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_notoma=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','No toma lectura')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_noentega=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','No entrega de recibo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
        
        $promedio_cambiotarifa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Cambio de tarifa')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_solicitud=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Solicitud de medidor')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 

        $promedio_otros=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Otros tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first();

        //Promedio espera pago
        $promedio_pago_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_pago_convenio_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago de convenio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_pago_carta_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago carta no adeudo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        //pago tiempo de atencion
         $promedio_pago_recibo=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_pago_convenio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago de convenio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_pago_carta=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago carta no adeudo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 


        //Asuntos mes

        $pagos_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, subasunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->groupBy('mes')
            ->groupBy('subasunto')
            ->get();

        $aclaraciones_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, subasunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
             ->groupBy('mes')
            ->groupBy('subasunto')
            ->get();

        $tramites_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, subasunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->groupBy('mes')
            ->groupBy('subasunto')
            ->get();

        //Tramites por mes   
         $contrato_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','Contrato')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $convenio_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','Convenio')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
            
        $cambio_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','Cambio de nombre')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $carta_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','Carta de adeudo')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $factibilidad_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','Factibilidad')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $dosomas_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('asunto','2 o mas tramites')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

         //aclaraciones mes 
         $alto_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

         
        $reconexion_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Reconexion de servicio')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $error_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Error en lectura')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $notoma_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','No toma lectura')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $noentrega_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','No entrega de recibo')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $cambiotarifa_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Cambio de tarifa')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();
        
        $solicitud_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Solicitud de medidor')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $otro_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('asunto','Otros tramites')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();     
        
        //Pagos por mes    
        $pago_mes = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->where('asunto','Pago')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();


        $pago_mes_convenio = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->where('asunto','Pago de convenio')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();

        $pago_mes_carta = DB::table('tikets')
            ->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->where('asunto','Pago carta no adeudo')
            ->groupBy('mes')
            ->groupBy('asunto')
            ->get();    

        return view('home.general',compact('promedio_pago_recibo','pagos_mes','alto_mes','reconexion_mes','error_mes','notoma_mes','noentrega_mes','cambiotarifa_mes','solicitud_mes','otro_mes','contrato_mes','convenio_mes','cambio_mes','carta_mes','factibilidad_mes','dosomas_mes','promedio_pago_carta','promedio_pago_convenio','promedio_pago','promedio_pago_espera','promedio_pago_convenio_espera','promedio_pago_carta_espera','promedio_alto','promedio_reconexion','promedio_error','promedio_notoma','promedio_noentega','promedio_cambiotarifa','promedio_solicitud','promedio_otros','promedio_otros_espera','promedio_solicitud_espera','promedio_cambiotarifa_espera','promedio_noentrega_espera','promedio_notoma_espera','promedio_error_espera','promedio_reconexion_espera','promedio_alto_espera','suma_promedio_cajera','pago_mes_carta','pago_mes_convenio','promedio_contrato_espera','promedio_convenio_espera','promedio_cambio_espera','promedio_carta_espera','promedio_factibilidad_espera','promedio_dosomas_espera','promedio_contrato','promedio_convenio','promedio_cambio','promedio_carta','promedio_factibilidad','promedio_dosomas','pago_mes','aclaraciones_mes','tramites_mes','asunto_mes','promedio_pagoa_mes','promedio_aclaracionesa_mes','promedio_tramitesa_mes','promedio_atendido_mes','promedio_pago_mes','promedio_aclaraciones_mes','promedio_tramites_mes','promedio_mes','sucursal','carbon','atendidos','espera','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados'));
    }
    public function general_fecha(Request $request)
    {
        //dd($request->all());
        $fecha = $request->fecha;
        $fecha_dos = $request->fecha_dos;
        //dd($fecha_dos);
        
        $f = Tiket::whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->first();
        //dd($f);
        //$f_dos = Tiket::whereDate('created_at','=',$fecha_dos)->first();


        $atendidos = DB::table('tikets')->select(DB::raw('*'))
            ->where('estado',1)->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $espera = DB::table('tikets')->select(DB::raw('*'))->where('estado',0)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
            
        $aclaraciones=DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();  
        
        $aclaraciones_abandonadas = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('subasunto','Aclaraciones y Otros')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $tramites = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('subasunto','Trámites')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $tramites_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('subasunto','Trámites')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $pago = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('subasunto','Pago')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $pago_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('subasunto','Pago')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();     
        
        //Tramites
        $contrato = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Contrato')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $contrato_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Contrato')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Convenio')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $convenio_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Convenio')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $cambio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Cambio de nombre')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $cambio_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Cambio de nombre')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Carta de adeudo')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $carta_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Carta de adeudo')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $factibilidad = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Factibilidad')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $factibilidad_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Factibilidad')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $dosomas = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','2 ó más trámites')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $dosomas_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','2 ó más trámites')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();

        //Aclaraciones
        $alto = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Alto consumo (con y sin medidor)')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $alto_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Alto consumo (con y sin medidor)')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $reconexion = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Reconexión de servicio')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $reconexion_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Reconexión de servicio')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();   
        $error = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Error en lectura')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();     
        $error_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Error en lectura')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();  
        $notoma = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','No toma lectura')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();     
        $notoma_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','No toma lectura')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $noentrega = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','No entrega de recibo')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();     
        $noentrega_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','No entrega de recibo')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $cambiotarifa = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Cambio de tarifa')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();     
        $cambiodetarifa_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Cambio de tarifa')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count(); 
        $solicitud = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Solicitud de medidor')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();     
        $solicitud_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Solicitud de medidor')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();                
        $otros = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Otros trámites')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();     
        $otros_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Otros trámites')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();   

        //Pagos
        $pago_recibo = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();     
        $pago_recibo_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $pago_convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago de convenio')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();     
        $pago_convenio_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago de convenio')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();
        $pago_carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago carta no adeudo')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();     
        $pago_carta_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago carta no adeudo')->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->count();


        //promedios
        $promedio_tramites=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('estado',1)
            ->where('subasunto','Trámites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_pago=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
        
        $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
        
        $promedio_tramitesa = DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first();

        
        $promedio_aclaracionesa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first();
        
        $promedio_pagoa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first();        
    

        $promedio_atendido =round(($promedio_tramitesa->tiempo + $promedio_aclaracionesa->tiempo + $promedio_pagoa->tiempo ) / 3 );


        $promedio_contrato=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first();

        $promedio_convenio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
            
        $promedio_cambio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
            

        $promedio_carta=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
            
        $promedio_factibilidad=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
            
        $promedio_dosomas=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first();

        $promedio_contrato_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_convenio_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 

        $promedio_cambio_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 

        $promedio_carta_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_factibilidad_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_dosomas_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();


        //Promedio espera aclaraciones
        $promedio_alto_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
            //dd($promedio_alto_espera);
        
        $promedio_reconexion_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Reconexion de servicio')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_error_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Error en lectura')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_notoma_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','No toma lectura')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_noentrega_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','No entrega de recibo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

            //dd($promedio_noentrega_espera);
        
        $promedio_cambiotarifa_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Cambio de tarifa')
            ->where('estado',1)
             ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_solicitud_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Solicitud de medidor')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_otros_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Otros tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        //aclaraciones tiempo de atencion
         $promedio_alto=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_reconexion=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Reconexion de servicio')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_error=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Error en lectura')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_notoma=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','No toma lectura')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_noentega=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','No entrega de recibo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_cambiotarifa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Cambio de tarifa')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_solicitud=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Solicitud de medidor')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 

        $promedio_otros=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Otros tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first();

        //Promedio espera pago
        $promedio_pago_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_pago_convenio_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago de convenio')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_pago_carta_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago carta no adeudo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        //pago tiempo de atencion
         $promedio_pago=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first();

        
        $promedio_pago_convenio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago de convenio')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
        
        $promedio_pago_carta=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago carta no adeudo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first();              

        //dd($promedio_atendido);
        return view('home.fecha',compact('promedio_pago_carta','promedio_pago_convenio','promedio_pago','promedio_pago_espera','promedio_pago_convenio_espera','promedio_pago_carta_espera','promedio_alto','promedio_reconexion','promedio_error','promedio_notoma','promedio_noentega','promedio_cambiotarifa','promedio_solicitud','promedio_otros','promedio_otros_espera','promedio_solicitud_espera','promedio_cambiotarifa_espera','promedio_noentrega_espera','promedio_notoma_espera','promedio_error_espera','promedio_reconexion_espera','promedio_alto_espera','promedio_contrato_espera','promedio_convenio_espera','promedio_cambio_espera','promedio_carta_espera','promedio_factibilidad_espera','promedio_dosomas_espera','promedio_contrato','promedio_convenio','promedio_cambio','promedio_carta','promedio_factibilidad','promedio_dosomas','f_dos','f','fecha','fecha_dos','atendidos','espera','cajas','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados'));

    }
    public function sucursal_fecha(Request $request, $id)
    {
        $fecha = $request->fecha;
        $fecha_dos = $request->fecha_dos;
        //dd($fecha_dos);
        //dd($fecha);
        
        $f = Tiket::whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")->first();

        $atendidos = DB::table('tikets')->select(DB::raw('*'))
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->count();
        $espera = DB::table('tikets')->select(DB::raw('*'))
            ->where('estado',0)
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
            ->where('subasunto','Tramites')
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
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->count();
        
        $pago_abandonado = DB::table('tikets')->select(DB::raw('*'))
            ->where('estado',2)
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

        $dosomas = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
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
            ->where('asunto','Reconexión de servicio')
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
            ->whereDate('created_at','=',$fecha)
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

        $cambiotarifa = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Cambio de tarifa')
            ->whereDate('created_at','=',$fecha)
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
        $pago_recibo = DB::table('tikets')->select(DB::raw('*'))
            ->where('estado',1)
            ->where('asunto','Pago')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->count();   
        
        $pago_recibo_abandonados = DB::table('tikets')->select(DB::raw('*'))
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


        //promedios
        /*$promedio=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->first();*/
        
        $promedio_tramites=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->first(); 
        
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->first();

        $promedio_pago=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->first(); 

        $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
    
        
        $promedio_tramitesa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")
            ->first();
        
        $promedio_aclaracionesa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")
            ->first();
        
        $promedio_pagoa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 


        $promedio_atendido =round(($promedio_tramitesa->tiempo + $promedio_aclaracionesa->tiempo + $promedio_pagoa->tiempo ) / 3 );           
    
        //dd($promedio);
        $sucursal = Sucursal::where('id', $id)->first();
        $cajas=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.fk_caja')
            ->where("tikets.id_sucursal",$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('tikets.fk_caja')
            ->get();

        $cajas_tramites = DB::table('tikets')->selectRaw('count(turno) as numero, subasunto, fk_caja as caja')
            ->where("id_sucursal",$id)
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('estado',1)
            ->groupBy('caja')->groupBy('subasunto')
            ->get();
        

        $cajas_pago=DB::table('tikets')->selectRaw('count(turno) as numero, subasunto, fk_caja as caja')
            ->where("id_sucursal",$id)
            ->where('subasunto','Pago')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('estado',1)
            ->groupBy('caja')->groupBy('subasunto')
            ->get();
        
        $cajas_aclaraciones=DB::table('tikets')->selectRaw('count(turno) as numero, subasunto, fk_caja as caja')
            ->where("id_sucursal",$id)
            ->where('subasunto','Aclaraciones y Otros')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('estado',1)
            ->groupBy('caja')->groupBy('subasunto')
            ->get();

        $cajas_tramites_sub= DB::table('tikets')->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
            ->where("id_sucursal",$id)
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('subasunto')->groupBy('caja')
            ->orderBy('caja','ASC')
            ->get();
        
        $cajas_aclaraciones_sub= DB::table('tikets')->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
            ->where("id_sucursal",$id)
            ->where('subasunto','Aclaraciones y otros')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('estado',1)
            ->groupBy('caja')->groupBy('subasunto')
            ->orderBy('caja','ASC')
            ->get();
        
        $cajas_pago_sub= DB::table('tikets')->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
            ->where("id_sucursal",$id)
            ->where('subasunto','Pago')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('estado',1)
            ->groupBy('caja')->groupBy('subasunto')
            ->orderBy('caja','ASC')
            ->get(); 


        $promedio_cajera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo, fk_caja as caja')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('caja')
            ->get();
        
        $promedio_tramites_cajera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo,fk_caja as caja')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();


        $promedio_aclaraciones_cajera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo,fk_caja as caja')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        
        $promedio_pago_cajera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo, fk_caja as caja')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        
        $promedio_atendido_cajera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, fk_caja as caja')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('caja')
            ->get();
        
        $promedio_tramitesa_cajera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, fk_caja as caja')
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('caja')
            ->get();
        
        $promedio_aclaracionesa_cajera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, fk_caja as caja')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('caja')
            ->get();
        
        $promedio_pagoa_cajera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo, fk_caja as caja')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('caja')
            ->get();

        $promedio_contrato=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first();

        $promedio_convenio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 

        $promedio_cambio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 

        $promedio_carta=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
            
        $promedio_factibilidad=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first(); 
            
        $promedio_dosomas=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->whereRaw("fin <> '00:00:00'")
            ->first();


        $promedio_contrato_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_convenio_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 

        $promedio_cambio_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 

        $promedio_carta_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_factibilidad_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_dosomas_espera=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        //dd($promedio_dosomas_atendido);
        
        //Promedio espera aclaraciones
        $promedio_alto_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
            //dd($promedio_alto_espera);
        
        $promedio_reconexion_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Reconexion de servicio')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_error_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Error en lectura')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_notoma_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','No toma lectura')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_noentrega_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','No entrega de recibo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

            //dd($promedio_noentrega_espera);
        
        $promedio_cambiotarifa_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Cambio de tarifa')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_solicitud_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Solicitud de medidor')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_otros_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Otros tramites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        //aclaraciones tiempo de atencion
         $promedio_alto=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id) 
            ->whereRaw("fin <> '00:00:00'")          
            ->first(); 
        
        $promedio_reconexion=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Reconexion de servicio')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")            
            ->first(); 
        
        $promedio_error=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Error en lectura')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id) 
            ->whereRaw("fin <> '00:00:00'")           
            ->first(); 
        
        $promedio_notoma=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','No toma lectura')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id) 
            ->whereRaw("fin <> '00:00:00'")          
            ->first(); 
        
        $promedio_noentega=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','No entrega de recibo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")           
            ->first(); 
        
        $promedio_cambiotarifa=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Cambio de tarifa')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")         
            ->first(); 
        
        $promedio_solicitud=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Solicitud de medidor')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")         
            ->first(); 

        $promedio_otros=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Otros tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")           
            ->first();

        //Promedio espera pago
        $promedio_pago_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_pago_convenio_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago de convenio')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_pago_carta_espera=DB::table('tikets')
            //->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,2)) as tiempo')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
            ->where('asunto','Pago carta no adeudo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        //pago tiempo de atencion
         $promedio_pago_recibo=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")           
            ->first(); 
        
        $promedio_pago_convenio=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago de convenio')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")          
            ->first(); 
        
        $promedio_pago_carta=DB::table('tikets')
            ->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            //->selectRaw('CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS tiempo')
            ->where('asunto','Pago carta no adeudo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->whereRaw("fin <> '00:00:00'")           
            ->first();             


        //Tramites por cajas
        $caja_contrato = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Contrato');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        //dd($caja_contrato);

        $caja_convenio = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Convenio');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();
            
        $caja_cambio = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de nombre');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        //dd($caja_cambio);
         
        $caja_carta = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Carta de adeudo')
                 ->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'");
             })->where('users.id_sucursal',$id)
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();


        $caja_factibilidad = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Factibilidad');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();


        $caja_dosomas = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','2 o mas tramites');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();
        


        //aclaraciones por caja
        $caja_alto = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Alto consumo (con y sin medidor)');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_reconexion = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Reconexion de servicio');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_error = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Error en lectura');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_notoma = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No toma lectura');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_noentrega = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No entrega de recibo');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_cambiotarifa = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de tarifa');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_solicitud = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de medidor');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_otros = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Otros tramites');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        //Pagos por caja
        $caja_recivo = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_pago_carta = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago carta no adeudo');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        $caja_pago_convenio = DB::table('users')
        ->selectRaw('users.name as caja, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join){
            $join->on('tikets.fk_caja','=','users.name')
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago de convenio');
             })->where('users.id_sucursal',$id)->whereRaw("DATE(tikets.created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('users.name')
        ->orderBy('users.name','ASC')
        ->get();

        
        return view('home.fechasucursal',compact('promedio_pago_recibo','caja_contrato','caja_convenio','caja_cambio','caja_carta','caja_factibilidad','caja_dosomas','caja_alto','caja_reconexion','caja_error','caja_notoma','caja_noentrega','caja_cambiotarifa','caja_solicitud','caja_otros','caja_recivo','caja_pago_carta','caja_pago_convenio','promedio_pago_carta','promedio_pago_convenio','promedio_pago','promedio_pago_espera','promedio_pago_convenio_espera','promedio_pago_carta_espera','promedio_alto','promedio_reconexion','promedio_error','promedio_notoma','promedio_noentega','promedio_cambiotarifa','promedio_solicitud','promedio_otros','promedio_otros_espera','promedio_solicitud_espera','promedio_cambiotarifa_espera','promedio_noentrega_espera','promedio_notoma_espera','promedio_error_espera','promedio_reconexion_espera','promedio_alto_espera','suma_promedio_cajera','pago_mes_carta','pago_mes_convenio','promedio_contrato_espera','promedio_convenio_espera','promedio_cambio_espera','promedio_carta_espera','promedio_factibilidad_espera','promedio_dosomas_espera','promedio_contrato','promedio_convenio','promedio_cambio','promedio_carta','promedio_factibilidad','promedio_dosomas','fecha','fecha_dos','cajas_tramites','cajas_pago','cajas_aclaraciones','cajas_tramites_sub','cajas_aclaraciones_sub','cajas_pago_sub','promedio_pagoa_cajera','promedio_aclaracionesa_cajera','promedio_tramitesa_cajera','promedio_atendido_cajera','promedio_pago_cajera','promedio_aclaraciones_cajera','promedio_tramites_cajera','promedio_cajera','cajas','sucursal','f','atendidos','espera','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados'));
    }
}