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

        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Alto consumo (con y sin medidor)');
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_reconexion_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Reconexión de servicio');
            })->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_errorenlectura_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Error en lectura');
            })->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_notoma_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No toma lectura');
                
            })->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_noentrega_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No entrega de recibo');
 
            })->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodetarifa_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de tarifa');

        })->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
         ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_solicitud_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))                  
                ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de medidor');
 
             })->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_otrostramites_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Otros tramites')
                 ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'");
            })->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_altoconsumo_id_fecha($id, $fecha, $fecha_dos)
    {

        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Alto consumo (con y sin medidor)')
                 ->where('id_sucursal','=',$id);
 
            })->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")            
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_reconexion_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Reconexión de servicio')
                 ->where('id_sucursal','=',$id);
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_errorenlectura_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Error en lectura')
                 ->where('id_sucursal','=',$id);
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_notoma_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No toma lectura')
                 ->where('id_sucursal','=',$id);
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_noentrega_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No entrega de recibo')
                 ->where('id_sucursal','=',$id);
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodetarifa_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de tarifa')
                 ->where('id_sucursal','=',$id);
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_solicitud_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de medidor')
                 ->where('id_sucursal','=',$id);
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_otrostramites_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Otros tramites')
                 ->where('id_sucursal','=',$id);
            })            
        ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_altoconsumo()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Alto consumo (con y sin medidor)')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_reconexion()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Reconexion de servicio')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_errorenlectura()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Error en lectura')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_notoma()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No toma lectura')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_noentrega()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No entrega de recibo')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodetarifa()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de tarifa')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_solicitud()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de medidor')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_otrostramites()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Otros tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }




    public function grafica_altoconsumo_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Alto consumo (con y sin medidor)')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_reconexion_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Reconexión de servicio')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_errorenlectura_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Error en lectura')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_notoma_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','No toma lectura')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_noentrega_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','No entrega de recibo')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodetarifa_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Cambio de tarifa')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_solicitud_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Solicitud de medidor')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_otrostramites_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Otros tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    
    public function promedio_atendido_altoconsumo()
    {

        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Alto consumo (con y sin medidor)')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();    

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_reconexion()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Reconexion de servicio')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_errorenlectura()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Error en lectura')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_notoma()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No toma lectura')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_noentrega()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No entrega de recibo')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_cambiotarifa()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de tarifa')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_solicitud()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de medidor')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_otros()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Otros tramites')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_altoconsumo()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Alto consumo (con y sin medidor)');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_reconexion()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Reconexion de servicio');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_errordelectura()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Error en lectura');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_notoma()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No toma lectura');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_noentrega()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','No entrega de recibo');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_cambiodetarifa()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de tarifa');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_solicitu()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de medidor');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_otros()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Otros tramites');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_altoconsumo_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Alto consumo (con y sin medidor)')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_reconexion_id($id)
    {
         $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Reconexion de servicio')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_errorenlectura_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Error en lectura')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_notoma_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','No toma lectura')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_noentrega_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','No entrega de recibo')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_cambiotarifa_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Cambio de tarifa')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_solicitud_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Solicitud de medidor')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_otros_id($id)
    {
        $promedio_atendido = DB::table('meses')
         ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')        
            ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Otros tramites')
                ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function promedio_espera_altoconsumo_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Alto consumo (con y sin medidor)');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_reconexion_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Reconexion de servicio');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_errordelectura_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Error en lectura');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_notoma_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','No toma lectura');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_noentrega_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','No entrega de recibo');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_cambiodetarifa_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Cambio de tarifa');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_solicitu_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Solicitud de medidor');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_otros_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Otros tramites');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
        
    }
}