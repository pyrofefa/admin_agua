<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
//use App\Caja;
use App\Tiket; 
use App\User;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('cors');
        //$this->middleware('auth');
    }
    public function index()
    {
        $turno=Tiket::where('estado', 0)->first();
    	$usuario_caja=Auth::user();
         return view('home.index', compact('usuario_caja','turno'));
    }
    //api
    public function mostrar()
    {
        $turno=Tiket::where('estado', 0)->first();
        return [$turno];
    }
    public function update(Request $request, $id)
    {
        $caja=caja::find($id);
        $caja->update($request->all());
        return response()->json(['status'=>'ok','data'=>$caja], 200);
    }
    public function destroy($id)
    {
        //
    }
}
