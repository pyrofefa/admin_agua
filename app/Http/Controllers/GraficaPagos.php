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
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago');
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagoconvenio_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago de convenio');
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagocarta_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago carta no adeudo');
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_recibo_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago')
                 ->where('id_sucursal','=',$id);
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagoconvenio_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago de convenio')
                 ->where('id_sucursal','=',$id);
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagocarta_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago carta no adeudo')
                 ->where('id_sucursal','=',$id);
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_recibo()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagoconvenio()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago de convenio')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagocarta()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Pago carta no adeudo')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_recibo_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagoconvenio_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Pago de convenio')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagocarta_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Pago carta no adeudo')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
}