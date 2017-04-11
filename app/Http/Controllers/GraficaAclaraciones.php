<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GraficaAclaraciones extends Controller
{
    public function grafica_altoconsumo_fecha($fecha, $fecha_dos)
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_reconexion_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Reconexión de servicio')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_errorenlectura_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Error en lectura')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_notoma_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','No toma lectura')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_noentrega_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','No entrega de recibo')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodetarifa_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Cambio de tarifa')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_solicitud_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Solicitud de medidor')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_otrostramites_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Otros tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_altoconsumo_id_fecha($id, $fecha, $fecha_dos)
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_reconexion_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Reconexión de servicio')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_errorenlectura_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Error en lectura')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_notoma_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','No toma lectura')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_noentrega_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','No entrega de recibo')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodetarifa_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Cambio de tarifa')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_solicitud_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Solicitud de medidor')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_otrostramites_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Otros tramites')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_altoconsumo()
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_reconexion()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Reconexión de servicio')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_errorenlectura()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Error en lectura')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_notoma()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','No toma lectura')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_noentrega()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','No entrega de recibo')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodetarifa()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Cambio de tarifa')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_solicitud()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Solicitud de medidor')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_otrostramites()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Otros tramites')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }


    public function grafica_altoconsumo_id($id)
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Alto consumo (con y sin medidor)')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_reconexion_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Reconexión de servicio')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_errorenlectura_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Error en lectura')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_notoma_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','No toma lectura')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_noentrega_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','No entrega de recibo')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodetarifa_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Cambio de tarifa')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_solicitud_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Solicitud de medidor')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_otrostramites_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Otros tramites')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
}