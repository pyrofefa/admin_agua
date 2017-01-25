@extends('plantillas.app')
@section('content')
<div class="container">
	 <table class="table table-bordered">
  		@foreach($sucursal as $s)
  		<tr>
  			<td>{{$s->nombre}}</td>
  			<td>
				<a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/admin_agua/public/home/sucursal/'.$s->id;?>" class="btn btn-info">Ver</a>
			</td>
		</tr>
  		@endforeach
	</table>
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">General</h1>
		</div>
	</div>
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
			</div>	
		</div>	
	</div>
	<br>	
	<div class="row">
		<div class="col-md-6">
			<div id="pagos"></div>
		</div>
		<div class="col-md-6">
			<div id="aclaraciones"></div>
		</div>
	</div>
</div>
@endsection

