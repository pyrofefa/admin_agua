@extends('plantillas.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
         @if(Session::has('limpiar'))
              <p class="alert alert-success">{{ session::get('limpiar') }}</p>
        @endif

        {!! Form::open((array( 'url' => 'folios/'.$folios->id, 'method' => 'PUT' ))) !!}
        <h2>Ultimo Turno: {{$folios->numero}}
        {!! Form::hidden('numero','0',['class'=>'form-control']) !!}
        {!! Form::submit('Limpiar',['class'=>'form-group btn btn-success btn-lg'])!!}
        </h2>
        {!! Form::close() !!}
        <br>
        <h4> No. de turnos en espera: {{$en_espera}}</h4>
        <h4> Turnos atendidos: {{$atendidos}}</h4>
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