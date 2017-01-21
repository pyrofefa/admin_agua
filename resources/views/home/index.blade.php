@extends('plantillas.app')
@section('content')
<div class="container">
	 <table class="table table-bordered">
  		@foreach($sucursal as $s)
  		<tr>
  			<td>{{$s->nombre}}</td>
  			<td>
  				<a href="http://localhost/admin_agua/public/home/sucursal/{{$s->id}}" class="btn btn-info">Ver</a>
			</td>
		</tr>
  		@endforeach
	</table>
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">General</h1>
		</div>
	</div>
	<br>	
	<div class="row">
		<div class="col-md-6">
			<div id="pagos"></div>
		</div>
		<div class="col-md-6">
			<div id="aclaraciones"></div>
		</div>
	</div>
</div>
@endsection

