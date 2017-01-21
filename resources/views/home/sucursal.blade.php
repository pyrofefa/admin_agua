@extends('plantillas.app')
@section('content')
	 {!! Form::hidden('valor',$sucursal->id,['class'=>'form-control' , 'id' => 'valor']) !!}<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">{{$sucursal->nombre}}</h1>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-6">
			<div id="pagosid"></div>
		</div>
		<div class="col-md-6">
			<div id="aclaracionesid"></div>
		</div>
	</div>
</div>
@endsection