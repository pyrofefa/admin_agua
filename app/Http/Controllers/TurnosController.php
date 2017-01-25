<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tiket;
use App\Folios;
use App\Sucursal;
use Carbon\Carbon;

class TurnosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
        Carbon::setLocale('es');
    }
    public function index(Request $request)
    {
        $sucursal = Sucursal::all();
        return view('turnos.index',compact('sucursal'));
    }
    public function Sucursal(Request $request, $id)
    {
        $sucursal = Sucursal::where('id', $id)->first();
        $folios = Folios::where('tipo','pagos')->where('id_sucursal',$id)->first();
        $folios_aclaraciones = Folios::where('tipo','aclaraciones')->where('id_sucursal',$id)->first();
        $tikets = Tiket::Search($request->asunto)->orderBy('created_at','DESC')->where('estado', '1')->where('id_sucursal',$id)->paginate(30);
        $en_espera = Tiket::where('estado', '0')->where('id_sucursal',$id)->count();
        $atendidos = Tiket::where('estado', '1')->where('id_sucursal',$id)->count();
        
        return view('turnos.sucursal',compact('tikets','folios','folios_aclaraciones','en_espera', 'atendidos','sucursal'));
    }
    public function en_espera(Request $request, $id)
    {
        $sucursal = Sucursal::where('id', $id)->first();
        $tikets = Tiket::orderBy('created_at','DESC')->where('estado', '0')->where('id_sucursal',$id)->paginate(30);
        //dd($tikets);
        return view('turnos.en_espera',compact('tikets','sucursal'));   
    }
    
    public function terminar(Request $request, $id)
    {
        $folio = Tiket::where('estado','0')->where('id_sucursal',$id)->update(['estado' => '3']);
        $request -> session()->flash('espera', "Se ha dado por terminado los turnos en espera");
        return redirect()->action('TurnosController@sucursal',[ 'id' => $id ]);    
    }
}