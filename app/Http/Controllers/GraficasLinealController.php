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
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
       
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
         
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_id_aban($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
         
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_id_aban($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_id_aban($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_abandonados()
    {
         $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('tikets.subasunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
    
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_abandonados()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_abandonados()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }


    public function lineal_tiempo_espera_global()
    {
        $promedio=DB::table('tikets')
    ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2)) as numero')
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
    ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2)) as numero')
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
    ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2)) as numero')
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
    ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2)) as numero')
            ->where('estado',1)->where('subasunto','Pago')->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_global_hora()
    {
        $promedio = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_hora()
    {
        $promedio_tramites = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) as y, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('subasunto','=','Tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($promedio_tramites); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_hora()
    {
        $promedio_aclaraciones = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) as y, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('subasunto','=','Aclaraciones y Otros')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($promedio_aclaraciones); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora()
    {
        $promedio_pago = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name,  count(turno) as y,CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('subasunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($promedio_pago); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function lineal_tiempo_espera_global_hora_fecha($fecha, $fecha_dos)
    {
        $promedio=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x,CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero ')
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

        $promedio_tramites = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);

             })         
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_hora_fecha($fecha, $fecha_dos)
    {
         $promedio_aclaraciones = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })         
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora_fecha($fecha, $fecha_dos)
    {
        $promedio_pago = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Pago')
                 ->where('atendido', '<>', '00:00:00')
                ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);

             })          
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }
    
    public function lineal_tiempo_espera_global_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $promedio=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
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
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
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
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero')
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
            ->selectRaw('HOUR(llegada) as x, CAST(AVG(timestampdiff(SECOND, llegada, atendido )) / 60  as DECIMAL(10,2)) as numero ')
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
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })          
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })          
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Pago')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })          
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_tramites_hora_fecha_abandonados($fecha, $fecha_dos)
    {

        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })          
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha_aban($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })          
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha_abandonado($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('tikets.subasunto','=','Pago')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })          
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function lineal_subasunto_tramites_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('tikets')->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->where('id_sucursal',$id)
            ->groupBy('subasunto')
            ->groupBy('x')            
            ->orderBy('x','ASC')->get();   
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
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
    public function lineal_subasunto_pagos_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x, subasunto as name, COUNT(turno) as numero')
            ->where('estado',1)
            ->where('subasunto','Pago')
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
    public function lineal_subasunto_tramites_hora_fecha_id_a($fecha, $fecha_dos, $id)
    {
         $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) AS numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })          
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_aclaraciones_hora_fecha_id_a($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) AS numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })          
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_subasunto_pagos_hora_fecha_id_a($fecha, $fecha_dos, $id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, count(turno) AS numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 2)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Pago')
                 ->where('atendido', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })          
        ->groupBy('horas.hora')
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
    ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS    numero')
            ->where('estado',1)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites()
    {
        $promedio_atendido=DB::table('tikets')
    ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS    numero')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones()
    {
        $promedio_atendido=DB::table('tikets')
    ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS    numero')
            ->where('estado',1)->where('subasunto','Aclaraciones y Otros')
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago()
    {
        $promedio_atendido=DB::table('tikets')
    ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS    numero')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_hora()
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('HOUR(llegada) as x, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2))  as numero')
        ->where('estado',1)->whereRaw('Date(tikets.created_at) = CURDATE()')
        ->groupBy('x')->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_hora()
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno) as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones_hora()
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno) as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora()
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno) as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_hora_fecha($fecha, $fecha_dos)
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno) as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Pago')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_hora_fecha($fecha, $fecha_dos)
    {
         $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno) as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where('tikets.fin','<>','00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })            
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_acla_hora_fecha($fecha, $fecha_dos)
    {
         $promedio_atendido = DB::table('horas')
        ->selectRaw('tikets.id,count(turno),HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno) as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where('tikets.fin','<>','00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })          
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();


        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora_fecha($fecha, $fecha_dos)
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno) as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Pago')
                 ->where('tikets.fin','<>','00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })            
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_hora_id($id)
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'))
                 ->where('tikets.fin', '<>', '00:00:00');
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;

    }
    public function promedio_tiempo_atencion_tramites_hora_id($id)
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'))
                 ->where('tikets.fin', '<>', '00:00:00');
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones_hora_id($id)
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'))
                 ->where('tikets.fin', '<>', '00:00:00');
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

         $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora_id($id)
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.subasunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'))
                 ->where('tikets.fin', '<>', '00:00:00');
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_global_id($id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('DATE(created_at) as x, CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2))  as numero')
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
        ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
            ->where('estado',1)
            ->where('subasunto','Tramites')
            ->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('x')
            ->orderBy('x','ASC')->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_aclaraciones_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
            ->where('estado',1)
            ->where('subasunto','Aclaraciones y Otros')
            ->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->whereRaw("fin <> '00:00:00'")
            ->groupBy('x')
            ->orderBy('x','ASC')
            ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_id($id)
    {
        $promedio_atendido=DB::table('tikets')
        ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
            ->where('estado',1)
            ->where('subasunto','Pago')
            ->where('id_sucursal',$id)
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->whereRaw("fin <> '00:00:00'")
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
            ->selectRaw('DATE(created_at) as x,CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
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
            ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
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
            ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
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
            ->selectRaw('DATE(created_at) as x, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as tiempo')
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
       
        $promedio = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'))
                 ->where('tikets.atendido', '<>', '00:00:00');
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();        

        //dd($promedio); 
        $json = json_encode($promedio,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_tramites_hora_id($id)
    {
        $promedio_tramites = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('subasunto','=','Tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'))
                 ->where('tikets.atendido', '<>', '00:00:00');
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($promedio_tramites); 
        $json = json_encode($promedio_tramites,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_aclaraciones_hora_id($id)
    {
        $promedio_aclaraciones = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('subasunto','=','Aclaraciones y Otros')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'))
                 ->where('tikets.atendido', '<>', '00:00:00');
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($promedio_aclaraciones,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function lineal_tiempo_espera_pago_hora_id($id)
    {
        $promedio_pago = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('subasunto','=','Pago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'))
                 ->where('tikets.atendido', '<>', '00:00:00');
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($promedio_pago,JSON_NUMERIC_CHECK);
        return $json;
    }

    //tiempo de atencion
    public function promedio_tiempo_aten_global_hora_fecha_id($fecha, $fecha_dos, $id)
    {
        $promedio_atendido=DB::table('tikets')
            ->selectRaw('HOUR(llegada) as x,  CAST(SEC_TO_TIME(AVG(TIME_TO_SEC(tiempo) / 60 )) As decimal(10,2))   as numero')
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
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)')) 
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Tramites')
                 ->where('id_sucursal','=',$id)
                 ->where('fin', '<>', '00:00:00')
                  ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_acla_hora_fechaid($fecha, $fecha_dos, $id)
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)')) 
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Aclaraciones y Otros')
                 ->where('id_sucursal','=',$id)
                 ->where('fin', '<>', '00:00:00')
                  ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })           
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
       
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_tiempo_atencion_pago_hora_fechaid($fecha, $fecha_dos, $id)
    {
        $promedio_atendido = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)')) 
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.subasunto','=','Pago')
                 ->where('id_sucursal','=',$id)
                 ->where('fin', '<>', '00:00:00')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })            
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
}