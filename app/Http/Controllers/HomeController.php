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
        $turno=Tiket::where('estado', 0)->where('subasunto','Pago')->where('id_sucursal',$id)->first();
        //dd($turno);
        return [$turno];
    }
    public function mostrar_aclaraciones($id)
    {
        $turno=Tiket::where('estado', 0)->whereRaw("(subasunto = 'Aclaraciones y Otros' or subasunto = 'Tramites')")
            ->where('id_sucursal',$id)->first();
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

        $atendidos = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)->whereRaw('Date(created_at) = CURDATE()')
            ->where('id_sucursal',$id)->count();
        $espera = DB::table('tikets')->select(DB::raw('*'))->where('estado',0)->whereRaw('Date(created_at) = CURDATE()')
            ->where('id_sucursal',$id)->count();
        $abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)->whereRaw('Date(created_at) = CURDATE()')
            ->where('id_sucursal',$id)->count();


        $cajas=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.fk_caja')
        ->where("tikets.id_sucursal",$id)->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('tikets.fk_caja')->get();

        $subasunto=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.subasunto')->where('estado',1)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.subasunto')->get();

        $subasunto_abandonados=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.subasunto')->where('estado',2)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.subasunto')->get();


        $tramites = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')->where('subasunto','Trámites')
            ->where('estado',1)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();
        
        $tramites_abandonados = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')->where('subasunto','Trámites')
            ->where('estado',2)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();    

        $aclaraciones = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')->where('subasunto','Aclaraciones y Otros')->where('estado',1)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();

        $aclaraciones_abandonados = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')->where('subasunto','Aclaraciones y Otros')->where('estado',2)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();         

        $pago = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')
            ->where('subasunto','Pago')->where('estado',1)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();
        
        $pago_abandonado = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')
            ->where('subasunto','Pago')->where('estado',2)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();    
            
        $promedio=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('estado',1)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        //dd($promedio);

        $promedio_tramites=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('id_sucursal',$id)->where('subasunto','Trámites')->whereRaw('Date(tikets.created_at) = CURDATE()')->first(); 
        
        //dd($promedio_tramites);
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();    

        $promedio_pago=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Pago')->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first(); 
         
        $promedio_atendido=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('estado',1)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

        $promedio_tramitesa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Trámites')->where('estado',1)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

        $promedio_aclaracionesa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')->where('subasunto','Aclaraciones y Otros')->where('estado',1)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

        $promedio_pagoa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Pago')->where('estado',1)->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

        $sucursal = Sucursal::where('id', $id)->first();
        
        return view('home.sucursal', compact('sucursal','carbon','atendidos','espera','cajas','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','subasunto', 'subasunto_abandonados','tramites','tramites_abandonados','aclaraciones','aclaraciones_abandonados','pago','pago_abandonado','abandonados','cajas'));
    }
    public function general()
    {
        $carbon =  Carbon::today()->format('d-m-Y');
        $atendidos = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)->whereRaw('Date(created_at) = CURDATE()')->count();
        $espera = DB::table('tikets')->select(DB::raw('*'))->where('estado',0)->whereRaw('Date(created_at) = CURDATE()')->count();
        $abandonados = DB::table('tikets')->select(DB::raw('*'))->where('estado',2)->whereRaw('Date(created_at) = CURDATE()')->count();


        $cajas=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.fk_caja')->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('tikets.fk_caja')->get();

        $subasunto=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.subasunto')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.subasunto')->get();

        $subasunto_abandonados=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.subasunto')->where('estado',2)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.subasunto')->get();

        $tramites = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')->where('subasunto','Trámites')
            ->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();
        
        $tramites_abandonados = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')->where('subasunto','Trámites')
            ->where('estado',2)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();    

        $aclaraciones = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')->where('subasunto','Aclaraciones y Otros')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();

        $aclaraciones_abandonados = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')->where('subasunto','Aclaraciones y Otros')->where('estado',2)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();         

        $pago = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')
            ->where('subasunto','Pago')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();
        $pago_abandonado = DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.asunto')
            ->where('subasunto','Pago')->where('estado',2)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('tikets.asunto')->get();    
            
        $promedio=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        //dd($promedio);

        $promedio_tramites=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Trámites')->whereRaw('Date(tikets.created_at) = CURDATE()')->first(); 
        
        //dd($promedio_tramites);
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(tikets.created_at) = CURDATE()')->first();    

        $promedio_pago=DB::table('tikets')->selectRaw('CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as tiempo')->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')->first(); 
         
        $promedio_atendido=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

        $promedio_tramitesa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Trámites')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

         $promedio_aclaracionesa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Aclaraciones y Otros')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();

        $promedio_pagoa=DB::table('tikets')->selectRaw('cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as tiempo')
            ->where('subasunto','Pago')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();        
    

        return view('home.general',compact('sucursal','carbon','atendidos','espera','cajas','promedio','promedio_tramites','promedio_aclaraciones','promedio_pago','promedio_atendido','promedio_tramitesa','promedio_aclaracionesa','promedio_pagoa','subasunto', 'subasunto_abandonados','tramites','tramites_abandonados','aclaraciones','aclaraciones_abandonados','pago','pago_abandonado','abandonados'));
    }
    public function destroy($id)
    {
        //
    }
}
