<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Folios;
use DB;

class FoliosController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
    }
    public function index()
    {
        $folios = Folios::all();
        return response()->json($folios);
    }
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
    public function create()
    {
        
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

        $id_sucursal = $request->id_sucursal;
        $folio = Folios::where('tipo','=','pagos')->where('id_sucursal',$id_sucursal)->first();
        $folio->numero = $request->numero+1;
        $folio->save();

        $folio_a = Folios::where('tipo','=','aclaraciones')->where('id_sucursal',$id_sucursal)->first();
        $folio_a->numero = $request->numero+1;
        $folio_a->save();

        $request -> session()->flash('limpiar', "Se han limpiado los numeros");
        return redirect()->action('TurnosController@sucursal',[ 'id' => $id_sucursal ]);    
    }
    //api
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
    public function destroy($id)
    {
        //
    }
}
