<table id="datatable" class="table table-bordered">
	<thead>
		<tr>
			<th></th>
			<th>No.</th>
			<th>Promedio de tiempo de espera</th>
			<th>Promedio de tiempo de atencion</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>Tramites</th>
			@if(is_null($promedio_tramites->tiempo))
				<td>0</td>
				<td>0.00</td>
			@else
				<td>{{$tramites}}</td>
				<td>{{ $promedio_tramites->tiempo }}</td>
			@endif	
			@if(is_null($promedio_tramitesa->tiempo))
				<td>0.00</td>
			@else	
				<td>{{ $promedio_tramitesa->tiempo }}</td>
			@endif
		</tr>
		<tr>
			<th>Aclaraciones</th>
			@if(is_null($promedio_aclaraciones->tiempo))
				<td>0</td>
				<td>0.00</td>
			@else
				<td>{{$aclaraciones}}</td>	
				<td>{{ $promedio_aclaraciones->tiempo }}</td>
			@endif
			@if(is_null($promedio_aclaracionesa->tiempo))
				<td>0.00</td>
			@else	
				<td>{{ $promedio_aclaracionesa->tiempo }}</td>
			@endif
		</tr>
		<tr>
			<th>Pago</th>
			@if(is_null($promedio_pago->tiempo))
				<td>0</td>
				<td>0.00</td>
			@else
				<td>{{$pago}}</td>	
				<td>{{ $promedio_pago->tiempo }}</td>
			@endif
			@if(is_null($promedio_pagoa->tiempo))
				<td>0.00</td>
			@else	
				<td>{{ $promedio_pagoa->tiempo }}</td>
			@endif
		</tr>
	</tbody>
</table>
<br>
<table id="datatabletramites" class="table table-bordered">
	<thead>
		<tr>
			<th>Tramites</th>
			<th>No.</th>
			<th>Promedio de tiempo de espera</th>
			<th>Promedio de tiempo de atencion</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>Contrato</th>
			@if(is_null($promedio_contrato_espera->tiempo ))
				<td>0</td>
				<td>0.00</td>
			@else
				<td>{{$contrato}}</td>	
				<td>{{ $promedio_contrato_espera->tiempo }}</td>
			@endif
			@if(is_null($promedio_contrato->tiempo))
				<td>0.00</td>
			@else	
				<td>{{ $promedio_contrato->tiempo }}</td>
			@endif
		</tr>
		<tr>
			<th>Convenio</th>
			@if(is_null($promedio_convenio_espera->tiempo))
				<td>0</td>
				<td>0.00</td>
			@else
				<td>{{$convenio}}</td>	
				<td>{{ $promedio_convenio_espera->tiempo }}</td>
			@endif
			@if(is_null($promedio_convenio->tiempo))
			   	<td>0.00</td>
			@else		
			   	<td>{{ $promedio_convenio->tiempo }}</td>
			@endif
		</tr>
		<tr>
		    <th>Cambio de nombre</th>
		    @if(is_null($promedio_cambio_espera->tiempo))
		       	<td>0</td>
		 		<td>0.00</td>
			@else	
			   	<td>{{$cambio}}</td>
			   	<td>{{ $promedio_cambio_espera->tiempo }}</td>
			@endif
			@if(is_null($promedio_cambio->tiempo))
				<td>0.00</td>
			@else	
			   	<td>{{ $promedio_cambio->tiempo }}</td>
			@endif
		</tr>
		<tr>
		    <th>Carta de no adeudo</th>
		    @if(is_null($promedio_carta_espera->tiempo))
		       	<td>0</td>
		       	<td>0.00</td>
		    @else
		       	<td>{{$carta}}</td>		
		       	<td>{{ $promedio_carta_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_carta->tiempo))
		       	<td>0.00</td>
		    @else
		       	<td>{{ $promedio_carta->tiempo }}</td>
		  	@endif
		</tr>
		<tr>
		    <th>Factibilidad de servicio</th>
		    @if(is_null($promedio_factibilidad_espera->tiempo))
		       	<td>0</td>
				<td>0.00</td>
			@else
			   	<td>{{$factibilidad}}</td>	
			   	<td>{{ $promedio_factibilidad_espera->tiempo }}</td>
			@endif
			@if(is_null($promedio_factibilidad->tiempo))
			   	<td>0.00</td>
			@else	
			  	<td>{{ $promedio_factibilidad->tiempo }}</td>
			@endif
		</tr>
		<tr>
		    <th>2 o mas tramites</th>
		    @if(is_null($promedio_dosomas_espera->tiempo))
		       	<td>0</td>
				<td>0.00</td>
			@else
			   	<td>{{$dosomas}}</td>	
			   	<td>{{ $promedio_dosomas_espera->tiempo }}</td>
			@endif
			@if(is_null($promedio_dosomas->tiempo))
				<td>0.00</td>
			@else		
			   <td>{{$promedio_dosomas->tiempo }}</td>
			@endif
		</tr>
		<tr>
		   <th>Solicitud de tarifa social</th>
		   @if(is_null($promedio_solicitud_tarifa_espera->tiempo))
			    <td>0</td>
				<td>0.00</td>
			@else
			    <td>{{$solicitud_tarifa}}</td>	
			    <td>{{ $promedio_solicitud_tarifa_espera->tiempo }}</td>
			@endif
			@if(is_null($promedio_solicitud_tarifa->tiempo))
				<td>0.00</td>
			@else		
			    <td>{{ $promedio_solicitud_tarifa->tiempo }}</td>
			@endif
		</tr>
		<tr>
		   <th>Baja por impago</th>
		   @if(is_null($promedio_baja_espera->tiempo))
			    <td>0</td>
				<td>0.00</td>
			@else
			   <td>{{$baja_impago}}</td>	
			   <td>{{ $promedio_baja_espera->tiempo }}</td>
			@endif
			@if(is_null($promedio_baja->tiempo))
				<td>0.00</td>
			@else		
			    <td>{{$promedio_baja->tiempo}}</td>
			@endif
		</tr>
	</tbody>
