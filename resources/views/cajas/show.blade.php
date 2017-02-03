@extends('plantillas.app')
@section('content')
<div class="container">
	<div class="row">
      <div class="col-md-6">
          <h1>Ventanilla No. {{$caja->name}}</h1>
      </div>
      <div class="col-md-6">
        <br><br><br>
        {!! Form::model($caja, ['url'=>'cajas/'.$caja->id , 'method'=> 'GET', 'class' => 'navbar-formpull-right' ]) !!}
            <div class="input-group">
              {!! Form::text('asunto',null,['class' => 'form-control', 'placeholder' => 'Buscar...', 'aria-describedby' => 'search']) !!}
              <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>        
            </div>
        {!! Form::close() !!}
      </div> 
  </div>
  <br>
  <div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
            <tr>
                <th>Turno</th>
                <th>Tiempo</th>
                <th>Asunto</th>
                <th>Sub Asunto</th>
                <th>Fecha</th>
                <th>Llegada</th>
                <th>Atendido</th>
                <th>Tiempo de espera</th>
            </tr>
            @foreach($turnos as $t)
            <tr>
                @if($t->subasunto=="Aclaraciones y Otros")
                    <td>A{{ $t->turno }}</td>
                @elseif($t->subasunto=="Pago")
                    <td>P{{ $t->turno }}</td>    
                @elseif($t->subasunto=="Trámites")
                    <td>T{{ $t->turno }}</td>    
                @endif    
                <td>{{ $t->tiempo }}</td>
                <td>{{ $t->asunto }}</td>
                <td>{{ $t->subasunto }}</td>
                <td>{{ $t->created_at->format('d-m-Y') }}</td>
                <td>{{ $t->created_at->format('h:i A') }}</td>
                <td>{{ $t->updated_at->format('h:i A') }}</td>
                <td>{{ $t->updated_at->diffForHumans($t->created_at) }}</td>
            </tr>
            @endforeach
        </table>
        {!! $turnos->render() !!}
		</div>
	</div>
</div>

@endsection
