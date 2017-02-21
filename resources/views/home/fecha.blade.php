@extends('plantillas.app')
@section('content')
{!! Form::hidden('fecha',$f->created_at->format('Y-m-d'),['class'=>'form-control' , 'id' => 'fecha']) !!}<br>
<div class="container">
	 <div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">General al dia: {{ $f->created_at->format('d-m-Y')}}  </h1>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-4">
					<h5> Turnos atendidos: {{ $atendidos }}</h5>
					<h5> Turnos abandonados: {{ $abandonados }}</h5>
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
						
							@forelse($subasunto as $s)
							<tr width="50px">
								<td width="1px;">{{$s->subasunto}}</td>
								<td width="20px;">{{$s->numero}}</td>
							</tr>
							@empty
								<td>Nada</td>
							@endforelse
					</table>
				</div>
				
			</div>
		</div>
	</div>

</div>
@endsection

