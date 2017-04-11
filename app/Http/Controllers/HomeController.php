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
        $pago_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
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
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Trámites')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->first(); 
        
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->first();    
        
        $promedio_pago=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Pago')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->first(); 

        $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
    
        $promedio_tramitesa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_aclaracionesa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->first();
        
        $promedio_pagoa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
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

        $cajas_tramites_sub= DB::table('tikets')->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
            ->where("id_sucursal",$id)->where('estado',1)->where('subasunto','Tramites')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('subasunto')->groupBy('caja')->orderBy('asunto')->get();
        $cajas_aclaraciones_sub= DB::table('tikets')->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
            ->where("id_sucursal",$id)->where('subasunto','Aclaraciones y otros')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('estado',1)
            ->groupBy('caja')->groupBy('subasunto')->orderBy('asunto')->get();
        $cajas_pago_sub= DB::table('tikets')->selectRaw('count(turno) as numero, asunto, fk_caja as caja')
            ->where("id_sucursal",$id)->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('estado',1)
            ->groupBy('caja')->groupBy('subasunto')->orderBy('asunto')->get();    

        $asunto_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero,subasunto, MONTH(created_at) as mes')->where('id_sucursal',$id)->where('estado',1)->groupBy('mes')->groupBy('subasunto')->get();
        $tramites_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')->where('id_sucursal',$id)->where('estado',1)->where('subasunto','Tramites')->groupBy('mes')
            ->groupBy('asunto')->get();
        $aclaraciones_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')->where('id_sucursal',$id)->where('estado',1)->where('subasunto','Aclaraciones y Otros')
            ->groupBy('mes')->groupBy('asunto')->get();   
        $pago_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')->where('id_sucursal',$id)->where('estado',1)->where('subasunto','Pago')
            ->groupBy('mes')->groupBy('asunto')->get();

        $promedio_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();
        
        $promedio_tramites_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();
        
        $promedio_aclaraciones_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();
        
        $promedio_pago_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();      
        
        $promedio_atendido_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, MONTH(created_at) as mes')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();
        
        $promedio_tramitesa_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Trámites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();
        
        $promedio_aclaracionesa_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();
        
        $promedio_pagoa_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('mes')
            ->get();

        $promedio_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, fk_caja as caja')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->get();

        $promedio_tramites_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo,fk_caja as caja')
            ->where('subasunto','Trámites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        
        $promedio_aclaraciones_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo,fk_caja as caja')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        
        $promedio_pago_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, fk_caja as caja')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();


        $promedio_atendido_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, fk_caja as caja')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('caja')
            ->get();
        
        $promedio_tramitesa_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, fk_caja as caja')
            ->where('subasunto','Tramites')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        
        $promedio_aclaracionesa_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, fk_caja as caja')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        
        $promedio_pagoa_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, fk_caja as caja')
            ->where('subasunto','Pago')->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();     

        $promedio_contrato=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        $promedio_convenio=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)            
            ->first(); 
            
        $promedio_cambio=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)            
            ->first(); 
            
            
        $promedio_carta=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)            
            ->first(); 
            
        $promedio_factibilidad=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)            
            ->first(); 
            
        $promedio_dosomas=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)            
            ->first();                  


        $promedio_contrato_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        $promedio_convenio_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 

        $promedio_cambio_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 

        $promedio_carta_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_factibilidad_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_dosomas_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();


        return view('home.sucursal',compact('promedio_contrato_espera','promedio_convenio_espera','promedio_cambio_espera','promedio_carta_espera','promedio_factibilidad_espera','promedio_dosomas_espera','promedio_contrato','promedio_convenio','promedio_cambio','promedio_carta','promedio_factibilidad','promedio_dosomas','cajas_pago_sub','cajas_aclaraciones_sub','cajas_tramites_sub','promedio_atendido_cajera','promedio_tramitesa_cajera','promedio_aclaracionesa_cajera','promedio_pagoa_cajera','promedio_cajera','promedio_tramites_cajera','promedio_aclaraciones_cajera','promedio_pago_cajera','promedio_pagoa_mes','promedio_aclaracionesa_mes','promedio_tramitesa_mes','promedio_atendido_mes','promedio_pago_mes','promedio_aclaraciones_mes','promedio_tramites_mes','promedio_mes','pago_mes','aclaraciones_mes','tramites_mes','asunto_mes','cajas_tramites','cajas_aclaraciones','cajas_pago','sucursal','carbon','atendidos','espera','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cajas','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados','sucursal'));
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
        $pago_recibo = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->count();     
        $pago_recibo_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago')->whereRaw('Date(created_at) = CURDATE()')->count();
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
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
        
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();    
        
        $promedio_pago=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
        
        $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
    

        $promedio_tramitesa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo')
            ->where('subasunto','Trámites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_aclaracionesa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();
        
        $promedio_pagoa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();        
    
        $promedio_atendido =round(($promedio_tramitesa->tiempo + $promedio_aclaracionesa->tiempo + $promedio_pagoa->tiempo ) / 3 );


        $promedio_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, MONTH(created_at) as mes')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();

        $promedio_tramites_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();
        
        $promedio_aclaraciones_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();
        
        $promedio_pago_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, MONTH(created_at) as mes')
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
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();
        
        $promedio_aclaracionesa_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();
        
        $promedio_pagoa_mes=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, MONTH(created_at) as mes')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->groupBy('mes')
            ->get();

        $promedio_contrato=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        $promedio_convenio=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_cambio=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_carta=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_factibilidad=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_dosomas=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();     

        

        $promedio_contrato_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();

        $promedio_convenio_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 

        $promedio_cambio_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 

        $promedio_carta_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_factibilidad_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first(); 
            
        $promedio_dosomas_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->first();


        $asunto_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero,subasunto, MONTH(created_at) as mes')
            ->where('estado',1)->groupBy('mes')->groupBy('subasunto')->get();
        $tramites_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)->where('subasunto','Tramites')->groupBy('mes')
            ->groupBy('asunto')->get();
        $aclaraciones_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)->where('subasunto','Aclaraciones y Otros')
            ->groupBy('mes')->groupBy('asunto')->get();   
        $pago_mes = DB::table('tikets')->selectRaw('COUNT(turno) as numero, asunto, MONTH(created_at) as mes')
            ->where('estado',1)->where('subasunto','Pago')
            ->groupBy('mes')->groupBy('asunto')->get();

        return view('home.general',compact('promedio_contrato_espera','promedio_convenio_espera','promedio_cambio_espera','promedio_carta_espera','promedio_factibilidad_espera','promedio_dosomas_espera','promedio_contrato','promedio_convenio','promedio_cambio','promedio_carta','promedio_factibilidad','promedio_dosomas','pago_mes','aclaraciones_mes','tramites_mes','asunto_mes','promedio_pagoa_mes','promedio_aclaracionesa_mes','promedio_tramitesa_mes','promedio_atendido_mes','promedio_pago_mes','promedio_aclaraciones_mes','promedio_tramites_mes','promedio_mes','sucursal','carbon','atendidos','espera','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados'));
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
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('estado',1)
            ->where('subasunto','Trámites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_pago=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
        
        $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
        
        $promedio_tramitesa = DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        
        $promedio_aclaracionesa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();
        
        $promedio_pagoa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();        
    

        $promedio_atendido =round(($promedio_tramitesa->tiempo + $promedio_aclaracionesa->tiempo + $promedio_pagoa->tiempo ) / 3 );


        $promedio_contrato=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_convenio=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_cambio=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            

        $promedio_carta=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_factibilidad=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_dosomas=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_contrato_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_convenio_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 

        $promedio_cambio_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 

        $promedio_carta_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_factibilidad_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_dosomas_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        //dd($promedio_atendido);
        return view('home.fecha',compact('promedio_contrato_espera','promedio_convenio_espera','promedio_cambio_espera','promedio_carta_espera','promedio_factibilidad_espera','promedio_dosomas_espera','promedio_contrato','promedio_convenio','promedio_cambio','promedio_carta','promedio_factibilidad','promedio_dosomas','f_dos','f','fecha','fecha_dos','atendidos','espera','cajas','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados'));

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
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->first(); 
        
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->first();

        $promedio_pago=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->first(); 

        $promedio = round(($promedio_tramites->tiempo + $promedio_aclaraciones->tiempo + $promedio_pago->tiempo ) / 3 );
    
        
        $promedio_tramitesa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('subasunto','Tramites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->first();
        
        $promedio_aclaracionesa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->first();
        
        $promedio_pagoa=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
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
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, fk_caja as caja')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('caja')
            ->get();
        
        $promedio_tramites_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo,fk_caja as caja')
            ->where('subasunto','Trámites')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        
        $promedio_aclaraciones_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo,fk_caja as caja')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        
        $promedio_pago_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo, fk_caja as caja')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        


        $promedio_atendido_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, fk_caja as caja')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('caja')
            ->get();
        
        $promedio_tramitesa_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, fk_caja as caja')
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        
        $promedio_aclaracionesa_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, fk_caja as caja')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();
        
        $promedio_pagoa_cajera=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as tiempo, fk_caja as caja')
            ->where('subasunto','Pago')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('caja')
            ->get();

        $promedio_contrato=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_convenio=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 

        $promedio_cambio=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 

        $promedio_carta=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_factibilidad=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_dosomas=DB::table('tikets')
            ->selectRaw('CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();


        $promedio_contrato_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Contrato')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

        $promedio_convenio_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Convenio')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 

        $promedio_cambio_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Cambio de nombre')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 

        $promedio_carta_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Carta de adeudo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_factibilidad_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','Factibilidad')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first(); 
            
        $promedio_dosomas_espera=DB::table('tikets')
            ->selectRaw('CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as tiempo')
            ->where('asunto','2 o mas tramites')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->first();

            //dd($promedio_dosomas_atendido);


        return view('home.fechasucursal',compact('promedio_contrato_espera','promedio_convenio_espera','promedio_cambio_espera','promedio_carta_espera','promedio_factibilidad_espera','promedio_dosomas_espera','promedio_contrato','promedio_convenio','promedio_cambio','promedio_carta','promedio_factibilidad','promedio_dosomas','fecha','fecha_dos','cajas_tramites','cajas_pago','cajas_aclaraciones','cajas_tramites_sub','cajas_aclaraciones_sub','cajas_pago_sub','promedio_pagoa_cajera','promedio_aclaracionesa_cajera','promedio_tramitesa_cajera','promedio_atendido_cajera','promedio_pago_cajera','promedio_aclaraciones_cajera','promedio_tramites_cajera','promedio_cajera','cajas','sucursal','f','atendidos','espera','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados'));
    }
}