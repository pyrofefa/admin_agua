@extends('plantillas.app')
@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <h1 style="text-align: center">Cajas</h1>
      </div>
   </div>
   <table class="table table-bordered">
      @foreach($sucursal as $s)
      <tr>
        <td>{{$s->nombre}}</td>
        <td>
            <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/admin_agua/public/cajas/sucursal/'.$s->id; ?>" class="btn btn-info">Ver</a>
        </td>
    </tr>
      @endforeach
  </table>
</div>
@endsection