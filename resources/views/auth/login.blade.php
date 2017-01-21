@extends('plantillas.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    @if (Auth::guest())
                    <div class="panel-heading">Iniciar Sesión</div>
                    <div class="panel-body">
                        <div align="middle">
                            <img src="{{ 'img/agua_logo.jpeg' }}" width="150px" height="150px">
                            <!--<img src="http://192.168.100.27/admin_agua/public/img/agua_logo.jpeg" width="150px" height="150px">-->
                        </div>
                        {!! Form::open(['route' => 'auth/login', 'class' => 'form']) !!}
                            <div class="form-group">
                                <label>Nombre de Usuario</label>
                                {!! Form::text('name', '', ['class'=> 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                {!! Form::password('password', ['class'=> 'form-control']) !!}
                            </div>
                            <div class="checkbox">
                                <label><input name="remember" type="checkbox"> Recordar</label>
                            </div>
                            <div>                            
                                {!! Form::submit('login',['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                        @endif
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection