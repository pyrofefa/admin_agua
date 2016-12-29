<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tiket;
use App\Folios;
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
        $folios = Folios::all()->first();
        $tikets = Tiket::orderBy('created_at','DESC')->where('estado', '1')->paginate(30);
        $en_espera = Tiket::where('estado', '0')->count();
        $atendidos = Tiket::where('estado', '1')->count();
        
        return view('turnos.index',compact('tikets','folios', 'en_espera', 'atendidos'));
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
}
