<!DOCTYPE html>
<html lang="en" ng-app='rutas'>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agua</title>
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    <script src="http://localhost:8080/socket.io/socket.io.js"></script>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			    <span class="sr-only">Toggle Navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"></a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav">
		        	<li><img src="{{ '/img/agua_logo.jpeg' }}" width="50px" height="50px"></li>
					@role('caja')
					<li><a href="/home">Inicio</a></li>
					<!--<li><a href="/clientes">Clientes</a></li>-->
			    	@endrole
			    	@role('admin')
				    	<li><a href="/comerciales">Comerciales</a></li>
				    	<li><a href="/turnos">Turnos</a></li>
				    	<li><a href="/cajas">Cajas</a></li>
			    		<li><a href="/user">Usuarios</a></li>
					@endrole
				</ul>
				<ul class="nav navbar-nav navbar-right">
				    @if (Auth::guest())
				        <li><a href="{{route('auth/login')}}">Iniciar Sesión</a></li>
				    @else
		                <li>
		                    <a href="#">{{ Auth::user()->name}} {{ Auth::user()->apellidos }}</a>
		                </li>
		                <li><a href="{{route('auth/logout')}}">Cerrar Sesión</a></li>
		                
			        @endif
				</ul>
			</div>
		</div>
	</nav>
    <div class="container">
            @if (Session::has('errors'))
		    <div class="alert alert-warning" role="alert">
			<ul>
	            <strong>Oops! Algo salió mal : </strong>
			    @foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
    </div>
    @yield('content')
    <!-- Scripts -->
    {!! Html::script('assets/js/jquery-3.1.1.min.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
	{!! Html::script('assets/js/angular.min.js') !!}
	{!! Html::script('assets/js/angular-resource.min.js') !!}
	{!! Html::script('assets/js/main.js') !!}
	{!! Html::script('assets/js/cronometro.js') !!}
</body>
</html>