<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;

class UsersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        $usuarios=Role::find(1)->user()->orderBy('name')->get();
        return view('user.index', compact('usuarios'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        
        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        $rol = Role::find(1);
        $usuario->attachRole($rol->id); 

        $request -> session()->flash('nuevo', "Usuario Agregado con exito");
        return redirect()->route('user.index'); 
    }
    public function show($id)
    {
        $usuario = DB::table('users')->select(DB::raw('roles.display_name, roles.description, users.name'))
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','roles.id','=','role_user.role_id')
            ->where('users.id','=',$id)->first();

        return view('user.show', compact('usuario'));
    }
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('user.edit',compact('usuario'));
    }
    public function update(Request $request, $id)
    {
        $usuario=User::find($id);
        $usuario->name = $request->name;
        $usuario->password = bcrypt($request->password);
        $usuario->save();        

        $request -> session()->flash('editar', "Usuario editado con exito");
        return redirect()->route('user.index');
    }
    public function destroy(Request $request, $id)
    {
        User::destroy($id);
        $request -> session()->flash('message', "Usuario eliminado");
        return redirect()->route('user.index'); 
    }
    public function iniciar(Request $request, $id)
    {
        //dd($request->all());
        $caja = $request->name;
        $pass = $request->password;
        //dd($usuario);
        $usuario = User::where('name', $caja)->where('password',$pass)->where('id_sucursal',$id)->count();
        return response()->json($usuario);
    }
}