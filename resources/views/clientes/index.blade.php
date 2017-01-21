@extends('plantillas.app')
@section('content')
<div class="container">
  <div class="row">
		<div class="col-md-12">
			@if(Session::has('message'))
          <p class="alert alert-danger">{{ session::get('message') }}</p>
      @endif
      @if(Session::has('nuevo'))
          <p class="alert alert-success">{{ session::get('nuevo') }}</p>
      @endif
      <a class="btn btn-success" data-toggle="modal" data-target="#nuevocliente">Nuevo Cliente</a>
      <br><br> 
      <table class="table table-bordered">
  				<tr>
  					<th>Nombre</th>
  					<th>Apellidos</th>
            <th>Direccion</th>
            <th>No. Identificacion</th>
            <th>Email</th>
            <th>Acciones</th>
  				</tr>
  				@foreach($clientes as $c)
  				<tr>
  					<td>{{$c->nombre}}</td>
  					<td>{{$c->apellidos}}</td>
            <td>{{$c->direccion}}</td>
            <td>{{$c->numero}}</td>
            <td>{{$c->email}}</td>
            <td style="">
              <a href="/clientes/{{$c->id}}/edit" data-toggle="modal" data-target="#myModal" class="btn btn-warning">Editar</a>
              {!! Form::open(array('url' => 'clientes/'.$c->id, 'method'=>'DELETE', 'class' => 'eliminar' ) ) !!}
                  <button type="submit" class="btn btn-danger">Eliminar</button>
              {!! Form::close() !!}
              <a href="/clientes/{{$c->id}}" class="btn btn-primary" >Ver</a> 
          </td>
  				</tr>
  				@endforeach
			</table>
      {!! $clientes->render() !!}
    </div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="nuevocliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>
            </div>
            <div class="modal-body">
            {!! Form::open((array('route' => 'clientes.store'))) !!}
                <label>Numero de Cliente</label>
                {!! Form::text('numero',null,['class'=>'form-control']) !!}
                <label>Nombre de Cliente</label>
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}
                <label>Apellidos</label>
                {!! Form::text('apellidos',null,['class'=>'form-control']) !!}
                <label>Direccion</label>
                {!! Form::text('direccion',null,['class'=>'form-control']) !!}
                <label>Email</label>
                {!! Form::email('email',null,['class'=>'form-control']) !!}
                <label>Contraseña</label>
                {!! Form::password('password', array('placeholder'=>'****', 'class'=>'form-control' )) !!}
            </div>
            <div class="modal-footer">
                {!! Form::submit('Guardar',['class'=>'form-group btn btn-success'])!!}
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    $('#nuevocliente').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
    $('#myModal').on('shown.bs.modal', function () {
        //$('#myInput').focus()
    })
    $('#myModal').on('hidden.bs.modal', function() {
        $(this).removeData('.modal-content');
    });
</script>