@extends('plantillas.app')
@section('content')
@if(is_null($f))
<div class="container">	
	<div class="row">
		<div class="col-md-12">
			<p class="alert alert-danger">No existen registros con la fecha proporcionada</p>
			<a href="javascript:history.back()"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a>	
		</div>
	</div>
</div>	
@else	
{!! Form::hidden('fecha',$fecha,['class'=>'form-control' , 'id' => 'fecha']) !!}<br>
{!! Form::hidden('fecha_dos',$fecha_dos,['class'=>'form-control' , 'id' => 'fecha_dos']) !!}<br>
<div class="container">
	 <div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">General del dia: {{ $fecha }} al dia: {{ $fecha_dos }}  </h1>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<a href="../excelfecha/{{ $fecha }}/{{ $fecha_dos }}">
				<button type="button" class="btn btn-success">
  					<span class="glyphicon glyphicon-save"> Exportar</span>
				</button>
			</a><br><br>
			<div class="row">
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
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<div id="subasuntofecha"></div>
				</div>
				<div class="col-md-6">
					<div id="subasuntoabandonadofecha"></div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="panel panel-default">
		<div class="panel-body">
			<h3 style="text-align: center;">Realizados</h3>
			<br><br>
			<div class="row">
				<div class="col-md-6">
					<div id="tramitesfecha"></div>
				</div>
				<div class="col-md-6">
					<div id="aclaracionesfecha"></div>
				</div>
				<div class="col-md-6">
					<div id="pagosfecha"></div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="panel panel-default">
		<div class="panel-body">
			<h3 style="text-align: center;">Abandonados</h3>
			<br><br>
			<div class="row">
				<div class="col-md-6">
					<div id="tramitesbandonadosfecha"></div>
				</div>
				<div class="col-md-6">
					<div id="aclaracionesabandonadosfecha"></div>
				</div>
				<div class="col-md-6">
					<div id="pagosabandonadosfecha"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div id="linealhorafecha"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="linealhorafechaabandonados"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div id="tramiteshorafecha"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="aclaracioneshorafecha"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="pagoshorafecha"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
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
			<!--<div class="row">
				<div class="col-md-12">
					<div id="linealpromedio"></div>
				</div>
			</div>-->
			<div class="row">
				<div class="col-md-12">
					<div id="linealpromediohorafecha"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<!--<div class="row">
				<div class="col-md-12">
					<div id="linealpromedioatencion"></div>
				</div>
			</div>-->
			<div class="row">
				<div class="col-md-12">
					<div id="linealpromediohoraatencionfecha"></div>
				</div>
			</div>
		</div>
	</div>								
</div>
@endif
@endsection
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="assets/js/exporting.js"></script>
<script src="http://highcharts.github.io/export-csv/export-csv.js"></script>

