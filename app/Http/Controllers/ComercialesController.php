<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comercial;

class ComercialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
    }
    public function index()
    {
        $comerciales = Comercial::all();
        return view('comerciales.index',compact('comerciales'));
    }
    public function mostrar()
    {
        $comerciales = Comercial::all();
        return response()->json($comerciales);
    }
    public function create()
    {
        
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        $tipo = $request->input('tipo');

        //dd($file);

        $tamaño = getimagesize($file);
        $ancho = $tamaño[0];
        $alto = $tamaño[1];

        $mimetype = \File::mimeType($file);
        //dd($mimetype);

        if ($mimetype == 'image/jpeg'|| $mimetype == 'image/png')
        {
            if($ancho == 1366 || $alto == 41)
            {    
                $nombre = $file->getClientOriginalName();
                \Storage::disk('public')->put($nombre,  \File::get($file));
                    
                $comercial = new Comercial;
                $comercial->ruta = $nombre;
                $comercial->tipo = $tipo;
                $comercial->save();
                $request -> session()->flash('nuevo', "Comercial Agregado con exito");
                return redirect()->route('comerciales.index');    
            }
            else
            {
                $request -> session()->flash('formato', "Las dimensiones son incorrectas");
                return redirect()->route('comerciales.index');  
            }
        }
        else if($mimetype == 'video/mp4')
        {
            $nombre = $file->getClientOriginalName();
            \Storage::disk('public')->put($nombre,  \File::get($file));
                    
            $comercial = new Comercial;
            $comercial->ruta = $nombre;
            $comercial->tipo = $tipo;
            $comercial->save();
            $request -> session()->flash('nuevo', "Comercial Agregado con exito");
            return redirect()->route('comerciales.index');
        }
        else
        {
            $request -> session()->flash('formato', "El Formato es incorrecto");
            return redirect()->route('comerciales.index');  
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $comerciales = Comercial::find($id);
        return view('comerciales.edit',compact('comerciales'));
    }
    public function update(Request $request, $id)
    {
        $file = $request->file('file');
        $tipo = $request->input('tipo');

        $mimetype = \File::mimeType($file);

        if ($mimetype == 'video/mp4' || $mimetype == 'image/jpeg'|| $mimetype == 'image/png')
        {
            $file = $request->file('file');
            $tipo = $request->input('tipo');

            $nombre = $file->getClientOriginalName();
            \Storage::disk('public')->put($nombre,  \File::get($file));
                    
            $comercial = Comercial::find($id);;
            $comercial->ruta = $nombre;
            $comercial->tipo = $tipo;
            $comercial->save();
            $request -> session()->flash('editar', "Comercial Editado con exito");
            return redirect()->route('comerciales.index');  
         }
         else
         {
            $request -> session()->flash('formato', "El Formato es incorrecto");
            return redirect()->route('comerciales.index'); 
         }   
    }
    public function destroy(Request $request, $id)
    {
        $file = $request->ruta;
        if( \Storage::disk('public')->exists($file))
        {
            \Storage::disk('public')->delete($file);
            Comercial::destroy($id);
            $request -> session()->flash('message', "El registro fue eliminado");
            return redirect()->route('comerciales.index');    
        }
        else
        {
            Comercial::destroy($id);
            $request -> session()->flash('message', "El registro fue eliminado");
            return redirect()->route('comerciales.index');    
        }
    }
}
