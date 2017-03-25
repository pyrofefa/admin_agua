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
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Tramites')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Tramites')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Aclaraciones y Otros')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Pago')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    //id
    public function lineal_subasunto_tramites_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Tramites')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Tramites')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Pago')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('DATE(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->where('id_sucursal',$id)->orderBy('created_at','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->where('estado',1)->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('subasunto')->groupBy('x')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Tramites')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->where('estado',1)->where('subasunto','Aclaraciones y Otros')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('subasunto')->groupBy('x')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Pago')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Tramites')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_id_aban($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_id_aban($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Tramites')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_id_aban($id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Tramites')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_global()
    {
        $promedio=DB::table('tikets')->selectRaw('DATE(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites()
    {
        $promedio_tramites=DB::table('tikets')->selectRaw('DATE(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->where('subasunto','Tramites')->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones()
    {
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('DATE(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->where('subasunto','Aclaraciones y Otros')->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago()
    {
        $promedio_pago=DB::table('tikets')->selectRaw('DATE(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->where('subasunto','Pago')
                ->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_global_hora()
    {
        $promedio=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->where('estado',1)->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_hora()
    {
        $promedio_tramites=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->where('subasunto','Tramites')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_hora()
    {
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->where('subasunto','Aclaraciones y Otros')->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora()
    {
        $promedio_pago=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('subasunto','Pago')->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_global_hora_fecha($fecha)
    {
        $promedio=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->whereDate('created_at','=',$fecha)->where('estado',1)->groupBy('x')
            ->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_hora_fecha($fecha)
    {
        $promedio_tramites=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->where('subasunto','Tramites')
            ->whereDate('created_at','=',$fecha)->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_hora_fecha($fecha)
    {
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->whereDate('created_at','=',$fecha)
            ->where('subasunto','Aclaraciones y Otros')->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora_fecha($fecha)
    {
        $promedio_pago=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->whereDate('created_at','=',$fecha)
            ->where('subasunto','Pago')->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function lineal_tiempo_espera_global_hora_fecha_id($fecha, $id)
    {
        $promedio=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)
            ->where('estado',1)->groupBy('x')
            ->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_hora_fecha_id($fecha, $id)
    {
        $promedio_tramites=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->where('subasunto','Tramites')
            ->where('id_sucursal',$id)->whereDate('created_at','=',$fecha)->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_acla_hora_fecha_id($fecha, $id)
    {
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->whereDate('created_at','=',$fecha)
            ->where('id_sucursal',$id)->where('subasunto','Aclaraciones y Otros')->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora_fecha_id($fecha, $id)
    {
        $promedio_pago=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->whereDate('created_at','=',$fecha)
            ->where('id_sucursal',$id)->where('subasunto','Pago')->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_fecha($fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Tramites')->whereDate('created_at','=',$fecha)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha($fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Aclaraciones y Otros')->whereDate('created_at','=',$fecha)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha($fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Pago')->whereDate('created_at','=',$fecha)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_fecha_abandonados($fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')
            ->groupBy('x')->where('estado',2)->where('subasunto','Tramites')->whereDate('created_at','=',$fecha)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha_aban($fecha)
    {
         $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->whereDate('created_at','=',$fecha)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha_abandonado($fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->whereDate('created_at','=',$fecha)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function lineal_subasunto_tramites_hora_fecha_id($fecha, $id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Tramites')->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha_id($fecha, $id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Aclaraciones y Otros')->whereDate('created_at','=',$fecha)
            ->where('id_sucursal',$id)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha_id($fecha, $id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',1)->where('subasunto','Pago')->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function lineal_subasunto_tramites_hora_fecha_id_a($fecha, $id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Tramites')->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha_id_a($fecha, $id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Aclaraciones y Otros')->whereDate('created_at','=',$fecha)
            ->where('id_sucursal',$id)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha_id_a($fecha, $id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(created_at) as x, subasunto as name, COUNT(turno) as numero')->groupBy('subasunto')->groupBy('x')->where('estado',2)->where('subasunto','Pago')->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global()
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('DATE(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites()
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('DATE(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Tramites')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones()
    {
         $promedio_atendido=DB::table('tikets')
        ->selectRaw('DATE(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Aclaraciones y Otros')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago()
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('DATE(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Pago')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_hora()
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')
        ->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_hora()
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Tramites')->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones_hora()
    {
         $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora()
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_hora_fecha($fecha)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')
        ->where('estado',1)->whereDate('created_at','=',$fecha)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_hora_fecha($fecha)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Tramites')->whereDate('created_at','=',$fecha)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_acla_hora_fecha($fecha)
    {
         $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Aclaraciones y Otros')->whereDate('created_at','=',$fecha)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora_fecha($fecha)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Pago')->whereDate('created_at','=',$fecha)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_hora_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')
        ->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_hora_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Tramites')->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones_hora_id($id)
    {
         $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Aclaraciones y Otros')->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Pago')->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('DATE(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')
        ->where('estado',1)->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('DATE(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Tramites')->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones_id($id)
    {
         $promedio_atendido=DB::table('tikets')
        ->selectRaw('DATE(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('DATE(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Pago')->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_global_id($id)
    {
        $promedio=DB::table('tikets')->selectRaw('DATE(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)
            ->where('id_sucursal',$id)
            ->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_id($id)
    {
        $promedio_tramites=DB::table('tikets')->selectRaw('DATE(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)
            ->where('id_sucursal',$id)
            ->where('subasunto','Tramites')->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_id($id)
    {
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('DATE(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->where('subasunto','Aclaraciones y Otros')
        ->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_id($id)
    {
        $promedio_pago=DB::table('tikets')->selectRaw('DATE(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->where('subasunto','Pago')->where('id_sucursal',$id)
                ->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_global_hora_id($id)
    {
        $promedio=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('estado',1)->where('id_sucursal',$id)
            ->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_hora_id($id)
    {
        $promedio_tramites=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->where('subasunto','Tramites')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->where('id_sucursal',$id)
            ->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_hora_id($id)
    {
        $promedio_aclaraciones=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->where('subasunto','Aclaraciones y Otros')->where('id_sucursal',$id)
            ->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora_id($id)
    {
        $promedio_pago=DB::table('tikets')->selectRaw('HOUR(created_at) as x, CAST(avg(TIMEDIFF(TIME_to_sec(updated_at) / (60 * 60),TIME_to_sec(created_at) / (60 *60))) AS DECIMAL(10,2)) as numero')->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->where('subasunto','Pago')->where('id_sucursal',$id)
            ->groupBy('x')->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_aten_global_hora_fecha_id($fecha, $id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')
        ->where('estado',1)->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_aten_tramites_hora_fechaid($fecha, $id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Tramites')->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_acla_hora_fechaid($fecha, $id)
    {
         $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Aclaraciones y Otros')->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora_fechaid($fecha, $id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(created_at) as x, cast(avg(time_to_sec(tiempo) / (60 * 60)) as decimal(10, 2)) as numero')->where('estado',1)
        ->where('subasunto','Pago')->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
}