</table>
<br><br>
<table id="datatableaclaraciones" class="table table-bordered">
	<thead>
		<tr>
	        <th>Aclaraciones</th>
	        <th>No.</th>
	        <th>Promedio de tiempo de espera</th>
	        <th>Promedio de tiempo de atencion</th>
	 	</tr>
	</thead>
	<tbody>
	    <tr>
	        <th>Alto consumo con y sin medidor</th>
	        @if(is_null($promedio_alto_espera->tiempo ))
	          	<td>0</td>
				<td>0.00</td>
	        @else	
	           	<td>{{$alto}}</td>
	          	<td>{{ $promedio_alto_espera->tiempo }}</td>
	        @endif
	        @if(is_null($promedio_alto->tiempo))
	           	<td>0.00</td>
	        @else	
	          	<td>{{ $promedio_alto->tiempo }}</td>
	       	@endif
	    </tr>
	    <tr>
		    <th>Reconexion de servicio</th>
		    @if(is_null($promedio_reconexion_espera->tiempo))
		       	<td>0</td>
		       	<td>0.00</td>
		    @else
		       	<td>{{$reconexion}}</td>	
		       	<td>{{ $promedio_reconexion_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_reconexion->tiempo))
		       	<td>0.00</td>
		    @else	
		       	<td>{{ $promedio_reconexion->tiempo }}</td>
		   	@endif
		</tr>
		<tr>
		    <th>Error en lectura</th>
		    @if(is_null($promedio_error_espera->tiempo))
		       	<td>0</td>
		       	<td>0.00</td>
		    @else
		       	<td>{{$error}}</td>	
		       	<td>{{ $promedio_error_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_error->tiempo))
		       	<td>0.00</td>
		    @else	
		       	<td>{{ $promedio_error->tiempo }}</td>
		   	@endif
		</tr>
		<tr>
		    <th>No toma de lectura</th>
		    @if(is_null($promedio_notoma_espera->tiempo))
		       	<td>0</td>
		       	<td>0.00</td>
		    @else
		       	<td>{{$notoma}}</td>
		       	<td>{{ $promedio_notoma_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_notoma->tiempo))
		       	<td>0.00</td>
		    @else	
		       	<td>{{ $promedio_notoma->tiempo }}</td>
		   	@endif
		</tr>
		<tr>
		    <th>No entrega de recibo</th>
		    @if(is_null($promedio_noentrega_espera->tiempo))
		       	<td>0</td>
		       	<td>0.00</td>
		    @else	
		       	<td>{{$noentrega}}</td>
		       	<td>{{ $promedio_noentrega_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_noentega->tiempo))
		       	<td>0.00</td>
		    @else	
		       	<td>{{ $promedio_noentega->tiempo }}</td>
		   	@endif
		</tr>
		<tr>
		    <th>Cambio de tarifa</th>
		    @if(is_null($promedio_cambiotarifa_espera->tiempo))
		       	<td>0</td>
		       	<td>0.00</td>
		    @else
		       	<td>{{$cambiotarifa}}</td>	
		       	<td>{{ $promedio_cambiotarifa_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_cambiotarifa->tiempo))
		       	<td>0.00</td>
		    @else	
		       	<td>{{ $promedio_cambiotarifa->tiempo }}</td>
		   	@endif
		</tr>
		<tr>
		    <th>Solicitud de medidor</th>
		    @if(is_null($promedio_solicitud_espera->tiempo))
		       	<td>0</td>
		       	<td>0.00</td>
		    @else
		       	<td>{{$solicitud}}</td>	
		       	<td>{{ $promedio_solicitud_espera->tiempo }}</td>
		    @endif
			@if(is_null($promedio_solicitud->tiempo))
			   	<td>0.00</td>
			@else	
			   	<td>{{ $promedio_solicitud->tiempo }}</td>
			@endif
		</tr>
		<tr>
		    <th>Otros tramites</th>
		    @if(is_null($promedio_otros_espera->tiempo))
		       	<td>0</td>
		       	<td>0.00</td>
		    @else
		       	<td>{{$otros}}</td>	
		       	<td>{{ $promedio_otros_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_otros->tiempo))
		       	<td>0.00</td>
		    @else	
		       	<td>{{ $promedio_otros->tiempo }}</td>
		   	@endif
		</tr>
		<tr>
		    <th>Alta estimación de consumo</th>
		    @if(is_null($promedio_altaestimacion_espera->tiempo))
		       	<td>0</td>
		        <td>0.00</td>
		    @else
		        <td>{{$alta_estimacion}}</td>	
		        <td>{{ $promedio_altaestimacion_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_altaestimacion->tiempo))
		        <td>0.00</td>
		    @else	
		        <td>{{ $promedio_altaestimacion->tiempo }}</td>
		    @endif
		</tr>
		<tr>
		<th>Propuestas de pago</th>
		    @if(is_null($promedio_propuestas_espera->tiempo))
		        <td>0</td>
		        <td>0.00</td>
		    @else
		        <td>{{$propuestas}}</td>	
		        <td>{{ $promedio_propuestas_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_propuestas->tiempo))
		        <td>0.00</td>
		    @else	
		        <td>{{$promedio_propuestas->tiempo}}</td>
		    @endif
		</tr>
		<tr>
		    <th>Aviso de incidencia</th>
		    @if(is_null($promedio_aviso_espera->tiempo))
		        <td>0</td>
		        <td>0.00</td>
		    @else
		        <td>{{$aviso}}</td>	
		        <td>{{ $promedio_aviso_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_aviso->tiempo))
		        <td>0.00</td>
		    @else	
		        <td>{{$promedio_aviso->tiempo}}</td>
		    @endif
		</tr>
	</tbody>
