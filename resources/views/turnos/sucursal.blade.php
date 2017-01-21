@extends('plantillas.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align: center">{{$sucursal->nombre}}</h1>
        </div>
    </div>
  <div class="row">
    <div class="col-md-12">
         @if(Session::has('limpiar'))
              <p class="alert alert-success">{{ session::get('limpiar') }}</p>
        @endif
        @if(Session::has('espera'))
              <p class="alert alert-danger">{{ session::get('espera') }}</p>
        @endif
        {!! Form::open((array( 'url' => 'folios/'.$folios->id, 'method' => 'PUT' ))) !!}
        {!! Form::hidden('id_sucursal',$sucursal->id,['class'=>'form-control']) !!}
            <h2>Ultimo Turno Pagos y tramites: {{$folios->numero}}</h2>
            <h2>Ultimo Turno Aclaraciones y otros: {{$folios_aclaraciones->numero}}</h2>
        {!! Form::submit('Limpiar',['class'=>'form-group btn btn-success btn-lg'])!!}
        {!! Form::close() !!}
        <br>
        <h4><a href="http://localhost/admin_agua/public/turnos/sucursal/{{$sucursal->id}}/espera"> No. de turnos en espera: {{$en_espera}}</a></h4>
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