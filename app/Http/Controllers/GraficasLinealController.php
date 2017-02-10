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
}