</table>
<br><br>
<table id="datatablepago" class="table table-bordered">
	<thead>
		<tr>
		   <th>Pagos</th>
		    <th>No.</th>
			<th>Promedio de tiempo de espera</th>
			<th>Promedio de tiempo de atencion</th>
		</tr>
	</thead>
	<tbody>
	    <tr>
	        <th>Pago de recibo</th>
	        @if(is_null($promedio_pagos->tiempo))
	          	<td>0</td>
	          	<td>0.00</td>
	        @else
	          	<td>{{ $pago_recibo }}</td>	
	           	<td>{{ $promedio_pago_espera->tiempo }}</td>
	        @endif
	        @if(is_null($promedio_pagos->tiempo))
	           	<td>0.00</td>
	        @else	
	           	<td>{{ $promedio_pagos->tiempo }}</td>
	       	@endif
	    </tr>
	    <tr>
	        <th>Pago de convenio</th>
	        @if(is_null($promedio_pago_convenio_espera->tiempo))
	           	<td>0</td>
	           	<td>0.00</td>
	        @else
	           	<td>{{ $pago_convenio }}</td>	
	           	<td>{{ $promedio_pago_convenio_espera->tiempo }}</td>
	        @endif
	        @if(is_null($promedio_pago_convenio->tiempo))
	           	<td>0.00</td>
	        @else	
	           	<td>{{ $promedio_pago_convenio->tiempo }}</td>
	      	@endif
	    </tr>
	    <tr>
	        <th>Pago de carta de no adeudo</th>
	        @if(is_null($promedio_pago_carta_espera->tiempo))
	           	<td>0</td>
	           	<td>0.00</td>
	        @else
	           	<td>{{ $pago_carta }}</td>	
	           	<td>{{ $promedio_pago_carta_espera->tiempo }}</td>
	        @endif
	        @if(is_null($promedio_pago_carta->tiempo))
	           	<td>0.00</td>
	        @else	
	          	<td>{{ $promedio_pago_carta->tiempo }}</td>
			@endif
		</tr>
		<tr>
		    <th>Pagos de facturas</th>
		    @if(is_null($promedio_pago_facturas_espera->tiempo))
		        <td>0</td>
		        <td>0.00</td>
		    @else
		        <td>{{ $pago_facturas }}</td>	
		        <td>{{ $promedio_pago_facturas_espera->tiempo }}</td>
		    @endif
		    @if(is_null($promedio_pago_facturas->tiempo))
		        <td>0.00</td>
		    @else	
		        <td>{{ $promedio_pago_facturas->tiempo }}</td>
		   	@endif
		</tr>
   </tbody>
