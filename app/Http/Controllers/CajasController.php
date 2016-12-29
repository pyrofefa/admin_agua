<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Role;
use App\Tiket;

class CajasController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('auth');
    }
    public function index()
    {
        $cajas=Role::find(2)->user()->orderBy('name')->get();
        return view('cajas.index', compact('cajas'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
        $caja = new User;
        $caja->name = $request->name;
        $caja->password = bcrypt($request->password);
        $caja->save();
        $rol = Role::find(2);
        $caja->attachRole($rol->id); 

        $request -> session()->flash('nuevo', "Caja Agregada con exito");
        return redirect()->route('cajas.index'); 
    }
    public function show($id)
    {
        $caja = User::find($id);
        $turnos = Tiket::orderBy('created_at','DESC')->where('fk_caja', $caja->name)->paginate(15);
        return view('cajas.show',compact('caja', 'turnos'));
    }
    public function edit($id)
    {
        $caja = User::find($id);
        return view('cajas.edit',compact('caja'));
    }
    public function update(Request $request, $id)
    {
        $caja=User::find($id);
        $caja->name = $request->name;
        $caja->password = bcrypt($request->password);
        $caja->save();        

        $request -> session()->flash('editar', "Caja editada con exito");
        return redirect()->route('cajas.index');  
    }
    public function destroy(Request $request, $id)
    {
        User::destroy($id);
        $request -> session()->flash('message', "La Caja fue eliminada");
        return redirect()->route('cajas.index'); 
    }
}