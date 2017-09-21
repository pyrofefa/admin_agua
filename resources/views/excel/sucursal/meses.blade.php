<table>
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
<br>
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