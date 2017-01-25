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
					<h4> Turnos atendidos: {{ $atendidos }}</h4>	
				</div>
				<div class="col-md-4">
				@if(is_null($promedio))
					<h4>Promedio de tiempo de espera: 0 </h4>
				@else
					<h4>Promedio de tiempo de espera: {{ gmdate("H:i:s",$promedio->diferencia) }} </h4>
				@endif
				</div>
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
  					 		<td>Caja {{$c->fk_caja}}</td>
  					 		<td>{{ $c->numero }}</td>
  					 		@endif
             			</tr>
  			  			@endforeach
					</table>
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