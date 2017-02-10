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
      @if(Session::has('editar'))
          <p class="alert alert-warning">{{ session::get('editar') }}</p>
      @endif
      @if(Session::has('formato'))
          <p class="alert alert-warning">{{ session::get('formato') }}</p>
      @endif    
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Nuevo Comercial</button>
      <br><br>
      <table class="table table-bordered">
  				<tr>
  					 <th>Nombre</th>
  					 <th>Tipo</th>
             <th>Vista previa</th>
             <th>Acciones</th>
  				</tr>
  				@foreach($comerciales as $c)
  				<tr>
  					  <td>{{$c->ruta}}</td>
  					  <td>{{$c->tipo}}</td>
              <td><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/turnomatic/public/comercial/'.$c->ruta; ?>" class="btn btn-info" target="_blank">Abrir</a></td>
              <td style="width: 400px;">
          <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/turnomatic/public/comerciales/'.$c->id .'/edit' ?>" class="btn btn-warning">Editar</a>
                  {!! Form::open(array('url' => 'comerciales/'.$c->id, 'method'=>'DELETE', 'class' => 'eliminar' ) ) !!}
                  {!! Form::hidden('ruta',$c->ruta,['class'=>'form-control']) !!}
                      <div ng-controller="comercialController">
                        <button type="submit" class="btn btn-danger" ng-click="comercial()">Eliminar</button>
                      </div>
                  {!! Form::close() !!} 
              </td>
  				</tr>
  			  @endforeach
			</table>
    </div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-controller="comercialController">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Comercial</h4>
            </div>
            <div class="modal-body">
            {!! Form::open((array('route' => 'comerciales.store', 'files'=>true ))) !!}
                <label>Archivo</label>
                {!! Form::file('file',null,['class'=>'form-control']) !!}
                {!! Form::label('tipo', 'Tipo') !!}
                {!! Form::select('tipo',['video' => 'Video', 'imagen' => 'Imagen'], 'imagen',['class' => 'form-control', 'id' => 'tipo']) !!}
            </div>
            <div class="modal-footer">
                <button type="submit" name="Guardar" class="btn btn-success" ng-click="comercial()">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
   
    $('#myModal').on('shown.bs.modal', function () {
        //$('#myInput').focus()
    })
</script>