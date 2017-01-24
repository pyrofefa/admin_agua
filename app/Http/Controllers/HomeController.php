<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Tiket; 
use App\User;
use App\Sucursal;
use DB;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('cors');
        //$this->middleware('auth');
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
        $turno=Tiket::where('estado', 0)->where('subasunto','Trámites')->where('id_sucursal',$id)->first();
        //dd($turno);
        return [$turno];
    }
    public function mostrar_aclaraciones($id)
    {
        $turno=Tiket::where('estado', 0)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)->first();
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
    $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')->groupBy('asunto')->where('subasunto','=','Tramites')->get();        
        return response()->json($tiket);
    }
    public function grafica_aclaraciones()
    {
$tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')->groupBy('asunto')->where('subasunto','=','Aclaraciones y Otros')->get();        
        return response()->json($tiket);
    }

    public function grafica_pagos_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')->groupBy('asunto')->where('subasunto','=','Trámites')->where('id_sucursal','=',$id)->get();        
        return response()->json($tiket);
    }
    public function grafica_aclaraciones_id($id)
    {
$tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')->groupBy('asunto')->where('subasunto','=','Aclaraciones y Otros')->where('id_sucursal','=',$id)->get();
        return response()->json($tiket);
    }
    public function sucursal($id)
    {
        $sucursal = Sucursal::where('id', $id)->first();
        return view('home.sucursal', compact('sucursal'));
    }
    public function destroy($id)
    {
        //
    }
}
