@extends('plantillas.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Caja No. {{$caja->name}}</h1>
			<br><br>
			<table class="table table-bordered">
  				<tr>
  					<th>Turno</th>
  					<th>Asunto</th>
             		<th>Fecha</th>
             		<th>Hora</th>
  				</tr>
  				@foreach($turnos as $t)
  				<tr>
  					<td>{{ $t->turno }}</td>
  					<td>{{ $t->asunto }} </td>
              		<td>{{ $t->created_at->format('d-m-Y') }}</td>
              		<td>{{ $t->created_at->format('h:i A') }}</td>
				</tr>
  			  @endforeach
			</table>
			{!! $turnos->render() !!}

		</div>
	</div>
</div>

@endsection
