@extends('plantillas.app')
@section('content')
<div class="container">
	 <div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">General al dia: {{$carbon}}  </h1>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<h5>{{$carbon}}</h5>
				<div class="col-md-4">
					<h5> Turnos atendidos: {{ $atendidos }}</h5>
					<h5> Turnos en espera: {{ $espera }}</h5>
					<h5> Turnos abandonados: {{ $abandonados }}</h5>	
	
				</div>
				<div class="col-md-4">
					@if(is_null($promedio))
					<h5>Promedio de tiempo de espera: 0 </h5>
				@else
					<h5>Promedio de tiempo de espera (global): {{ gmdate("H:i:s",$promedio->diferencia) }} </h5>
					<h5>Promedio de tiempo de espera (tramites): {{ gmdate("H:i:s",$promedio_tramites->diferencia) }} </h5>
					<h5>Promedio de tiempo de espera (Aclaraciones): {{ gmdate("H:i:s",$promedio_aclaraciones->diferencia) }} </h5>
				@endif	
				</div>
				<div class="col-md-4">
					<h5>Promedio de tiempo de atencion (global): {{ $promedio_atendido->inicio }} </h5>
					<h5>Promedio de tiempo de atencion (tramites): {{ gmdate("H:i:s",$promedio_tramitesa->inicio) }} </h5>
					<h5>Promedio de tiempo de atencion (Aclaraciones): {{ gmdate("H:i:s",$promedio_aclaracionesa->inicio) }} </h5>
					<h5>Promedio de tiempo de atencion (Pago): {{ gmdate("H:i:s",$promedio_pagoa->inicio) }} </h5>
				</div>
			</div>	
		</div>	
	</div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-6">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"></td>
							<td width="20px;"><strong>No. Personas Atendidas</strong></td>
						</tr>
						@foreach($subasunto as $s)
						<tr width="50px">
							<td width="1px;">{{$s->subasunto}}</td>
							<td width="20px;">{{$s->numero}}</td>
						</tr>
						@endforeach
					</table>
				</div>
				<div class="col-md-6">
					<table class="table table-bordered">
						<tr width="50px">
							<td width="1px;"></td>
							<td width="20px;"><strong>No. Turnos Abandonados</strong></td>
						</tr>
						@foreach($subasunto_abandonados as $s)
						<tr width="50px">
							<td width="1px;">{{$s->subasunto}}</td>
							<td width="20px;">{{$s->numero}}</td>
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
			<h3 style="text-align: center;">Realizados</h3>
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
			<h3 style="text-align: center;">Abandonados</h3>
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
</div>
@endsection

