<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GraficaPagos extends Controller
{
    public function grafica_recibo_fecha($fecha, $fecha_dos)
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagoconvenio_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago de convenio')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagocarta_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago carta no adeudo')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_recibo_id_fecha($id, $fecha, $fecha_dos)
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagoconvenio_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago de convenio')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagocarta_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago carta no adeudo')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_recibo()
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagoconvenio()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago de convenio')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagocarta()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago carta no adeudo')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_recibo_id($id)
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagoconvenio_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago de convenio')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagocarta_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Pago carta no adeudo')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
}