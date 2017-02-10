<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GraficasPieController extends Controller
{
    
    public function index()
    {
        
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function grafica_subasunto()
    {
        $tiket = DB::table('tikets')->selectRaw('subasunto as name, count(subasunto) as y, created_at')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('subasunto')->where('estado',1)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_subasunto_abandonado()
    {
        $tiket = DB::table('tikets')->selectRaw('subasunto as name, count(subasunto) as y, created_at')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('subasunto')->where('estado',2)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagos()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',1)->Where('subasunto','=','Pago')->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_tramites()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',1)->Where('subasunto','=','Trámites')->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('subasunto','=','Aclaraciones y Otros')->where('estado',1)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagos_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',2)->Where('subasunto','=','Pago')->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_tramites_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',2)->Where('subasunto','=','Trámites')->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('subasunto','=','Aclaraciones y Otros')->where('estado',2)->get();    
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
}
