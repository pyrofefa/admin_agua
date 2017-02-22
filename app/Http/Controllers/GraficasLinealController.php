<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GraficasLinealController extends Controller
{
    public function index()
    {
        
    }
    public function create()
    {
        
    }
    public function store(Request $request)
    {
        
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function lineal_subasunto_tramites()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Trámites')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Trámites')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Aclaraciones y Otros')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Pago')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    //id
    public function lineal_subasunto_tramites_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Trámites')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Trámites')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Pago')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Pago')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Trámites')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Aclaraciones y Otros')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Trámites')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_global()
    {
        $promedio=DB::table('tikets')->selectRaw('DATE(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }

}
