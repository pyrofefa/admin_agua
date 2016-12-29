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
        $folio = Folios::where('tipo','=','tikets')->first();
        $folio->numero = $request->numero+1;
        $folio->save();
        $request -> session()->flash('limpiar', "Se han limpiado los numeros");
        return redirect()->route('turnos.index');    
    }
    //api
    public function actualizar(Request $request, $id)
    {
        $folio = Folios::where('tipo','=','tikets')->first();
        $folio->numero = $request->numero+1;
        $folio->save();
        return response()->json($folio);  
    }
    public function destroy($id)
    {
        //
    }
}
