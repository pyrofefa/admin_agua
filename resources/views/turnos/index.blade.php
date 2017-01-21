@extends('plantillas.app')
@section('content')
<div class="container">
     <table class="table table-bordered">
        @foreach($sucursal as $s)
        <tr>
            <td>{{$s->nombre}}</td>
            <td>
                <a href="http://localhost/admin_agua/public/turnos/sucursal/{{$s->id}}" class="btn btn-info">Ver</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection