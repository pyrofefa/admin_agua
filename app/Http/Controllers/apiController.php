<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Folios;
use App\Tiket;
use App\User;
use App\Comercial;
use Carbon\Carbon;

class apiController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        Carbon::setLocale('es');
    }
    /******
        Turnomatic
    ******/
    //trayendo folios
    public function pagos(Request $request, $id)
    {
        $folio = Folios::where('tipo','=','pagos')->where('id_sucursal','=', $id)->first();
        return [ $folio ];
    }
    public function aclaraciones(Request $request, $id)
    {
        $folio = Folios::where('tipo','=','aclaraciones')->where('id_sucursal','=', $id)->first();
        return [ $folio ];
    }
    //actualizando folios
    public function actualizar(Request $request, $id)
    {
        $folio = Folios::where('tipo','=','pagos')->where('id_sucursal','=', $id)->first();
        $folio->numero = $request->numero+1;
        $folio->save();
        return "Actualizado";  
    }

    public function actualizar_aclaraciones(Request $request, $id)
    {
        $folio = Folios::where('tipo','=','aclaraciones')->where('id_sucursal','=', $id)->first();
        $folio->numero = $request->numero+1;
        $folio->save();
        return "Actualizado";  
    }
    //agregando nuevo tiket
    public function agregar_tiket_pagos(Request $request)
    {
        //dd($request->all());
        $id = $request->id_sucursal;
        $date = Carbon::now('America/Hermosillo');
        
        $tiket = new Tiket;
        $tiket->turno = $request->turno;
        $tiket->id_sucursal = $request->id_sucursal;
        $tiket->asunto = $request->asunto;
        $tiket->estado = '0';
        $tiket->subasunto = "Pago";
        $tiket->llegada =  $date->toTimeString();
        $tiket->save();

        $folio = Folios::where('tipo','=','pagos')->where('id_sucursal','=', $id)->first();
        $folio->numero = $request->turno+1;
        $folio->save();


        return "tiket agregado con exito";
    }
    public function agregar_tiket_aclaraciones(Request $request)
    {

        $id = $request->id_sucursal;
        $date = Carbon::now('America/Hermosillo');
        
        $tiket = new Tiket;
        $tiket->turno = $request->turno;
        $tiket->id_sucursal = $request->id_sucursal;
        $tiket->asunto = $request->asunto;
        $tiket->estado = '0';
        $tiket->subasunto = $request->subasunto;
        $tiket->llegada =  $date->toTimeString();
        $tiket->save();

        $folio = Folios::where('tipo','=','aclaraciones')->where('id_sucursal','=', $id)->first();
        $folio->numero = $request->turno+1;
        $folio->save();

        return "tiket agregado con exito";
    }
    /******
        Mostrador
    ******/
    public function mostrar()
    {
        $comerciales = Comercial::all();
        return response()->json($comerciales);
    }
    /******
        Usuarios
    ******/
    public function iniciar(Request $request, $id)
    {
        //dd($request->all());
        $caja = $request->name;
        $pass = $request->password;
        //dd($usuario);
        $usuario = User::where('name', $caja)->where('password',$pass)->where('id_sucursal',$id)->count();
        return response()->json($usuario);
    }
    public function mostrar_pagos($id)
    {
        $turno=Tiket::where('estado', 0)->where('subasunto','Pago')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        //dd($turno);
        return [$turno];
    }
    public function actualizar_tiket(Request $request, $id)
    {
        //dd($request->all());
        $date = Carbon::now('America/Hermosillo');

        $tiket = Tiket::find($id);
        $tiket->estado = '1';
        $tiket->fk_caja = $request->fk_caja;
        $tiket->atendido = $date->toTimeString();
        $tiket->tiempo = $request->tiempo;
        $tiket->save();

        //$tiket -> update($request->all());
        return response()->json($tiket);
    }
    public function actualizar_tiempo(Request $request, $id)
    {
        //dd($request->all());
        $date = Carbon::now('America/Hermosillo');

        $tiket = Tiket::find($id);
        $tiket->tiempo = $request->tiempo;
        $tiket->estado = $request->estado;
        $tiket->asunto = $request->asunto;
        $tiket->save();

        //$tiket -> update($request->all());
        return response()->json($tiket);
    }
    public function mostrar_aclaraciones($id)
    {
        $turno=Tiket::where('estado', 0)->whereRaw("(subasunto = 'Aclaraciones y Otros' or subasunto = 'Tramites')")
            ->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        return [$turno];
    }    

}