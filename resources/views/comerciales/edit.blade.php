@extends('plantillas.app')
@section('content')
<div class="container">
  	<h2>Editar Comercial</h2>
  		<div class="panel panel-default">
    		<div class="panel-body">
    		{!! Form::model($comerciales, ['url'=>'comerciales/'.$comerciales->id , 'method'=> 'PUT', 'files'=> 'true', 'enctype' => 'multipart/form-data',]) !!}
    		<div>
    		<h4>{{ $comerciales->ruta }}</h4>
 			</div>
			<label>Archivo</label>
			<div>
            {!! Form::file('file',null,['class'=>'form-control']) !!}<br>
			</div>
			<div>
			{!! Form::label('tipo', 'Tipo') !!}
			{!! Form::select('tipo',['video' => 'Video', 'imagen' => 'Imagen'], $comerciales->tipo ,['class' => 'form-control', 'id' => 'tipo']) !!}
			</div>
			<div>
			<br>
			<br>
            {!! Form::submit('Guardar',['class'=>'form-group btn btn-success'])!!}
			</div>
			{!! Form::close() !!}
    		</div>
  		</div>
</div>
@endsection