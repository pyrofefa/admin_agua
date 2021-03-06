@extends('plantillas.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         @if(Session::has('nuevo'))
                <p class="alert alert-success">{{ session::get('nuevo') }}</p>
            @endif
        @if(Session::has('message'))
                <p class="alert alert-danger">{{ session::get('message') }}</p>
            @endif
            @if(Session::has('editar'))
                <p class="alert alert-warning">{{ session::get('editar') }}</p>
            @endif  
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Nuevo Usuario</button>
            <br><br>
            <table class="table table-bordered">
          <tr>
              <th>Nombre</th>
              <th>Acciones</th>
          </tr>
          @foreach($usuarios as $u)
          <tr>
             <td>{{$u->name}}</td>
             <td style="width: 400px;">
                  <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/turnomatic/public/user/'.$u->id; ?>" class="btn btn-info">Ver</a>
                  <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/turnomatic/public/user/'.$u->id.'/edit' ?>" class="btn btn-warning">Editar</a>
                  {!! Form::open(array('url' => 'user/'.$u->id, 'method'=>'DELETE', 'class' => 'eliminar' ) ) !!}
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                  {!! Form::close() !!} 
             </td>
          </tr>
          @endforeach
      </table>
      </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4>
            </div>
            <div class="modal-body">
            {!! Form::open((array('route' => 'user.store', 'files'=>true ))) !!}
                <label>Numero</label>
                {!! Form::text('name',null,['class'=>'form-control']) !!}
                <label>Contraseña</label>
        {!! Form::password('password', array('placeholder'=>'****', 'class'=>'form-control' ) ) !!}     
      </div>
            <div class="modal-footer">
                {!! Form::submit('Guardar',['class'=>'form-group btn btn-success'])!!}
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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