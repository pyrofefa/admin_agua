<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GraficasLinealController extends Controller
{
    public function lineal_subasunto_tramites()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)->where('subasunto','Tramites')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',2)->where('subasunto','Tramites')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)->where('subasunto','Aclaraciones y Otros')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',2)->where('subasunto','Aclaraciones y Otros')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)->where('subasunto','Pago')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',2)->where('subasunto','Pago')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    //id
    public function lineal_subasunto_tramites_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)->where('subasunto','Tramites')->where('id_sucursal',$id)->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',2)->where('subasunto','Tramites')->where('id_sucursal',$id)->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',2)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)->where('subasunto','Pago')->where('id_sucursal',$id)->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',2)->where('subasunto','Pago')->where('id_sucursal',$id)->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('subasunto')->groupBy('x')
            ->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->where('estado',1)->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('subasunto')->groupBy('x')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Tramites')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->where('estado',1)->where('subasunto','Aclaraciones y Otros')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('subasunto')->groupBy('x')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Pago')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Tramites')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_id_aban($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_id_aban($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Tramites')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_id_aban($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Tramites')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }


    public function lineal_tiempo_espera_global()
    {
        $promedio=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x,CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero ')
            ->where('estado',1)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites()
    {
        $promedio_tramites=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero')
            ->where('estado',1)->where('subasunto','Tramites')
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones()
    {
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero')
            ->where('estado',1)->where('subasunto','Aclaraciones y Otros')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago()
    {
        $promedio_pago=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero')
            ->where('estado',1)->where('subasunto','Pago')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_global_hora()
    {
        $promedio=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->where('estado',1)
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_hora()
    {
        $promedio_tramites=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero')
            ->where('estado',1)->where('subasunto','Tramites')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($promedio_tramites); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_hora()
    {
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero ')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('subasunto','Aclaraciones y Otros')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();

        //dd($promedio_aclaraciones); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora()
    {
        $promedio_pago=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero ')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('subasunto','Pago')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        
        //dd($promedio_pago); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_global_hora_fecha($fecha, $fecha_dos)
    {
        $promedio=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x,CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero ')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->where('estado',1)
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_hora_fecha($fecha, $fecha_dos)
    {
        $promedio_tramites=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero ')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_hora_fecha($fecha, $fecha_dos)
    {
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero ')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->where('subasunto','Aclaraciones y Otros')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora_fecha($fecha, $fecha_dos)
    {
        $promedio_pago=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x,CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero ')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->where('subasunto','Pago')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function lineal_tiempo_espera_global_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $promedio=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->where('id_sucursal',$id)
            ->where('estado',1)
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $promedio_tramites=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('id_sucursal',$id)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_acla_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->where('id_sucursal',$id)
            ->where('subasunto','Aclaraciones y Otros')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($promedio_aclaraciones); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $promedio_pago=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(TIMESTAMPDIFF(MINUTE,llegada,atendido)) as DECIMAL(10,0)) as numero ')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->where('id_sucursal',$id)
            ->where('subasunto','Pago')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    //fin tiempo de espera



    public function lineal_subasunto_tramites_hora_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('subasunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('subasunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('subasunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_fecha_abandonados($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',2)
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('subasunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha_aban($fecha, $fecha_dos)
    {
         $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',2)
            ->where('subasunto','Aclaraciones y Otros')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('subasunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha_abandonado($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',2)
            ->where('subasunto','Pago')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('subasunto')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function lineal_subasunto_tramites_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x_tramites, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('subasunto')
            ->groupBy('x_tramites')            
            ->orderBy('x_tramites','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x_aclaraciones, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('subasunto')
            ->groupBy('x_aclaraciones')
            ->orderBy('x_aclaraciones','ASC')
            ->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x_pago, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('subasunto')
            ->groupBy('x_pago')
            ->orderBy('x_pago','ASC')
            ->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_fecha_id_a($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',2)
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('subasunto')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha_id_a($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->groupBy('subasunto')
            ->groupBy('x')
            ->where('estado',2)
            ->where('subasunto','Aclaraciones y Otros')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->orderBy('x','ASC')
            ->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha_id_a($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->groupBy('subasunto')
            ->groupBy('x')
            ->where('estado',2)
            ->where('subasunto','Pago')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->orderBy('x','ASC')
            ->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }

    //tiempo de atencion
    public function promedio_tiempo_atencion_global()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
            ->where('estado',1)->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
            ->where('estado',1)->where('subasunto','Tramites')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x,CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
            ->where('estado',1)->where('subasunto','Aclaraciones y Otros')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago()
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
            ->where('estado',1)->where('subasunto','Pago')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_hora()
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
        ->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_hora()
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
        ->where('estado',1)
        ->where('subasunto','Tramites')->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones_hora()
    {
         $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
        ->where('estado',1)
        ->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora()
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
        ->where('estado',1)
        ->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_hora_fecha($fecha, $fecha_dos)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
        ->where('estado',1)
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
        ->groupBy('x')
        ->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_hora_fecha($fecha, $fecha_dos)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
        ->where('estado',1)
        ->where('subasunto','Tramites')
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
        ->groupBy('x')
        ->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_acla_hora_fecha($fecha, $fecha_dos)
    {
         $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
        ->where('estado',1)
        ->where('subasunto','Aclaraciones y Otros')
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
        ->groupBy('x')
        ->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora_fecha($fecha, $fecha_dos)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
        ->where('estado',1)
        ->where('subasunto','Pago')
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
        ->groupBy('x')->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_hora_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
        ->where('estado',1)
        ->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->where('id_sucursal',$id)
        ->groupBy('x')
        ->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_hora_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        //->selectRaw('HOUR(llegada) as x, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo))) AS TIME) AS numero')
        ->selectRaw('HOUR(llegada) as x_tramites, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
        ->where('estado',1)
        ->where('subasunto','Tramites')
        ->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->where('id_sucursal',$id)
        ->groupBy('x_tramites')
        ->orderBy('x_tramites','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones_hora_id($id)
    {
         $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x_aclaraciones, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
        ->where('estado',1)
        ->where('subasunto','Aclaraciones y Otros')
        ->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->where('id_sucursal',$id)
        ->groupBy('x_aclaraciones')
        ->orderBy('x_aclaraciones','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x_pago,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2)) AS numero')
        ->where('estado',1)
        ->where('subasunto','Pago')
        ->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->where('id_sucursal',$id)
        ->groupBy('x_pago')
        ->orderBy('x_pago','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0)) as numero')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }

    //tiempo de espera
    public function lineal_tiempo_espera_global_id($id)
    {
        $promedio=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as tiempo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_id($id)
    {
        $promedio_tramites=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as tiempo')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->where('subasunto','Tramites')
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_id($id)
    {
        $promedio_aclaraciones=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as tiempo')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();

        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_id($id)
    {
        $promedio_pago=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as tiempo')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_global_hora_id($id)
    {
        $promedio=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x_global, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('x_global')
            ->orderBy('x_global','ASC')
            ->get();
        //dd($promedio); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_hora_id($id)
    {
        $promedio_tramites=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x_tramites, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('id_sucursal',$id)
            ->groupBy('x_tramites')
            ->orderBy('x_tramites','ASC')
            ->get();
        //dd($promedio_tramites); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_hora_id($id)
    {
        $promedio_aclaraciones=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x_aclaraciones, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('subasunto','Aclaraciones y Otros')
            ->where('id_sucursal',$id)
            ->groupBy('x_aclaraciones')
            ->orderBy('x_aclaraciones','ASC')
            ->get();
        
        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora_id($id)
    {
        $promedio_pago=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x_pago, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
            ->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('subasunto','Pago')
            ->where('id_sucursal',$id)
            ->groupBy('x_pago')
            ->orderBy('x_pago','ASC')
            ->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }

    //tiempo de atencion
    public function promedio_tiempo_aten_global_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x,  CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as numero')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_aten_tramites_hora_fechaid($fecha, $fecha_dos, $id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as numero')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->where('id_sucursal',$id)
            ->groupBy('x')->orderBy('x','ASC')
            ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_acla_hora_fechaid($fecha, $fecha_dos, $id)
    {
         $promedio_atendido=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as numero')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora_fechaid($fecha, $fecha_dos, $id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(time_to_sec(tiempo)/ 60) AS decimal(10,0))  as numero')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
            ->where('id_sucursal',$id)
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
}