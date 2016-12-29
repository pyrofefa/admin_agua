@extends('plantillas.app')
@section('content')
  <div ng-controller="inicioController">
    <div class="container">
       @if(Session::has('nuevo'))
              <p class="alert alert-success">{{ session::get('nuevo') }}</p>
        @endif
        <div class="row">
            <div class="col-md-6">
                @if(is_null($turno))
                  <h3>Turno en espera (no hay turno)</h3>
                @else
                  <h1>Turno en espera: {{$turno->turno}}</h1>
                  <h1>Asunto: {{$turno->asunto}}</h1>
                @endif
                <br>
                @if(!is_null($turno))
                <button type="button" class="btn btn-primary btn-lg" id="btn-comenzar" ng-click="tomar_turno({{$usuario_caja->name}}, {{$turno->turno}}, {{$turno->id}})">Tomar</button>  
                @endif  
            </div>
            <div class="col-md-6">
                <h1>Turno atendiendose: <% turno %></h1>
                <h1>Caja: <% caja %></h1>
            </div>
        </div>  
        <div class="row">
            @if(!is_null($turno))
            {!! Form::open((array( 'url' => 'tikets/'.$turno->id, 'method' => 'PUT' ))) !!}
            <div class="col-md-12">
              <div class="form-group">
                  {!! Form::hidden('tiempo',null,['class'=>'form-control', 'readonly' => 'true', 'id'=> 'noc']) !!}
              </div>
            {!! Form::submit('Terminar',['class'=>'form-group btn btn-success btn-lg'])!!}
            {!! Form::close() !!}
            @endif
          </div>
        </div>
    </div>
  </div>
</div>
@endsection