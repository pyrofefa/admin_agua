@extends('plantillas.app')
@section('content')
<div class="container">
	 <table class="table table-bordered">
  		<tr>
  		<td>General</td>
		<td style="text-align: center;"><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/turnomatic/public/home/general' ?>" class="btn btn-info"><span class="glyphicon glyphicon-list-alt"></span> Ver </a></td>		
		</tr>
		@foreach($sucursal as $s)
  		<tr>
  			<td>{{$s->nombre}}</td>
  			<td style="text-align: center;">
				<a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/turnomatic/public/home/sucursal/'.$s->id;?>" class="btn btn-info">
					<span class="glyphicon glyphicon-list-alt"></span> Ver
				</a>
			</td>
		</tr>
  		@endforeach
	</table>
</div>
@endsection

