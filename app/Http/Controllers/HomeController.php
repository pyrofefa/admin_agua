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

        $carbon =  Carbon::today()->format('d-m-Y');
        $atendidos = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)->whereRaw('Date(created_at) = CURDATE()')->count();
        $espera = DB::table('tikets')->select(DB::raw('*'))->where('estado',0)->whereRaw('Date(created_at) = CURDATE()')->count();

        $cajas=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.fk_caja')->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('tikets.fk_caja')->get();

        $promedio=DB::table('tikets')->selectRaw('DATE(created_at) as inicio, AVG(TIME_TO_SEC(TIMEDIFF(updated_at,created_at))) AS diferencia')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('inicio')->first();

        return view('home.index',compact('sucursal','carbon','atendidos','espera','cajas','promedio'));
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
    public function grafica_pagos()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('subasunto','=','Trámites')
            ->orWhere('subasunto','=','Pago')->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('subasunto','=','Aclaraciones y Otros')->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function grafica_pagos_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('subasunto','=','Trámites')->where('id_sucursal','=',$id)->get();
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('subasunto','=','Aclaraciones y Otros')->where('id_sucursal','=',$id)->get();
       $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function sucursal($id)
    {
        $carbon =  Carbon::today()->format('d-m-Y');

        $atendidos = DB::table('tikets')->select(DB::raw('*'))->where('estado',1)->whereRaw('Date(created_at) = CURDATE()')
            ->where('id_sucursal',$id)->count();
        $espera = DB::table('tikets')->select(DB::raw('*'))->where('estado',0)->whereRaw('Date(created_at) = CURDATE()')
            ->where('id_sucursal',$id)->count();

        $cajas=DB::table('tikets')->selectRaw('count(tikets.turno) as numero, tikets.fk_caja')
        ->where("tikets.id_sucursal",$id)->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('tikets.fk_caja')->get();

        $promedio=DB::table('tikets')->selectRaw('DATE(created_at) as inicio, AVG(TIME_TO_SEC(TIMEDIFF(updated_at,created_at))) AS diferencia')
            ->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('inicio')->first();

        $sucursal = Sucursal::where('id', $id)->first();
        return view('home.sucursal', compact('sucursal','atendidos','espera','carbon','promedio','cajas','promedio'));
    }
    public function destroy($id)
    {
        //
    }
}
