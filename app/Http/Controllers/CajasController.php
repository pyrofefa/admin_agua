<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Role;
use App\Tiket;
use App\Sucursal;

class CajasController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }
    public function index()
    {
        $sucursal = Sucursal::all();
        return view('cajas.index',compact('sucursal'));
        /*$cajas=Role::find(2)->user()->orderBy('name')->get();
        return view('cajas.index', compact('cajas'));*/
    }
    public function sucursal($id)
    {
        $sucursal = Sucursal::where('id', $id)->first();
        $cajas=Role::find(2)->user()->where('id_sucursal',$id)->orderBy('name')->get();
        //dd($cajas);
        return view('cajas.sucursal', compact('sucursal','cajas'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
        $caja = new User;
        $caja->id_sucursal = $request->id;
        $caja->name = $request->name;
        $caja->password = $request->password;
        $caja->save();
        $rol = Role::find(2);
        $caja->attachRole($rol->id); 

        $request -> session()->flash('nuevo', "Caja Agregada con exito");
        return redirect()->action('CajasController@sucursal',[ 'id' => $request->id ]);    

    }
    public function show($id)
    {
        $caja = User::find($id);
        $turnos = Tiket::orderBy('created_at','DESC')->where('fk_caja', $caja->name)->paginate(15);
        return view('cajas.show',compact('caja', 'turnos'));
    }
    public function edit($id)
    {
        $sucursal = Sucursal::where('id', $id)->first();
        $caja = User::find($id);
        return view('cajas.edit',compact('caja'));
    }
    public function update(Request $request, $id)
    {
        $caja=User::find($id);
        $caja->name = $request->name;
        $caja->password = $request->password;
        $caja->save();        

        $request -> session()->flash('editar', "Caja editada con exito");
        return redirect()->route('cajas.index');  
    }
    public function destroy(Request $request, $id)
    {
        $id_sucursal = $request->id_sucursal;
        User::destroy($id);
        $request -> session()->flash('message', "La Caja fue eliminada");
        return redirect()->action('CajasController@sucursal',[ 'id' => $id_sucursal ]); 
    }
}