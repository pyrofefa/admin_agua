<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GraficaTramites extends Controller
{
    public function grafica_contrato_fecha($fecha, $fecha_dos)
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Contrato')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_convenio_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Convenio')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodenombre_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Cambio de nombre')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cartadenoadeudo_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Carta de adeudo')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_factibilidad_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Factibilidad')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_dosomastramites_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','2 o mas tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_contrato_id_fecha($id, $fecha, $fecha_dos)
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Contrato')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_convenio_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Convenio')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodenombre_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Cambio de nombre')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cartadenoadeudo_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Carta de adeudo')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_factibilidad_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Factibilidad')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_dosomastramites_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','2 o mas tramites')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_contrato()
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Contrato')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')            
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_convenio()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Convenio')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodenombre()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Cambio de nombre')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cartadenoadeudo()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Carta de adeudo')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_factibilidad()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Factibilidad')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_dosomastramites()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','2 o mas tramites')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_contrato_id($id)
    {
       $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Contrato')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')            
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_convenio_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Convenio')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodenombre_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Cambio de nombre')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cartadenoadeudo_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Carta de adeudo')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_factibilidad_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','Factibilidad')
            ->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_dosomastramites_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, asunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('asunto','2 o mas tramites')
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