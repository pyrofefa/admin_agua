<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Folios;
use App\Tiket;
use App\User;
use App\Comercial;

class apiController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
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

        $id = $request->id_sucursal;
        
        $tiket = new Tiket($request->all());
        $tiket->save();

        $folio = Folios::where('tipo','=','pagos')->where('id_sucursal','=', $id)->first();
        $folio->numero = $request->turno+1;
        $folio->save();


        return "tiket agregado con exito";
    }
    public function agregar_tiket_aclaraciones(Request $request)
    {

        $id = $request->id_sucursal;

        $tiket = new Tiket($request->all());
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
        $tiket = Tiket::find($id);
        $tiket -> update($request->all());
        return response()->json($tiket);
    }
    public function mostrar_aclaraciones($id)
    {
        $turno=Tiket::where('estado', 0)->whereRaw("(subasunto = 'Aclaraciones y Otros' or subasunto = 'Tramites')")
            ->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        return [$turno];
    }    

}
