@extends('plantillas.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
         @if(Session::has('limpiar'))
              <p class="alert alert-success">{{ session::get('limpiar') }}</p>
        @endif
        {!! Form::open((array( 'url' => 'turnos/terminar/'.$sucursal->id, 'method' => 'PUT' ))) !!}
        {!! Form::hidden('numero','3',['class'=>'form-control']) !!}
        {!! Form::submit('Terminar',['class'=>'form-group btn btn-danger btn-lg'])!!}
        </h2>
        <br><br>
        <table class="table table-striped">
            <tr>
                <th>Turno</th>
                <th>Caja</th>
                <th>Tiempo</th>
                <th>Asunto</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
            @foreach($tikets as $t)
            <tr>
                <td>{{ $t->turno }}</td>
                <td>Caja. {{ $t->fk_caja }}</td>
                <td>{{ $t->tiempo }}</td>
                <td>{{ $t->asunto }}</td>
                <td>{{ $t->created_at->format('d-m-Y') }}</td>
                <td>{{ $t->created_at->format('h:i A') }}</td>
            </tr>
            @endforeach
        </table>
        {!! $tikets->render() !!}
        </div>
  </div>
</div>
@endsection