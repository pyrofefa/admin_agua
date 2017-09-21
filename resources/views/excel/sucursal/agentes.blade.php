<table class="table table-bordered">
	<tr>
		<td><strong><p style="text-align: center;">Tramites</p></strong> </td>
		<td><strong><p style="text-align: center;">Ventanillas</p></strong> </td>
	</tr>
	<tr>
		<td></td>
		@foreach($caja_contrato as $c)
			<td>Ventanilla. {{ $c->caja }}</td>	
		@endforeach
	</tr>
	<tr>
		<td >Contrato</td>
		@foreach($caja_contrato as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Convenio</td>
		@foreach($caja_convenio as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Cambio de nombre</td>
		@foreach($caja_cambio as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Carta de no adeudo</td>
		@foreach($caja_carta as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Factibilidad de servicio</td>
		@foreach($caja_factibilidad as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>2 o mas tramites</td>
		@foreach($caja_dosomas as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Solicitud de tarifa social</td>
		@foreach($caja_tarifa_social as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Baja por impago</td>
		@foreach($caja_baja_impago as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
</table>
<br><br>
<table class="table table-bordered">
	<tr>
		<td><strong><p style="text-align: center;">Aclaraciones</p></strong> </td>
		<td><strong><p style="text-align: center;">Ventanillas</p></strong> </td>
	</tr>
	<tr>
		<td> </td>
		@foreach($caja_alto as $c)
			<td >Ventanilla. {{ $c->caja }}</td>	
		@endforeach
	</tr>
	<tr>
		<td>Alto consumo con o sin medidor</td>
		@foreach($caja_alto as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Reconexion de servicio</td>
		@foreach($caja_reconexion as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Error en lectura</td>
		@foreach($caja_error as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>No toma lectura</td>
		@foreach($caja_notoma as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>No entrega recibo</td>
		@foreach($caja_noentrega as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Cambio de tarifa</td>
		@foreach($caja_cambiotarifa as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Solicitud de medidor</td>
		@foreach($caja_solicitud as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Otros tramites</td>
		@foreach($caja_otros as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Alta estimación de consumo</td>
		@foreach($caja_alta as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Propuestas de pago</td>
		@foreach($caja_propuestas as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Aviso de incidencia</td>
		@foreach($caja_aviso as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
</table>
<br>
<table class="table table-bordered">
	<tr>
		<td><strong><p style="text-align: center;">Pagos</p></strong> </td>
		<td><strong><p style="text-align: center;">Ventanillas</p></strong> </td>
	</tr>
	<tr>
		<td> </td>
		@foreach($caja_recivo as $c)
			<td>Ventanilla. {{ $c->caja }}</td>	
		@endforeach
	</tr>
	<tr>
		<td>Recibo </td>
		@foreach($caja_recivo as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Convenio</td>
		@foreach($caja_pago_convenio as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Carta de no adeudo</td>
		@foreach($caja_pago_carta as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Pagos de facturas</td>
		@foreach($caja_pago_facturas as $c)
			<td>{{$c->numero}}</td>
		@endforeach
	</tr>
</table>