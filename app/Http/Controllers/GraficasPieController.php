<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GraficasPieController extends Controller
{
    
    public function grafica_subasunto()
    {
        $tiket = DB::table('tikets')->selectRaw('subasunto as name, count(subasunto) as y, created_at')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('subasunto')->where('estado',1)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_subasunto_abandonado()
    {
        $tiket = DB::table('tikets')->selectRaw('subasunto as name, count(subasunto) as y, created_at')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('subasunto')->where('estado',2)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_subasunto_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('subasunto as name, count(subasunto) as y, created_at')->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('subasunto')->where('estado',1)->where('id_sucursal',$id)->get();

        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_subasunto_abandonado_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('subasunto as name, count(subasunto) as y, created_at')->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('subasunto')->where('estado',2)->where('id_sucursal',$id)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_subasunto_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('subasunto as name, count(subasunto) as y, created_at')
            ->where('estado',1)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('subasunto')
            ->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_subasunto_abandonado_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('subasunto as name, count(subasunto) as y, created_at')
            ->where('estado',2)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('subasunto')
            ->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }

    public function grafica_pagos()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',1)->Where('subasunto','=','Pago')->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_tramites()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',1)->Where('subasunto','=','Trámites')->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('subasunto','=','Aclaraciones y Otros')->where('estado',1)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagos_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',2)->Where('subasunto','=','Pago')->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_tramites_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',2)->Where('subasunto','=','Trámites')->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones_abandonados()
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('subasunto','=','Aclaraciones y Otros')->where('estado',2)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagos_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',1)->Where('subasunto','=','Pago')->where('id_sucursal','=',$id)->get();

        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',1)->Where('subasunto','=','Aclaraciones y Otros')->where('id_sucursal','=',$id)->get();
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')
            ->where('estado',1)->Where('subasunto','=','Aclaraciones y Otros')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_tramites_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',1)->Where('subasunto','=','Trámites')->where('id_sucursal',$id)->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_tramites_fecha($fecha,$fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')
            ->where('estado',1)->Where('subasunto','=','Trámites')
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagos_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('estado',2)->Where('subasunto','=','Pago')->where('id_sucursal',$id)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagos_fecha($fecha, $fecha_dos)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')
            ->where('estado',1)
            ->Where('subasunto','=','Pago')            
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_tramites_abandonados_id($id)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')->whereRaw('Date(tikets.created_at) = CURDATE()')
            ->groupBy('asunto')->where('estado',2)->Where('subasunto','=','Trámites')->where('id_sucursal',$id)->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones_abandonados_id($id)
    {

        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')->whereRaw('Date(tikets.created_at) = CURDATE()')->groupBy('asunto')->where('subasunto','=','Aclaraciones y Otros')->where('id_sucursal',$id)->where('estado',2)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        
        return $json;
    }
    public function grafica_tramites_abandonados_fecha($fecha, $fecha_dos)
    {

        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->where('subasunto','=','Trámites')
            ->where('estado',2)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones_abandonados_fecha($fecha, $fecha_dos)
    {

        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->where('subasunto','=','Aclaraciones y Otros')
            ->where('estado',2)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagos_abandonados_fecha($fecha, $fecha_dos)
    {

        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y')
            ->where('subasunto','=','Pago')
            ->where('estado',2)
            ->whereRaw("DATE(created_at) BETWEEN '$fecha' AND '$fecha_dos'")
            ->groupBy('asunto')
            ->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_subasunto_fecha_sucursal($id, $fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('subasunto as name, count(subasunto) as y, created_at')
            ->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)->groupBy('subasunto')->where('estado',1)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_subasunto_fecha_sucursalab($id, $fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('subasunto as name, count(subasunto) as y, created_at')
            ->whereDate('created_at','=',$fecha)->where('id_sucursal',$id)->groupBy('subasunto')->where('estado',2)->get();    
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_tramites_fecha_sucursal($id, $fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')->whereDate('created_at','=',$fecha)
            ->groupBy('asunto')->where('estado',1)->Where('subasunto','=','Trámites')->where('id_sucursal',$id)->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_tramites_fecha_sucursal_ab($id, $fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')->whereDate('created_at','=',$fecha)
            ->groupBy('asunto')->where('estado',2)->Where('subasunto','=','Trámites')->where('id_sucursal',$id)->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones_fecha_sucursal($id, $fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')->whereDate('created_at','=',$fecha)
            ->groupBy('asunto')->where('estado',1)->Where('subasunto','=','Aclaraciones y Otros')->where('id_sucursal',$id)->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_aclaraciones_fecha_sucursal_ab($id, $fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')->whereDate('created_at','=',$fecha)
            ->groupBy('asunto')->where('estado',2)->Where('subasunto','=','Aclaraciones y Otros')->where('id_sucursal',$id)->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagos_fecha_sucursal($id, $fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')->whereDate('created_at','=',$fecha)
            ->groupBy('asunto')->where('estado',1)->Where('subasunto','=','Pago')->where('id_sucursal',$id)->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }
    public function grafica_pagos_fecha_sucursal_abandonados($id, $fecha)
    {
        $tiket = DB::table('tikets')->selectRaw('asunto as name, count(asunto) as y, created_at')->whereDate('created_at','=',$fecha)
            ->groupBy('asunto')->where('estado',2)->Where('subasunto','=','Pago')->where('id_sucursal',$id)->get();    
        
        $json = json_encode($tiket,JSON_NUMERIC_CHECK);
        return $json;
    }


}
