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
        //foreach ($comerciales as $c)
        //{
            

            //$file = file('http://192.168.100.111/turnomatic/public/comercial/'.$c->ruta);
            //$file2 =implode("", $file);
            

            //header("Content-Type: application/octet-stream");
            //header("Content-Disposition: attachment; filename=".$c->ruta);

            //dd($file2);
            //$url = 'http://localhost/turnomatic/public/comercial/'.$c->ruta;
            //$source = file_get_contents($url);
            //file_put_contents('/Applications/AMPPS/www/agua_arriba/system/comerciales/'.$c->ruta, $source);
            //dd('Se ha descargado el CSV');
            //\File::copy('http://192.168.100.111/turnomatic/public/comercial/'.$c->ruta, '/Users/teknol/Desktop/comerciales'.$c->ruta );
        //}
        
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
            if($ancho == 1366 || $alto == 641)
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


    protected function downloadFile($src)
    {
        if(is_file($src)){
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $content_type = finfo_file($finfo, $src);
            finfo_close($finfo);
            $file_name = basename($src).PHP_EOL;
            $size = filesize($src);
            header("Content-Type: $content_type");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: $size");
            readfile($src);
            return true;
        } else{
            return false;
        }
    }
}