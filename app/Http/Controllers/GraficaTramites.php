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
       $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, asunto as name, COUNT(turno) as numero')
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
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, asunto as name, COUNT(turno) as numero')
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
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, asunto as name, COUNT(turno) as numero')
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
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, asunto as name, COUNT(turno) as numero')
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
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, asunto as name, COUNT(turno) as numero')
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
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, asunto as name, COUNT(turno) as numero')
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
    public function promedio_atendido_contrato()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','Contrato')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_convenio()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','Convenio')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_cambio()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','Cambio de nombre')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_carta()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','Carta de adeudo')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_factibilidad()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','Factibilidad')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_dosomas()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','2 o mas tramites')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function promedio_espera_contrato()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero ')
            ->where('estado',1)
            ->where('asunto','Contrato')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
         //dd($promedio_atendido);   
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_convenio()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero ')
            ->where('estado',1)
            ->where('asunto','Convenio')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_cambio()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero ')
            ->where('estado',1)
            ->where('asunto','Cambio de nombre')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_carta()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero ')
            ->where('estado',1)
            ->where('asunto','Carta de adeudo')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_factibilidad()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero ')
            ->where('estado',1)
            ->where('asunto','Factibilidad')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_dosomas()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero ')
            ->where('estado',1)
            ->where('asunto','2 o mas tramites')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }


    public function promedio_atendido_contrato_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','Contrato')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_convenio_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','Convenio')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_cambio_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','Cambio de nombre')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_carta_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','Carta de adeudo')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_factibilidad_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','Factibilidad')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_dosomas_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
            ->where('estado',1)
            ->where('asunto','2 o mas tramites')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function promedio_espera_contrato_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
            ->where('estado',1)
            ->where('asunto','Contrato')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_convenio_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
            ->where('estado',1)
            ->where('asunto','Convenio')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_cambio_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
            ->where('estado',1)
            ->where('asunto','Cambio de nombre')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_carta_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
            ->where('estado',1)
            ->where('asunto','Carta de adeudo')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_factibilidad_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
            ->where('estado',1)
            ->where('asunto','Factibilidad')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_dosomas_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('MONTH(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
            ->where('estado',1)
            ->where('asunto','2 o mas tramites')
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
}