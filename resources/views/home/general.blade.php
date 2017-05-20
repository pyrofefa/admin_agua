@extends('plantillas.app')
@section('content')
<div class="container">
	 <div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">General al dia: {{$carbon}}  </h1>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
				<a href="excel">
					<button type="button" class="btn btn-success">
  						<span class="glyphicon glyphicon-save"> Exportar</span>
					</button>
				</a>
			<div class="row">
				<div class="col-md-4">
				<br><br>
            	{!! Form::open((array( 'url' => 'home/general/fecha', 'method' => 'GET' ))) !!}
     			    <div class="form-group" >
						{!! Form::text('fecha',null,['class' => 'form-control', 'placeholder' => 'Buscar fecha...','id' => 'fecha']) !!}
    				</div>
    				<div class="form-group">
    					{!! Form::text('fecha_dos',null,['class' => 'form-control', 'placeholder' => 'Buscar fecha...','id' => 'fecha_dos']) !!}
					</div>
					<div class="form-group">
						<span class="input-group-btn" style="text-align: right;">
    						<button class="btn btn-default" type="submit">
    							<span class="glyphicon glyphicon-search"></span>
    						</button>
    					</span> 
					</div>
    			</div>
    			{!! Form::close() !!}
  				<div class="col-md-4">
					<h5> Turnos atendidos: {{ $atendidos }}</h5>
					<h5> Turnos en espera: {{ $espera }}</h5>
					<h5> Turnos abandonados: {{ $abandonados }}</h5>	
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"></td>
							<td width="20px;"><strong>Atendidas</strong></td>
							<td width="20px;"><strong>Abandonadas</strong></td>
						</tr>
						<tr width="50px">
							<td width="1px;">Aclaraciones</td>
							<td>{{$aclaraciones}}</td>
							<td>{{$aclaraciones_abandonadas}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Tramites</td>
							<td>{{$tramites}}</td>
							<td>{{$tramites_abandonados}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Pagos</td>
							<td>{{$pago}}</td>
							<td>{{$pago_abandonado}}</td>
						</tr>
					</table>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"><strong>Tramites</strong></td>
							<td width="20px;"><strong>Atendidas</strong></td>
							<td width="20px;"><strong>Abandonadas</strong></td>
						</tr>
						<tr width="50px">
							<td width="1px;">Contrato</td>
							<td>{{$contrato}}</td>
							<td>{{$contrato_abandonado}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Convenio</td>
							<td>{{$convenio}}</td>
							<td>{{$convenio_abandonado}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Cambio de nombre</td>
							<td>{{$cambio}}</td>
							<td>{{$cambio_abandonado}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Carta de no Adeudo</td>
							<td>{{$carta}}</td>
							<td>{{$carta_abandonado}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Factibilidad</td>
							<td>{{$factibilidad}}</td>
							<td>{{$factibilidad_abandonado}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">2 o mas tramites</td>
							<td>{{$dosomas}}</td>
							<td>{{$dosomas_abandonado}}</td>
						</tr>
					</table>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"><strong>Pago</strong></td>
							<td width="20px;"><strong>Atendidas</strong></td>
							<td width="20px;"><strong>Abandonadas</strong></td>
						</tr>
						<tr width="50px">
							<td width="1px;">Recibo</td>
							<td>{{$pago_recibo}}</td>
							<td>{{$pago_recibo_abandonados}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Convenio</td>
							<td>{{$pago_convenio}}</td>
							<td>{{$pago_convenio_abandonados}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Carta de no Adeudo</td>
							<td>{{$pago_carta}}</td>
							<td>{{$pago_carta_abandonados}}</td>
						</tr>
					</table>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"><strong>Aclaraciones</strong></td>
							<td width="20px;"><strong>Atendidas</strong></td>
							<td width="20px;"><strong>Abandonadas</strong></td>
						</tr>
						<tr width="50px">
							<td width="1px;">Alto Consumo <br>(Con y sin medidor)</td>
							<td>{{$alto}}</td>
							<td>{{$alto_abandonado}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Reconexion de servicios</td>
							<td>{{$reconexion}}</td>
							<td>{{$reconexion_abandonado}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Error en lectura</td>
							<td>{{$error}}</td>
							<td>{{$error_abandonados}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">No toma de lectura</td>
							<td>{{$notoma}}</td>
							<td>{{$notoma_abandonados}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">No entrega de recibo</td>
							<td>{{$noentrega}}</td>
							<td>{{$noentrega_abandonados}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Cambio de tarifa</td>
							<td>{{$cambiotarifa}}</td>
							<td>{{$cambiodetarifa_abandonados}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Solicitud de medidor</td>
							<td>{{$solicitud}}</td>
							<td>{{$solicitud_abandonados}}</td>
						</tr>
						<tr width="50px">
							<td width="1px;">Otros tramites</td>
							<td>{{$otros}}</td>
							<td>{{$otros_abandonados}}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>
		
	<div class="panel panel-default">
		<div class="panel-body">
			<h4 style="text-align: center;">{{$carbon}}</h4>
			<div class="row">
				<div class="col-md-6">
					<div id="subasunto"></div>
				</div>
				<div class="col-md-6">
					<div id="subasuntoabandonado"></div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="panel panel-default">
		<div class="panel-body">
			<h4 style="text-align: center;">Realizados</h4>
			<h4 style="text-align: center;">{{$carbon}}</h4>
			<br><br>
			<div class="row">
				<div class="col-md-6">
					<div id="tramites"></div>
				</div>
				<div class="col-md-6">
					<div id="aclaraciones"></div>
				</div>
				<div class="col-md-6">
					<div id="pagos"></div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="panel panel-default">
		<div class="panel-body">
			<h4 style="text-align: center;">Abandonados</h4>
			<h4 style="text-align: center;">{{$carbon}}</h4>
			<br><br>
			<div class="row">
				<div class="col-md-6">
					<div id="tramitesbandonados"></div>
				</div>
				<div class="col-md-6">
					<div id="aclaracionesabandonados"></div>
				</div>
				<div class="col-md-6">
					<div id="pagosabandonados"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<div id="lineal"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<div id="linealabandonados"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<div id="linealhora"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<div id="linealabandonadoshora"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<div id="tramiteshora"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<div id="aclaracioneshora"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<div id="pagoshora"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<table id="datatable" class="table table-bordered">
		    			<thead>
		        			<tr>
					            <th></th>
					            <th>Promedio de tiempo de espera</th>
					            <th>Promedio de tiempo de atencion</th>
		        			</tr>
		    			</thead>
		    			<tbody>
					        <!--<tr>
					            <th>Global</th>
					            <td>{{ $promedio }}</td>
					            <td>{{ $promedio_atendido }}</td>
					        </tr>-->
					        <tr>
					            <th>Tramites</th>
					            <td>{{ $promedio_tramites->tiempo }}</td>
					            <td>{{ $promedio_tramitesa->tiempo }}</td>
					        </tr>
					        <tr>
					            <th>Aclaraciones</th>
					            <td>{{ $promedio_aclaraciones->tiempo }}</td>
					            <td>{{ $promedio_aclaracionesa->tiempo }}</td>
					        </tr>
					        <tr>
					            <th>Pago</th>
					            <td>{{ $promedio_pago->tiempo }}</td>
					            <td>{{ $promedio_pagoa->tiempo }}</td>
					        </tr>
					        
		    			</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="barraspromedio"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">Tramites</h4>
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<table id="datatabletramites" class="table table-bordered">
		    			<thead>
		        			<tr>
					            <th></th>
					            <th>Promedio de tiempo de espera</th>
					            <th>Promedio de tiempo de atencion</th>
		        			</tr>
		    			</thead>
		    			<tbody>
					        <tr>
					            <th>Contrato</th>
					            <td>{{ $promedio_contrato_espera->tiempo }}</td>
					            <td>{{ $promedio_contrato->tiempo }}</td>
					        </tr>
					        <tr>
					            <th>Convenio</th>
					            <td>{{ $promedio_convenio_espera->tiempo }}</td>
					            <td>{{ $promedio_convenio->tiempo }}</td>
					        </tr>
					        <tr>
					            <th>Cambio de nombre</th>
					            <td>{{ $promedio_cambio_espera->tiempo }}</td>
					            <td>{{ $promedio_cambio->tiempo }}</td>
					        </tr>
					        <tr>
					            <th>Carta de no adeudo</th>
					            <td>{{ $promedio_carta_espera->tiempo }}</td>
					            <td>{{ $promedio_carta->tiempo }}</td>
					        </tr>
					        <tr>
					            <th>Factibilidad de servicio</th>
					            <td>{{ $promedio_factibilidad_espera->tiempo }}</td>
					            <td>{{ $promedio_factibilidad->tiempo }}</td>
					        </tr>
					         <tr>
					            <th>2 o mas tramites</th>
					            <td>{{ $promedio_dosomas_espera->tiempo }}</td>
					            <td>{{ $promedio_dosomas->tiempo }}</td>
					        </tr>
					        
		    			</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="barraspromediotramites"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<div id="linealpromediohora"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<div id="linealpromediohoraatencion"></div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">Reporte General Global</h1>
		</div>
	</div>
	<br>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
					<tr>
						<td><strong>Mes</strong></td>
						<td><strong>Asunto</strong></td>
						<td><strong>Numero</strong></td>
					</tr>
					@foreach($asunto_mes as $am)
						<tr>
							@if($am->mes == '1')
								<td>Enero</td>
							@elseif($am->mes == '2')
								<td>Febrero</td>
							@elseif($am->mes == '3')
								<td>Marzo</td>
							@elseif($am->mes == '4')
								<td>Abril</td>
							@elseif($am->mes == '5')
								<td>Mayo</td>
							@elseif($am->mes == '6')
								<td>Junio</td>
							@elseif($am->mes == '7')
								<td>Julio</td>
							@elseif($am->mes == '8')
								<td>Agosto</td>
							@elseif($am->mes == '9')
								<td>Septiembre</td>
							@elseif($am->mes == '10')
								<td>Octubre</td>
							@elseif($am->mes == '11')
								<td>Noviembre</td>
							@elseif($am->mes == '12')
								<td>Diciembre</td>
							@endif			
							<td>{{$am->subasunto}}</td>
							<td>{{$am->numero}}</td>
						</tr>
					@endforeach	
					</table>
					<table class="table table-bordered">
						<tr>
							<td><strong>Mes</strong></td>
							<td><strong>Tramite</strong></td>
							<td><strong>Numero</strong></td>
						</tr>
						@foreach($tramites_mes as $tm)
						<tr>
							@if($tm->mes == '1')
								<td>Enero</td>
							@elseif($tm->mes == '2')
								<td>Febrero</td>
							@elseif($tm->mes == '3')
								<td>Marzo</td>
							@elseif($tm->mes == '4')
								<td>Abril</td>
							@elseif($tm->mes == '5')
								<td>Mayo</td>
							@elseif($tm->mes == '6')
								<td>Junio</td>
							@elseif($tm->mes == '7')
								<td>Julio</td>
							@elseif($tm->mes == '8')
								<td>Agosto</td>
							@elseif($tm->mes == '9')
								<td>Septiembre</td>
							@elseif($tm->mes == '10')
								<td>Octubre</td>
							@elseif($tm->mes == '11')
								<td>Noviembre</td>
							@elseif($tm->mes == '12')
								<td>Diciembre</td>
							@endif			
							<td>{{$tm->asunto}}</td>
							<td>{{$tm->numero}}</td>
						</tr>
						@endforeach
					</table>
					<table class="table table-bordered">
						<tr>
							<td><strong>Mes</strong></td>
							<td><strong>Aclaracion</strong></td>
							<td><strong>Numero</strong></td>
						</tr>
						@foreach($aclaraciones_mes as $acm)
						<tr>
							@if($acm->mes == '1')
								<td>Enero</td>
							@elseif($acm->mes == '2')
								<td>Febrero</td>
							@elseif($acm->mes == '3')
								<td>Marzo</td>
							@elseif($acm->mes == '4')
								<td>Abril</td>
							@elseif($acm->mes == '5')
								<td>Mayo</td>
							@elseif($acm->mes == '6')
								<td>Junio</td>
							@elseif($acm->mes == '7')
								<td>Julio</td>
							@elseif($acm->mes == '8')
								<td>Agosto</td>
							@elseif($acm->mes == '9')
								<td>Septiembre</td>
							@elseif($acm->mes == '10')
								<td>Octubre</td>
							@elseif($acm->mes == '11')
								<td>Noviembre</td>
							@elseif($acm->mes == '12')
								<td>Diciembre</td>
							@endif			
							<td>{{$acm->asunto}}</td>
							<td>{{$acm->numero}}</td>
						</tr>
						@endforeach
					</table>
					<table class="table table-bordered">
						<tr>
							<td><strong>Mes</strong></td>
							<td><strong>Pago</strong></td>
							<td><strong>Numero</strong></td>
						</tr>
						@foreach($pago_mes as $pm)
						<tr>
							@if($pm->mes == '1')
								<td>Enero</td>
							@elseif($pm->mes == '2')
								<td>Febrero</td>
							@elseif($pm->mes == '3')
								<td>Marzo</td>
							@elseif($pm->mes == '4')
								<td>Abril</td>
							@elseif($pm->mes == '5')
								<td>Mayo</td>
							@elseif($pm->mes == '6')
								<td>Junio</td>
							@elseif($pm->mes == '7')
								<td>Julio</td>
							@elseif($pm->mes == '8')
								<td>Agosto</td>
							@elseif($pm->mes == '9')
								<td>Septiembre</td>
							@elseif($pm->mes == '10')
								<td>Octubre</td>
							@elseif($pm->mes == '11')
								<td>Noviembre</td>
							@elseif($pm->mes == '12')
								<td>Diciembre</td>
							@endif			
							<td>
									{{$pm->asunto}}
							</td>
							<td>{{$pm->numero}}</td>
						</tr>
						@endforeach
						
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
				<h3 style="text-align: center;">Promedio de tiempo de espera mes</h3><br>
				<!--<table class="table table-bordered">
					<tr>
						<td width="100px"></td>
						@foreach($promedio_mes as $prom)
							@if($prom->mes=='1')
								<td><strong>Enero</strong></td>
							@elseif($prom->mes=='2')
								<td><strong>Febrero</strong></td>
							@elseif($prom->mes=='3')
								<td><strong>Marzo</strong></td>
							@elseif($prom->mes=='4')
								<td><strong>Abril</strong></td>
							@elseif($prom->mes=='5')
								<td><strong>Mayo</strong></td>
							@elseif($prom->mes=='6')
								<td><strong>Junio</strong></td>
							@elseif($prom->mes=='7')
								<td><strong>Julio</strong></td>
							@elseif($prom->mes=='8')
								<td><strong>Agosto</strong></td>
							@elseif($prom->mes=='9')
								<td><strong>Septiembre</strong></td>
							@elseif($prom->mes=='10')
								<td><strong>Octubre</strong></td>
							@elseif($prom->mes=='11')
								<td><strong>Noviembre</strong></td>
							@elseif($prom->mes=='12')
								<td><strong>Diciembre</strong></td>										
							@endif	
						@endforeach
					</tr>
					<tr>
						<td><strong>Global</strong></td>
						@foreach($promedio_mes as $prom)
							<td>{{$prom->tiempo}}</td>
						@endforeach
					</tr>
				</table>-->
				<table class="table table-bordered">
					<tr>
						<td width="100px"></td>
						@foreach($promedio_tramites_mes as $prom)
							@if($prom->mes=='1')
								<td><strong>Enero</strong></td>
							@elseif($prom->mes=='2')
								<td><strong>Febrero</strong></td>
							@elseif($prom->mes=='3')
								<td><strong>Marzo</strong></td>
							@elseif($prom->mes=='4')
								<td><strong>Abril</strong></td>
							@elseif($prom->mes=='5')
								<td><strong>Mayo</strong></td>
							@elseif($prom->mes=='6')
								<td><strong>Junio</strong></td>
							@elseif($prom->mes=='7')
								<td><strong>Julio</strong></td>
							@elseif($prom->mes=='8')
								<td><strong>Agosto</strong></td>
							@elseif($prom->mes=='9')
								<td><strong>Septiembre</strong></td>
							@elseif($prom->mes=='10')
								<td><strong>Octubre</strong></td>
							@elseif($prom->mes=='11')
								<td><strong>Noviembre</strong></td>
							@elseif($prom->mes=='12')
								<td><strong>Diciembre</strong></td>										
							@endif	
						@endforeach
					</tr>
					<tr>
						<td><strong>Tramites</strong></td>
						@foreach($promedio_tramites_mes as $prom)
							<td>{{$prom->tiempo}}</td>
						@endforeach
					</tr>
  					<tr>
						<td width="100px"></td>
						@foreach($promedio_aclaraciones_mes as $prom)
							@if($prom->mes=='1')
								<td><strong>Enero</strong></td>
							@elseif($prom->mes=='2')
								<td><strong>Febrero</strong></td>
							@elseif($prom->mes=='3')
								<td><strong>Marzo</strong></td>
							@elseif($prom->mes=='4')
								<td><strong>Abril</strong></td>
							@elseif($prom->mes=='5')
								<td><strong>Mayo</strong></td>
							@elseif($prom->mes=='6')
								<td><strong>Junio</strong></td>
							@elseif($prom->mes=='7')
								<td><strong>Julio</strong></td>
							@elseif($prom->mes=='8')
								<td><strong>Agosto</strong></td>
							@elseif($prom->mes=='9')
								<td><strong>Septiembre</strong></td>
							@elseif($prom->mes=='10')
								<td><strong>Octubre</strong></td>
							@elseif($prom->mes=='11')
								<td><strong>Noviembre</strong></td>
							@elseif($prom->mes=='12')
								<td><strong>Diciembre</strong></td>										
							@endif	
						@endforeach
					</tr>
					<tr>
						<td><strong>Aclaraciones</strong></td>
						@foreach($promedio_aclaraciones_mes as $prom)
							<td>{{$prom->tiempo}}</td>
						@endforeach
					</tr>
  					<tr>
						<td width="100px"></td>
						@foreach($promedio_pago_mes as $prom)
							@if($prom->mes=='1')
								<td><strong>Enero</strong></td>
							@elseif($prom->mes=='2')
								<td><strong>Febrero</strong></td>
							@elseif($prom->mes=='3')
								<td><strong>Marzo</strong></td>
							@elseif($prom->mes=='4')
								<td><strong>Abril</strong></td>
							@elseif($prom->mes=='5')
								<td><strong>Mayo</strong></td>
							@elseif($prom->mes=='6')
								<td><strong>Junio</strong></td>
							@elseif($prom->mes=='7')
								<td><strong>Julio</strong></td>
							@elseif($prom->mes=='8')
								<td><strong>Agosto</strong></td>
							@elseif($prom->mes=='9')
								<td><strong>Septiembre</strong></td>
							@elseif($prom->mes=='10')
								<td><strong>Octubre</strong></td>
							@elseif($prom->mes=='11')
								<td><strong>Noviembre</strong></td>
							@elseif($prom->mes=='12')
								<td><strong>Diciembre</strong></td>										
							@endif	
						@endforeach
					</tr>
					<tr>
						<td><strong>Pago</strong></td>
						@foreach($promedio_pago_mes as $prom)
							<td>{{$prom->tiempo}}</td>
						@endforeach
					</tr>
				</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 style="text-align: center;">Promedio de tiempo de atencion</h3><br>
					<!--<table class="table table-bordered">
						<tr>
							<td width="100px"></td>
							@foreach($promedio_atendido_mes as $prom)
								@if($prom->mes=='1')
									<td><strong>Enero</strong></td>
								@elseif($prom->mes=='2')
									<td><strong>Febrero</strong></td>
								@elseif($prom->mes=='3')
									<td><strong>Marzo</strong></td>
								@elseif($prom->mes=='4')
									<td><strong>Abril</strong></td>
								@elseif($prom->mes=='5')
									<td><strong>Mayo</strong></td>
								@elseif($prom->mes=='6')
									<td><strong>Junio</strong></td>
								@elseif($prom->mes=='7')
									<td><strong>Julio</strong></td>
								@elseif($prom->mes=='8')
									<td><strong>Agosto</strong></td>
								@elseif($prom->mes=='9')
									<td><strong>Septiembre</strong></td>
								@elseif($prom->mes=='10')
									<td><strong>Octubre</strong></td>
								@elseif($prom->mes=='11')
									<td><strong>Noviembre</strong></td>
								@elseif($prom->mes=='12')
									<td><strong>Diciembre</strong></td>										
								@endif	
							@endforeach
						</tr>
						<tr>
							<td><strong>Global</strong></td>
							@foreach($promedio_atendido_mes as $prom)
								<td>{{$prom->tiempo}}</td>
							@endforeach
						</tr>
					</table>-->
					<table class="table table-bordered">
						<tr>
							<td width="100px"></td>
							@foreach($promedio_tramitesa_mes as $prom)
								@if($prom->mes=='1')
									<td><strong>Enero</strong></td>
								@elseif($prom->mes=='2')
									<td><strong>Febrero</strong></td>
								@elseif($prom->mes=='3')
									<td><strong>Marzo</strong></td>
								@elseif($prom->mes=='4')
									<td><strong>Abril</strong></td>
								@elseif($prom->mes=='5')
									<td><strong>Mayo</strong></td>
								@elseif($prom->mes=='6')
									<td><strong>Junio</strong></td>
								@elseif($prom->mes=='7')
									<td><strong>Julio</strong></td>
								@elseif($prom->mes=='8')
									<td><strong>Agosto</strong></td>
								@elseif($prom->mes=='9')
									<td><strong>Septiembre</strong></td>
								@elseif($prom->mes=='10')
									<td><strong>Octubre</strong></td>
								@elseif($prom->mes=='11')
									<td><strong>Noviembre</strong></td>
								@elseif($prom->mes=='12')
									<td><strong>Diciembre</strong></td>										
								@endif	
							@endforeach
						</tr>
						<tr>
							<td><strong>Tramites</strong></td>
							@foreach($promedio_tramitesa_mes as $prom)
								<td>{{$prom->tiempo}}</td>
							@endforeach
						</tr>
						<tr>
							<td width="100px"></td>
							@foreach($promedio_aclaracionesa_mes as $prom)
								@if($prom->mes=='1')
									<td><strong>Enero</strong></td>
								@elseif($prom->mes=='2')
									<td><strong>Febrero</strong></td>
								@elseif($prom->mes=='3')
									<td><strong>Marzo</strong></td>
								@elseif($prom->mes=='4')
									<td><strong>Abril</strong></td>
								@elseif($prom->mes=='5')
									<td><strong>Mayo</strong></td>
								@elseif($prom->mes=='6')
									<td><strong>Junio</strong></td>
								@elseif($prom->mes=='7')
									<td><strong>Julio</strong></td>
								@elseif($prom->mes=='8')
									<td><strong>Agosto</strong></td>
								@elseif($prom->mes=='9')
									<td><strong>Septiembre</strong></td>
								@elseif($prom->mes=='10')
									<td><strong>Octubre</strong></td>
								@elseif($prom->mes=='11')
									<td><strong>Noviembre</strong></td>
								@elseif($prom->mes=='12')
									<td><strong>Diciembre</strong></td>										
								@endif	
							@endforeach
						</tr>
						<tr>
							<td><strong>Aclaraciones</strong></td>
							@foreach($promedio_aclaracionesa_mes as $prom)
								<td>{{$prom->tiempo}}</td>
							@endforeach
						</tr>
						<tr>
							<td width="100px"></td>
							@foreach($promedio_pagoa_mes as $prom)
								@if($prom->mes=='1')
									<td><strong>Enero</strong></td>
								@elseif($prom->mes=='2')
									<td><strong>Febrero</strong></td>
								@elseif($prom->mes=='3')
									<td><strong>Marzo</strong></td>
								@elseif($prom->mes=='4')
									<td><strong>Abril</strong></td>
								@elseif($prom->mes=='5')
									<td><strong>Mayo</strong></td>
								@elseif($prom->mes=='6')
									<td><strong>Junio</strong></td>
								@elseif($prom->mes=='7')
									<td><strong>Julio</strong></td>
								@elseif($prom->mes=='8')
									<td><strong>Agosto</strong></td>
								@elseif($prom->mes=='9')
									<td><strong>Septiembre</strong></td>
								@elseif($prom->mes=='10')
									<td><strong>Octubre</strong></td>
								@elseif($prom->mes=='11')
									<td><strong>Noviembre</strong></td>
								@elseif($prom->mes=='12')
									<td><strong>Diciembre</strong></td>										
								@endif	
							@endforeach
						</tr>
						<tr>
							<td><strong>Pago</strong></td>
							@foreach($promedio_pagoa_mes as $prom)
								<td>{{$prom->tiempo}}</td>
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
				<div class="col-md-12">
					<div id="linealpromedioatencion"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="linealpromedio"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div id="atenciontramites"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="esperatramites"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div id="atencionaclaraciones"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="esperaaclaraciones"></div>
				</div>
			</div>
		</div>
	</div>																					
</div>
@endsection
<script type="text/javascript" src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="assets/js/exporting.js"></script>
<script src="http://highcharts.github.io/export-csv/export-csv.js"></script>
