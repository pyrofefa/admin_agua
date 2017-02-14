@extends('plantillas.app')
@section('content')
	 {!! Form::hidden('valor',$sucursal->id,['class'=>'form-control' , 'id' => 'valor']) !!}<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">{{$sucursal->nombre}}</h1>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<h5>{{$carbon}}</h5>
				<div class="col-md-4">
					<h5> Turnos atendidos: {{ $atendidos }}</h5>
					<h5> Turnos en espera: {{ $espera }}</h5>
					<h5> Turnos abandonados: {{ $abandonados }}</h5>	
	
				</div>
			</div>	
		</div>	
	</div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-12">
					<br>
					<table class="table table-bordered">
  						<tr>
  					  		<th>Nombre</th>
  					  		<th>No de turnos atendidos</th>
  						</tr>
  						@foreach($cajas as $c)
  						<tr>
  							@if($c->fk_caja==0)
  							@else
  					 		<td>Ventanilla: {{$c->fk_caja}}</td>
  					 		<td>{{ $c->numero }}</td>
  					 		@endif
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
				<div class="col-md-4">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"><strong>Tramites</strong></td>
							<td width="20px;"><strong>No. Personas Atendidas</strong></td>
						</tr>
						@foreach($tramites as $t)
						<tr width="50px">
							<td width="1px;">{{$t->asunto}}</td>
							<td width="20px;">{{$t->numero}}</td>
						</tr>
						@endforeach
					</table>		
				</div>
				<div class="col-md-4">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"><strong>Aclaraciones</strong></td>
							<td width="20px;"><strong>No. Personas Atendidas</strong></td>
						</tr>
						@foreach($aclaraciones as $a)
						<tr width="50px">
							<td width="1px;">{{$a->asunto}}</td>
							<td width="20px;">{{$a->numero}}</td>
						</tr>
						@endforeach
					</table>		
				</div>
				<div class="col-md-4">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"><strong>Pagos</strong></td>
							<td width="20px;"><strong>No. Personas Atendidas</strong></td>
						</tr>
						@foreach($pago as $p)
						<tr width="50px">
							<td width="1px;">{{$p->asunto}}</td>
							<td width="20px;">{{$p->numero}}</td>
						</tr>
						@endforeach
					</table>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"><strong>Tramites</strong></td>
							<td width="20px;"><strong>No. Turnos Abandonados</strong></td>
						</tr>
						@foreach($tramites_abandonados as $t)
						<tr width="50px">
							<td width="1px;">{{$t->asunto}}</td>
							<td width="20px;">{{$t->numero}}</td>
						</tr>
						@endforeach
					</table>		
				</div>
				<div class="col-md-4">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"><strong>Aclaraciones</strong></td>
							<td width="20px;"><strong>No. Turnos Abandonados</strong></td>
						</tr>
						@foreach($aclaraciones_abandonados as $a)
						<tr width="50px">
							<td width="1px;">{{$a->asunto}}</td>
							<td width="20px;">{{$a->numero}}</td>
						</tr>
						@endforeach
					</table>		
				</div>
				<div class="col-md-4">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"><strong>Pagos</strong></td>
							<td width="20px;"><strong>No. Turnos Abandonados</strong></td>
						</tr>
						@foreach($pago_abandonado as $p)
						<tr width="50px">
							<td width="1px;">{{$p->asunto}}</td>
							<td width="20px;">{{$p->numero}}</td>
						</tr>
						@endforeach
					</table>	
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<div id="subasuntoid"></div>
				</div>
				<div class="col-md-6">
					<div id="subasuntoabandonadoid"></div>
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
					<div id="tramitesid"></div>
				</div>
				<div class="col-md-6">
					<div id="aclaracionesid"></div>
				</div>
				<div class="col-md-6">
					<div id="pagosid"></div>
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
					<div id="tramitesbandonadosid"></div>
				</div>
				<div class="col-md-6">
					<div id="aclaracionesabandonadosid"></div>
				</div>
				<div class="col-md-6">
					<div id="pagosabandonadosid"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div id="lineal"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="linealabandonados"></div>
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
					        <tr>
					            <th>Global</th>
					            <td>{{ $promedio->tiempo }}</td>
					            <td>{{ $promedio_atendido->tiempo }}</td>
					        </tr>
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
	<div class="row">
		<div class="col-md-6">
			<div id="pagosid"></div>
		</div>
		<div class="col-md-6">
			<div id="aclaracionesid"></div>
		</div>
	</div>
</div>
@endsection