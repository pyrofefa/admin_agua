@extends('plantillas.app')
@section('content')
<div class="row">
	<div class="col-md-2">
        <ul class="nav nav-pills nav-stacked admin-menu" style="position: fixed; width: 150px; height: 560px; overflow-y: scroll;">
            <li><a href="#inicio"><i></i>Inicio</a></li>
            <li><a href="#turnos_totales_cajeras"><i></i>Turnos por ventanilla</a></li>
            <li><a href="#promedio_espera_cajeras"><i></i>Promedio de tiempo de espera cajeras </a></li>
            <li><a href="#promedio_atencion_cajeras"><i></i>Promedio de tiempo de atencion cajeras  </a></li>
            <li><a href="#turnos_totales"><i></i>Turnos totales</a></li>
            <li><a href="#turnos_realizados"><i></i>Turnos realizados</a></li>
            <li><a href="#turnos_abandonados"><i></i>Turnos abandonados</a></li>
            <li><a href="#operaciones_hora"><i></i>Operaciones por hora</a></li>
            <li><a href="#tramites_hora"><i></i>Tramites por hora</a></li>
            <li><a href="#aclaraciones_hora"><i></i>Aclaraciones por hora</a></li>
            <li><a href="#pagos_hora"><i></i>Pagos por hora</a></li>
            <li><a href="#promedio_tiempo"><i></i>Promedio de tiempo de espera y promedio de tiempo de atencion</a></li>
            <li><a href="#promedio_espera_hora"><i></i>Promedio de tiempo de espera hora</a></li>
            <li><a href="#promedio_atencion_hora"><i></i>Promedio de tiempo de atencion hora</a></li>
            <li><a href="#turnos_mes"><i></i>Turnos por mes</a></li>
            <li><a href="#promedio_espera_mes"><i></i>Promedio de tiempo de espera mes</a></li>
            <li><a href="#promedio_atencion_mes"><i></i>Promedio de tiempo de atencion por mes</a></li>
            <li><a href="#operaciones_por_fecha"><i></i>Operaciones por fecha</a></li>
            <li><a href="#promedio_tramites_mes"><i></i>Promedio de tiempo tramites por meses</a></li>
            <li><a href="#promedio_aclaraciones_mes" ><i></i>Promedio de tiempo aclaraciones por meses</a></li>
        </ul>
    </div>
    <div class="col-md-6">
    	{!! Form::hidden('valor',$sucursal->id,['class'=>'form-control' , 'id' => 'valor']) !!}<br>

		<div class="row">
			<div class="col-md-12" id="turnos_mes">
				<h1 style="text-align: center">{{$sucursal->nombre}} Reporte Global</h1>
			</div>
		</div>	
		<br><br>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
								<tr>
									<td><strong>Asunto</strong></td>
									<td><strong>Mes</strong></td>
									<td><strong></strong></td>
								</tr>
								<tr>
									<td><strong></strong></td>
		 							@foreach($aclaraciones_mes as $pm)
 										<td>{{$pm->mes}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Aclaraciones</td>
									@foreach($aclaraciones_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Tramites</td>
									@foreach($tramites_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Pagos</td>
									@foreach($pagos_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
							</table>
						<br><br><br>
						<table class="table table-bordered">
								<tr>
									<td><strong>Tramites</strong></td>
									<td><strong>Mes</strong></td>
 								</tr>
								<tr>
									<td><strong></strong></td>
		 							@foreach($contrato_mes as $pm)
			 							<td>{{$pm->mes}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Contrato</td>
									@foreach($contrato_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Convenio</td>
									@foreach($convenio_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Cambio de nombre</td>
									@foreach($cambio_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Carta de no adeudo</td>
									@foreach($carta_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Factibilidad de servicio</td>
									@foreach($factibilidad_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>2 o mas tramites</td>
									@foreach($dosomas_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Solicitud de tarifa social</td>
									@foreach($solicitud_tarifa_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Baja por impago</td>
									@foreach($baja_por_impago_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
							</table>
							<br><br><br>
							<table class="table table-bordered">
								<tr>
									<td><strong>Aclaraciones</strong></td>
									<td><strong>Mes</strong></td>
									<td><strong></strong></td>
								</tr>
								<tr>
									<td><strong></strong></td>
		 							@foreach($alto_mes as $pm)
			 							<td>{{$pm->mes}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Alto consumo con o sin medidor</td>
									@foreach($alto_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Reconexion de servicios</td>
									@foreach($reconexion_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Error en lectura</td>
									@foreach($error_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>No toma lectura</td>
									@foreach($notoma_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>No entrega de recibo</td>
									@foreach($noentrega_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Cambio de tarifa</td>
									@foreach($cambiotarifa_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Solicitud de medidor</td>
									@foreach($solicitud_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Otros tramites</td>
									@foreach($otro_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Alta estimación de consumo</td>
									@foreach($alta_estimacion_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Propuestas de pago</td>
									@foreach($propuestas_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Aviso de incidencia</td>
									@foreach($aviso_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
							</table>
						<br><br><br>
						<table class="table table-bordered">
									<tr>
										<td><strong>Pagos</strong></td>
										<td><strong>Mes</strong></td>
										<td><strong></strong></td>
									</tr>
									<tr>
										<td><strong></strong></td>
			 							@foreach($pago_mes as $pm)
				 							<td>{{$pm->mes}}</td>
									@endforeach
									</tr>
									<tr>
										<td>Pago de recibo</td>
										@foreach($pago_mes as $pm)
										<td>{{$pm->numero}}</td>
										@endforeach
									</tr>
									<tr>
										<td>Pago de convenio</td>
										@foreach($pago_mes_convenio as $pm)
										<td>{{$pm->numero}}</td>
										@endforeach
									</tr>
									<tr>
										<td>Pago carta de no adeudo</td>
										@foreach($pago_mes_carta as $pm)
										<td>{{$pm->numero}}</td>
										@endforeach
									</tr>
									<tr>
										<td>Pagos de facturas</td>
										@foreach($pago_mes_facturas as $pm)
										<td>{{$pm->numero}}</td>
										@endforeach
									</tr>
								</table>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12" id="operaciones_por_fecha">
						<div id="linealid"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="linealabandonadosid"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<div id="linealpromedioid"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<div id="linealpromedioatencionid"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12" id="promedio_espera_mes">
					<h3 style="text-align: center;">Promedio de tiempo de espera meses</h3><br>
					
					
						<table class="table table-bordered">
							<tr>
								<td width="100px"></td>
								@foreach($promedio_tramites_mes as $prom)
									<td><strong>{{$prom->mes}}</strong></td>										
								@endforeach
							</tr>
							<tr>
								<td><strong>Tramites</strong></td>
								@foreach($promedio_tramites_mes as $prom)
									<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
								@endforeach
							</tr>
		  					<tr>
								<td><strong>Aclaraciones</strong></td>
								@foreach($promedio_aclaraciones_mes as $prom)
									<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
								@endforeach
							</tr>
		  					<tr>
								<td><strong>Pago</strong></td>
								@foreach($promedio_pago_mes as $prom)
									<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
								@endforeach
							</tr>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" id="promedio_atencion_mes">
						<h3 style="text-align: center;">Promedio de tiempo de atencion meses</h3><br>
						
						<table class="table table-bordered">
								<tr>
									<td width="100px"></td>
									@foreach($promedio_tramitesa_mes as $prom)
										<td><strong>{{$prom->mes}}</strong></td>										
									@endforeach
								</tr>
								<tr>
									<td><strong>Tramites</strong></td>
									@foreach($promedio_tramitesa_mes as $prom)
										<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
									@endforeach
								</tr>
								<tr>
									<td><strong>Aclaraciones</strong></td>
									@foreach($promedio_aclaracionesa_mes as $prom)
										<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
									@endforeach
								</tr>
								<tr>
									<td><strong>Pago</strong></td>
									@foreach($promedio_pagoa_mes as $prom)
										<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
									@endforeach
								</tr>
							</table>
					</div>
				</div>
			</div>	
		</div>
	 	<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12" id="promedio_tramites_mes">
						<div id="atenciontramitesid"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="esperatramitesid"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12" id="promedio_aclaraciones_mes">
						<div id="atencionaclaracionesid"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="esperaaclaracionesid"></div>
					</div>
				</div>
			</div>
		</div>																				
	</div>
	</div>
</div>

@endsection
@section('javascript')
{!! Html::script('assets/js/highcharts.js') !!}
{!! Html::script('assets/js/data.js') !!}
{!! Html::script('assets/js/exporting.js') !!}
{!! Html::script('assets/js/graficas_por_sucursal.js') !!}
{!! Html::script('assets/js/graficalineal.js')!!}
@stop