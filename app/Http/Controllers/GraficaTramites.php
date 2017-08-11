<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;


class GraficaTramites extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        Carbon::setLocale('es');
    }
    public function grafica_contrato_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Contrato')
                 ->where(DB::raw('DATE(tikets.created_at)'),'>=',$fecha)
                 ->where(DB::raw('DATE(tikets.created_at)'),'<=',$fecha_dos);
            })            
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_convenio_fecha($fecha, $fecha_dos)
    {
         $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Convenio')
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
    public function grafica_cambiodenombre_fecha($fecha, $fecha_dos)
    {
         $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de nombre')
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
    public function grafica_cartadenoadeudo_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Carta de adeudo')
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
    public function grafica_factibilidad_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Factibilidad')
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
    public function grafica_dosomastramites_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','2 o mas tramites')
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
    public function grafica_solicitud_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de tarifa social')
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
    public function grafica_baja_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Baja por impago')
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
    public function grafica_contrato_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Contrato')
                 ->where('id_sucursal','=',$id)
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
    public function grafica_convenio_id_fecha($id, $fecha, $fecha_dos)
    {
         $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Convenio')
                 ->where('id_sucursal','=',$id)
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
    public function grafica_cambiodenombre_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de nombre')
                 ->where('id_sucursal','=',$id)
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
    public function grafica_cartadenoadeudo_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Carta de adeudo')
                 ->where('id_sucursal','=',$id)
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
    public function grafica_factibilidad_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Factibilidad')
                 ->where('id_sucursal','=',$id)
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
    public function grafica_dosomastramites_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','2 o mas tramites')
                 ->where('id_sucursal','=',$id)
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
    public function grafica_solicitud_tarifa_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de tarifa social')
                 ->where('id_sucursal','=',$id)
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
    public function grafica_baja_id_fecha($id, $fecha, $fecha_dos)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id, $fecha, $fecha_dos){
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Baja por impago')
                 ->where('id_sucursal','=',$id)
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


    
    public function grafica_contrato()
    {

        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Contrato')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_convenio()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Convenio')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodenombre()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de nombre')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cartadenoadeudo()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Carta de adeudo')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_factibilidad()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Factibilidad')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_dosomastramites()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','2 o mas tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_tarifasocial()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de tarifa social')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_bajaporimpago()
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Baja por impago')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_contrato_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Contrato')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_convenio_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Convenio')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
        })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();
        
        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cambiodenombre_id($id)
    {
           $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Cambio de nombre')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_cartadenoadeudo_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Carta de adeudo')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_factibilidad_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','Factibilidad')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        //dd($tiket); 
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_dosomastramites_id($id)
    {
        $tiket = DB::table('horas')
        ->selectRaw('HOUR(horas.hora) as x, tikets.asunto as name, COUNT(tikets.turno) as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('Hour(tikets.llegada)'),'=', DB::raw('Hour(horas.hora)'))
                 ->where('tikets.estado', '=', 1)
                 ->where('id_sucursal','=',$id)
                 ->where('tikets.asunto','=','2 o mas tramites')
                 ->where(DB::raw('Date(tikets.created_at)'), '=', date('Y-m-d'));
            })
        ->groupBy('horas.hora')
        ->orderBy('x','ASC')
        ->get();

        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_contrato()
    {
        
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Contrato')
                 ->where('fin', '<>', '00:00:00');
             })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();    
        
        //dd($promedio_atendido);
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_convenio()
    {
        
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Convenio')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();    
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_cambio()
    {
       
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de nombre')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_carta()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Carta de adeudo')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_factibilidad()
    {
        
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Factibilidad')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();    
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_dosomas()
    {

        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','2 o mas tramites')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_tarifasocial()
    {

        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de tarifa social')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
      public function promedio_atendido_bajaporimpago()
    {

        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Baja por impago')
                 ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function promedio_espera_contrato()
    {

        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Contrato');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_convenio()
    {

        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Convenio');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();


        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_cambio()
    {
      
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Cambio de nombre');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_carta()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Carta de adeudo');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_factibilidad()
    {

        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Factibilidad');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_dosomas()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','2 o mas tramites');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_tarifasocial()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Solicitud de tarifa social');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_bajaporimpago()
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, 
            CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                 ->where('tikets.estado', '=', 1)
                 ->where('tikets.asunto','=','Baja por impago');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    
    public function promedio_atendido_contrato_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Contrato')
                ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_convenio_id($id)
    {
         $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Convenio')
                ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_cambio_id($id)
    {
         $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Cambio de nombre')
                ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_carta_id($id)
    {
         $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Carta de adeudo')
                ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_factibilidad_id($id)
    {
         $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Factibilidad')
                ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_atendido_dosomas_id($id)
    {
         $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(fin,atendido)) / 60) / COUNT(turno)  as DECIMAL(10,2))  AS numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','2 o mas tramites')
                ->where('fin', '<>', '00:00:00');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_contrato_id($id)
    {

         $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Contrato');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_convenio_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Convenio');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_cambio_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Cambio de nombre');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_carta_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Carta de adeudo');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();

        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_factibilidad_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','Factibilidad');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function promedio_espera_dosomas_id($id)
    {
        $promedio_atendido = DB::table('meses')
        ->selectRaw('meses.mes as x, tikets.asunto, CAST(Sum(TIME_TO_SEC(TIMEDIFF(atendido,llegada)) / 60) / COUNT(turno)  as DECIMAL(10,2))  as numero')
        ->leftjoin('tikets', function ($join) use($id) {
            $join->on(DB::raw('MONTH(tikets.created_at)'),'=', DB::raw('meses.numero'))
                ->where('tikets.estado', '=', 1)
                ->where('id_sucursal','=',$id)
                ->where('tikets.asunto','=','2 o mas tramites');
            })
        ->groupBy('meses.mes')
        ->orderBy('meses.numero','ASC')
        ->get();
        
        $json = json_encode($promedio_atendido,JSON_NUMERIC_CHECK);
        return $json;
    }
}