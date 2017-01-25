@extends('plantillas.app')
@section('content')
<div class="container">
  	<h2></h2>
  		<div class="panel panel-default">
    		<div class="panel-body">
				<label>Nombre</label>
				{!! Form::text('name',$usuario->name,['class'=>'form-control']) !!}<br>
		        <label>Tipo</label>
		        {!! Form::text('display_name',$usuario->display_name,['class'=>'form-control']) !!}<br>
		        <label>Descripcion</label>
		        {!! Form::text('description',$usuario->description,['class'=>'form-control']) !!}<br>
		    </div>
  		</div>
</div>
@endsection