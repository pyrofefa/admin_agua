@extends('plantillas.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
		{!! Form::model($caja, ['url'=>'cajas/'.$caja->id , 'method'=> 'PUT',]) !!}
			<label>Numero</label>
                {!! Form::text('name',null,['class'=>'form-control']) !!}<br>
           <label>Contraseña</label>
				{!! Form::password('password', array('placeholder'=>'****', 'class'=>'form-control' ) ) !!}<br>		
			{!! Form::submit('Guardar',['class'=>'form-group btn btn-success'])!!}
        {!! Form::close() !!}
		</div>
    </div>
</div>
</div>
@endsection