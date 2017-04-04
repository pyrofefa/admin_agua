@extends('plantillas.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
       
         <table class="table table-striped">
            <tr>
                <th>Turno</th>
                <th>Ventanilla</th>
                <th>Tiempo</th>
                <th>Asunto</th>
                <th>Sub Asunto</th>
                <th>Fecha</th>
                <th>Llegada</th>
                <th>Tiempo de espera</th>
            </tr>
            @foreach($tikets as $t)
            <tr>
                @if($t->subasunto=="Aclaraciones y Otros")
                    <td>A{{ $t->turno }}</td>
                @elseif($t->subasunto=="Pago")
                    <td>P{{ $t->turno }}</td>    
                @elseif($t->subasunto=="Tramites")
                    <td>A{{ $t->turno }}</td>    
                @endif    
                <td>Ventanilla: {{ $t->fk_caja }}</td>
                <td>{{ $t->tiempo }}</td>
                <td>{{ $t->asunto }}</td>
                <td>{{ $t->subasunto }}</td>
                <td>{{ $t->created_at->format('d-m-Y') }}</td>
                <td>{{ $t->created_at->format('h:i A') }}</td>
                <td>{{ $t->updated_at->diffForHumans($t->created_at) }}</td>
            </tr>
            @endforeach
        </table>
         </div>
  </div>
</div>
@endsection