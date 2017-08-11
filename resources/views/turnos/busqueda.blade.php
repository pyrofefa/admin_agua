@extends('plantillas.app')
@section('content')
<div class="container">
  <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <th>Turno</th>
                    <th>Ventanilla</th>
                    <!--<th>Tiempo</th>-->
                    <th>Asunto</th>
                    <th>Sub Asunto</th>
                    <th>Fecha</th>
                    <th>Llegada</th>
                    <th>Atendido</th>
                    <th>Salida</th>
                    <th>Tiempo de espera</th>
                    <th>Tiempo atendido</th>
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
                    <td>{{ $t->asunto }}</td>
                    <td>{{ $t->subasunto }}</td>
                    <td>{{ $t->created_at->format('d-m-Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($t->llegada)->format('h:i:s') }}</td>
                    <td>{{ Carbon\Carbon::parse($t->atendido)->format('h:i:s')  }}</td>
                    <td>{{ Carbon\Carbon::parse($t->fin)->format('h:i A')  }}</td>
                    <td>{{ Carbon\Carbon::parse($t->atendido)->diffForHumans(Carbon\Carbon::parse($t->llegada)) }}</td>
                    <td>{{ Carbon\Carbon::parse($t->fin)->diffForHumans(Carbon\Carbon::parse($t->atendido)) }}</td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection