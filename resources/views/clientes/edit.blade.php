<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Editar Cliente</h4>
</div>
<div class="modal-body">
    {!! Form::model($cliente, ['url'=>'clientes/'.$cliente->id.'/edit' , 'method'=> 'PUT']) !!}
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