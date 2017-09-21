<table class="table table-bordered">
	<tr>
		<td><strong><p style="text-align: center;"></p></strong> </td>
		<td><strong><p style="text-align: center;">Hora</p></strong> </td>
	</tr>
	<tr>
		<td> </td>
		@foreach($pago as $p)
			<td>{{ $p->x }}:00</td>	
		@endforeach
	</tr>
	<tr>
		<td>Pago </td>
		@foreach($pago as $p)
			<td>{{$p->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Aclaraciones </td>
		@foreach($aclaracion as $p)
			<td>{{$p->numero}}</td>
		@endforeach
	</tr>
	<tr>
		<td>Tramites </td>
		@foreach($tramite as $p)
			<td>{{$p->numero}}</td>
		@endforeach
	</tr>
	
</table>