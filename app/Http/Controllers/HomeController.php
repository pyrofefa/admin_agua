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
        //$this->middleware('auth');
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
        $promedio=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        $promedio_tramites=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Trámites')->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)->first(); 
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)->first();    
        $promedio_pago=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)->first(); 
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)->first();
        $promedio_tramitesa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Trámites')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        $promedio_aclaracionesa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)->first();
        $promedio_pagoa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Pago')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)->first();        
        
        $sucursal = Sucursal::where('id', $id)->first();
        $cajas=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.fk_caja')
        ->where("tikets.id_sucursal",$id)->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('tikets.fk_caja')->get();


        return view('home.sucursal',compact('sucursal','carbon','atendidos','espera','cajas','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados','sucursal'));
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
        $promedio=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        $promedio_tramites=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Trámites')->whereRaw('Date(tikets.created_at) = CURDATE()')->first(); 
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(tikets.created_at) = CURDATE()')->first();    
        $promedio_pago=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')->first(); 
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        $promedio_tramitesa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Trámites')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        $promedio_aclaracionesa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        $promedio_pagoa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Pago')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();        
    

        return view('home.general',compact('sucursal','carbon','atendidos','espera','cajas','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados'));
    }
    public function general_fecha(Request $request)
    {

        $fecha = $request->fecha;
        //dd($fecha);
        
        $f = Tiket::whereDate('created_at','=',$fecha)->first();
        $atendidos = DB::table('tikets')->select(DB::raw('*'))
            ->where('estado',1)->whereDate('created_at','=',$fecha)->count();
        $espera = DB::table('tikets')->select(DB::raw('*'))->where('estado',0)->whereDate('created_at','=',$fecha)->count();
        $abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->whereDate('created_at','=',$fecha)->count();

        $aclaraciones=DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')->whereDate('created_at','=',$fecha)->count();  
        $aclaraciones_abandonadas = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('subasunto','Aclaraciones y Otros')->whereDate('created_at','=',$fecha)->count();
        $tramites = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('subasunto','Trámites')->whereDate('created_at','=',$fecha)->count();
        $tramites_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('subasunto','Trámites')->whereDate('created_at','=',$fecha)->count();
        $pago = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('subasunto','Pago')->whereDate('created_at','=',$fecha)->count();
        $pago_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('subasunto','Pago')->whereDate('created_at','=',$fecha)->count();     
        
        //Tramites
        $contrato = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Contrato')->whereDate('created_at','=',$fecha)->count();
        $contrato_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Contrato')->whereDate('created_at','=',$fecha)->count();
        $convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Convenio')->whereRaw('Date(created_at) = CURDATE()')->count();
        $convenio_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Convenio')->whereDate('created_at','=',$fecha)->count();
        $cambio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Cambio de nombre')->whereDate('created_at','=',$fecha)->count();
        $cambio_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Cambio de nombre')->whereDate('created_at','=',$fecha)->count();
        $carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Carta de adeudo')->whereDate('created_at','=',$fecha)->count();
        $carta_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Carta de adeudo')->whereDate('created_at','=',$fecha)->count();
        $factibilidad = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Factibilidad')->whereDate('created_at','=',$fecha)->count();
        $factibilidad_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Factibilidad')->whereDate('created_at','=',$fecha)->count();
        $dosomas = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','2 ó más trámites')->whereDate('created_at','=',$fecha)->count();
        $dosomas_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','2 ó más trámites')->whereDate('created_at','=',$fecha)->count();

        //Aclaraciones
        $alto = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Alto consumo (con y sin medidor)')->whereDate('created_at','=',$fecha)->count();
        $alto_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Alto consumo (con y sin medidor)')->whereDate('created_at','=',$fecha)->count();
        $reconexion = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Reconexión de servicio')->whereDate('created_at','=',$fecha)->count();
        $reconexion_abandonado = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Reconexión de servicio')->whereDate('created_at','=',$fecha)->count();   
        $error = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Error en lectura')->whereDate('created_at','=',$fecha)->count();     
        $error_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Error en lectura')->whereDate('created_at','=',$fecha)->count();  
        $notoma = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','No toma lectura')->whereDate('created_at','=',$fecha)->count();     
        $notoma_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','No toma lectura')->whereDate('created_at','=',$fecha)->count();
        $noentrega = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','No entrega de recibo')->whereDate('created_at','=',$fecha)->count();     
        $noentrega_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','No entrega de recibo')->whereDate('created_at','=',$fecha)->count();
        $cambiotarifa = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Cambio de tarifa')->whereDate('created_at','=',$fecha)->count();     
        $cambiodetarifa_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Cambio de tarifa')->whereDate('created_at','=',$fecha)->count(); 
        $solicitud = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Solicitud de medidor')->whereDate('created_at','=',$fecha)->count();     
        $solicitud_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Solicitud de medidor')->whereDate('created_at','=',$fecha)->count();                
        $otros = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Otros trámites')->whereDate('created_at','=',$fecha)->count();     
        $otros_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Otros trámites')->whereDate('created_at','=',$fecha)->count();   

        //Pagos
        $pago_recibo = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago')->whereDate('created_at','=',$fecha)->count();     
        $pago_recibo_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago')->whereDate('created_at','=',$fecha)->count();
        $pago_convenio = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago de convenio')->whereDate('created_at','=',$fecha)->count();     
        $pago_convenio_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago de convenio')->whereDate('created_at','=',$fecha)->count();
        $pago_carta = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)
            ->where('asunto','Pago carta no adeudo')->whereDate('created_at','=',$fecha)->count();     
        $pago_carta_abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)
            ->where('asunto','Pago carta no adeudo')->whereDate('created_at','=',$fecha)->count();


        //promedios
        $promedio=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('estado',1)->whereDate('created_at','=',$fecha)->first();
        $promedio_tramites=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Trámites')->whereRaw('Date(tikets.created_at) = CURDATE()')->first(); 
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Aclaraciones y Otros')->whereDate('created_at','=',$fecha)->first();    
        $promedio_pago=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Pago')->whereDate('created_at','=',$fecha)->first(); 
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')->where('estado',1)->whereDate('created_at','=',$fecha)->first();
        $promedio_tramitesa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Trámites')->where('estado',1)->whereDate('created_at','=',$fecha)->first();
        $promedio_aclaracionesa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')->where('estado',1)->whereDate('created_at','=',$fecha)->first();
        $promedio_pagoa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Pago')->where('estado',1)->whereDate('created_at','=',$fecha)->first();        
    
        //dd($promedio);

        return view('home.fecha',compact('f','atendidos','espera','cajas','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','tramites','tramites_abandonados','contrato','contrato_abandonado','convenio','convenio_abandonado','cambio','cambio_abandonado','carta','carta_abandonado','factibilidad','factibilidad_abandonado','dosomas','dosomas_abandonado','aclaraciones','aclaraciones_abandonadas','pago','pago_abandonado','pago_recibo','pago_recibo_abandonados','pago_convenio','pago_convenio_abandonados','pago_carta','pago_carta_abandonados','abandonados','alto','alto_abandonado','reconexion','reconexion_abandonado','error','error_abandonados','notoma','notoma_abandonados','noentrega','noentrega_abandonados','cambiotarifa','cambiodetarifa_abandonados','solicitud','solicitud_abandonados','otros','otros_abandonados'));

    }
}