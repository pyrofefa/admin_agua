<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Folios;
use App\Tiket;
use App\User;
use App\Comercial;

class apiController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
    }
    /******
        Turnomatic
    ******/
    //trayendo folios
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
    //actualizando folios
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
    //agregando nuevo tiket
    public function agregar_tiket_pagos(Request $request)
    {

        $id = $request->id_sucursal;
        
        $tiket = new Tiket($request->all());
        $tiket->save();

        $folio = Folios::where('tipo','=','pagos')->where('id_sucursal','=', $id)->first();
        $folio->numero = $request->turno+1;
        $folio->save();


        return "tiket agregado con exito";
    }
    public function agregar_tiket_aclaraciones(Request $request)
    {

        $id = $request->id_sucursal;

        $tiket = new Tiket($request->all());
        $tiket->save();

        $folio = Folios::where('tipo','=','aclaraciones')->where('id_sucursal','=', $id)->first();
        $folio->numero = $request->turno+1;
        $folio->save();

        return "tiket agregado con exito";
    }
    /******
        Mostrador
    ******/
    public function mostrar()
    {
        $comerciales = Comercial::all();
        //header("Content-Type: image/png");
        // Se va a llamar descarga.pdf 
        //header('Content-Disposition: attachment; filename="Agua.png"');             
        // La fuente del PDF se encuentra en original.pdf 
        //readfile('AguaLogo.png');
        
        foreach ($comerciales as $c)
        {
            /*header("Content-Type: image/png");
            // Se va a llamar descarga.pdf 
            header('Content-Disposition: attachment; filename="Agua.png"');             
            // La fuente del PDF se encuentra en original.pdf 
            readfile('http://localhost/turnomatic/public/comercial/AguaLogo.png');*/

           // $r = $_FILES[$c->ruta];
            //dd($r);
            //$destination = '/Users/teknol/Desktop/comerciales/';
            //move_uploaded_file($c->ruta, $destination);
            
            //var_dump($x);

            //$imagen = file_get_contents("http://192.168.100.111/turnomatic/public/comercial/".$c->ruta);
            //$save = file_put_contents('http://192.168.100.132/agua_comerciales/'.$c->ruta,$imagen);

            //\File::copy('http://192.168.100.111/turnomatic/public/comercial/'.$c->ruta, 'http://192.168.100.132/agua_comerciales/'.$c->ruta );
            //$pathToFile = public_path().'/comercial/'.$c->ruta;
            //return response()->download($pathToFile);
        }

        
        //Direccion local del archivo que queremos subir
        $fileLocal = public_path().'/comercial/AguaLogo.png';
        /*Direccion remota donde queremos subir el archivo
        En este caso seria a la raiz del servidor*/
        $fileRemote = '/AguaLogo.png';
        $mode = 'FTP_BINARY';
        //Hacemos el upload
        \FTP::connection()->uploadFile($fileLocal,$fileRemote,$mode);
        //\FTP::connection()->makeDir('pathname');


        //Detenemos la funcion con un mensajes
        return('Operación realizada con éxito');

        /*$fileLocal = public_path().'/comercial/AguaLogo.png';
        $fileRemote= '/AguaLogo.png';
        $mode = 'FTP_BINARY';
        
        $ftp_server = "192.168.100.132";
        $ftp_user = "";
        $ftp_pass = "bar";

        // establecer una conexión o finalizarla
        $conn_id = ftp_connect($ftp_server) or die("No se pudo conectar a $ftp_server");         return('Operación realizada con éxito');

        //return response()->json($comerciales);*/
    }
    /******
        Usuarios
    ******/
    public function iniciar(Request $request, $id)
    {
        //dd($request->all());
        $caja = $request->name;
        $pass = $request->password;
        //dd($usuario);
        $usuario = User::where('name', $caja)->where('password',$pass)->where('id_sucursal',$id)->count();
        return response()->json($usuario);
    }
    public function mostrar_pagos($id)
    {
        $turno=Tiket::where('estado', 0)->where('subasunto','Pago')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        //dd($turno);
        return [$turno];
    }
    public function actualizar_tiket(Request $request, $id)
    {
        $tiket = Tiket::find($id);
        $tiket -> update($request->all());
        return response()->json($tiket);
    }
    public function mostrar_aclaraciones($id)
    {
        $turno=Tiket::where('estado', 0)->whereRaw("(subasunto = 'Aclaraciones y Otros' or subasunto = 'Tramites')")
            ->where('id_sucursal',$id)->whereRaw('Date(tikets.created_at) = CURDATE()')->first();
        return [$turno];
    }    

}