</table>
<br><br>
<table class="table table-bordered">
	<tr>
		<td><strong>Promedio de tiempo de espera cajeras</strong></td>
		@foreach($promedio_cajera as $prom)
			<td>Ventanilla. {{ $prom->caja }}</td>	
		@endforeach
	</tr>
	<tr>
		<td><strong>Global</strong></td>
		@foreach($promedio_cajera as $prom)
			<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
		@endforeach
	</tr>
	<tr>
		<td><strong>Tramites</strong></td>
		@foreach($promedio_tramites_cajera as $prom)
			<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
		@endforeach
	</tr>
	<tr>
		<td><strong>Aclaraciones</strong></td>
		@foreach($promedio_aclaraciones_cajera as $prom)
			<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
		@endforeach
	</tr>
	<tr>
		<td><strong>Pago</strong></td>
		@foreach($promedio_pago_cajera as $prom)
			<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
		@endforeach
	</tr>
</table>
<br><br>
<table class="table table-bordered">
	<tr>
		<td><strong>Promedio de tiempo de atencion cajeras </strong></td>
		@foreach($promedio_atendido_cajera as $prom)
			<td>Ventanilla. {{ $prom->caja }}</td>	
		@endforeach
	</tr>
	<tr>
		<td><strong>Global</strong></td>
		@foreach($promedio_atendido_cajera as $prom)
			<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
		@endforeach
	</tr>
	<tr>
		<td><strong>Tramites</strong></td>
		@foreach($promedio_tramitesa_cajera as $prom)
			<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
		@endforeach
	</tr>
	<tr>
		<td><strong>Aclaraciones</strong></td>
		@foreach($promedio_aclaracionesa_cajera as $prom)
			<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
		@endforeach
	</tr>
	<tr>
		<td><strong>Pagos</strong></td>
		@foreach($promedio_pagoa_cajera as $prom)
			<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
		@endforeach
	</tr>
</table>
<br><br>
<table class="table table-bordered">
	<tr>
		<td><strong>Promedio de tiempo de espera meses</strong></td>
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
<br><br>
<table class="table table-bordered">
	<tr>
		<td><strong>Promedio de tiempo de atencion meses</strong></td>
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