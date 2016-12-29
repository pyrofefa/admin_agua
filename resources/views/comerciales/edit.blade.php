@extends('plantillas.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
		{!! Form::model($comerciales, ['url'=>'comerciales/'.$comerciales->id , 'method'=> 'PUT', 'files'=> 'true', 'enctype' => 'multipart/form-data',]) !!}
			<label>Archivo</label><br>
            {!! Form::file('file',null,['class'=>'form-control']) !!}<br>
            {!! Form::submit('Guardar',['class'=>'form-group btn btn-success'])!!}
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection
