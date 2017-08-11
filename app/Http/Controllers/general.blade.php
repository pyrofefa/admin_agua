@extends('plantillas.app')
@section('content')
<div class="row">
	<div class="col-md-2">
        <ul class="nav nav-pills nav-stacked admin-menu" style="position: fixed; width: 150px; height: 560px; overflow-y: scroll;">
            <li><a href="#inicio"><i></i>Inicio</a></li>
			<li><a href="#turnos_totales"><i></i>Turnos totales</a></li>
            <li><a href="#turnos_realizados"><i></i>Turnos realizados</a></li>
            <li><a href="#turnos_abandonados"><i></i>Turnos abandonados</a></li>
            <li><a href="#operaciones_hora"><i></i>Operaciones por hora</a></li>
            <li><a href="#tramites_hora"><i></i>Tramites por hora</a></li>
            <li><a href="#aclaraciones_hora"><i></i>Aclaraciones por hora</a></li>
            <li><a href="#pagos_hora"><i></i>Pagos por hora</a></li>
            <li><a href="#promedio_tiempo"><i></i>Promedio de tiempo de espera y promedio de tiempo de atencion</a></li>
            <li><a href="#promedio_espera_hora"><i></i>Promedio de tiempo de espera hora</a></li>
            <li><a href="#promedio_atencion_hora"><i></i>Promedio de tiempo de atencion hora</a></li>
            <li><a href="#turnos_mes"><i></i>Turnos por mes</a></li>
            <li><a href="#promedio_espera_mes"><i></i>Promedio de tiempo de espera mes</a></li>
            <li><a href="#promedio_atencion_mes"><i></i>Promedio de tiempo de atencion por mes</a></li>
            <li><a href="#operaciones_por_fecha"><i></i>Operaciones por fecha</a></li>
            <li><a href="#promedio_tramites_mes"><i></i>Promedio de tiempo tramites por meses</a></li>
            <li><a href="#promedio_aclaraciones_mes" ><i></i>Promedio de tiempo aclaraciones por meses</a></li>
        </ul>
    </div>
    <div class="col-md-6">
    	<div class="container">
			 <div class="row" id="inicio">
				<div class="col-md-12">
					<h1 style="text-align: center">General al dia: {{$carbon}}  </h1>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-body">
						<a href="excel">
							<button type="button" class="btn btn-success">
		  						<span class="glyphicon glyphicon-save"> Exportar</span>
							</button>
						</a>
					<div class="row">
						<div class="col-md-4">
						<br><br>
		            	{!! Form::open((array( 'url' => 'home/general/fecha', 'method' => 'GET' ))) !!}
		     			    <div class="form-group" >
								{!! Form::text('fecha',null,['class' => 'form-control datepicket', 'placeholder' => 'Buscar fecha...','id' => 'fecha']) !!}
		    				</div>
		    				<div class="form-group">
		    					{!! Form::text('fecha_dos',null,['class' => 'form-control datepicket', 'placeholder' => 'Buscar fecha...','id' => 'fecha_dos']) !!}
		    				</div>
							<div class="form-group">
								<span class="input-group-btn" style="text-align: right;">
		    						<button class="btn btn-default" type="submit">
		    							<span class="glyphicon glyphicon-search"></span>
		    						</button>
		    					</span> 
							</div>
		    			</div>
		    			{!! Form::close() !!}
		  				<div class="col-md-4">
							<h5> Turnos atendidos: {{ $atendidos }}</h5>
							<h5> Turnos en espera: {{ $espera }}</h5>
							<h5> Turnos abandonados: {{ $abandonados }}</h5>	
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr width="50px">
									<td width="1px;"></td>
									<td width="20px;"><strong>Atendidas</strong></td>
									<td width="20px;"><strong>Abandonadas</strong></td>
								</tr>
								<tr width="50px">
									<td width="1px;">Aclaraciones</td>
									<td>{{$aclaraciones}}</td>
									<td>{{$aclaraciones_abandonadas}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Tramites</td>
									<td>{{$tramites}}</td>
									<td>{{$tramites_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Pagos</td>
									<td>{{$pago}}</td>
									<td>{{$pago_abandonado}}</td>
								</tr>
							</table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr width="50px">
									<td width="1px;"><strong>Tramites</strong></td>
									<td width="20px;"><strong>Atendidas</strong></td>
									<td width="20px;"><strong>Abandonadas</strong></td>
								</tr>
								<tr width="50px">
									<td width="1px;">Contrato</td>
									<td>{{$contrato}}</td>
									<td>{{$contrato_abandonado}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Convenio</td>
									<td>{{$convenio}}</td>
									<td>{{$convenio_abandonado}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Cambio de nombre</td>
									<td>{{$cambio}}</td>
									<td>{{$cambio_abandonado}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Carta de no Adeudo</td>
									<td>{{$carta}}</td>
									<td>{{$carta_abandonado}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Factibilidad</td>
									<td>{{$factibilidad}}</td>
									<td>{{$factibilidad_abandonado}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">2 o mas tramites</td>
									<td>{{$dosomas}}</td>
									<td>{{$dosomas_abandonado}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Solicitud de tarifa social</td>
									<td>{{$solicitud_tarifa}}</td>
									<td>{{$solicitud_tarifa_abandonado}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Baja por impago</td>
									<td>{{$baja_impago}}</td>
									<td>{{$baja_impago_abandonado}}</td>
								</tr>
							</table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr width="50px">
									<td width="1px;"><strong>Pago</strong></td>
									<td width="20px;"><strong>Atendidas</strong></td>
									<td width="20px;"><strong>Abandonadas</strong></td>
								</tr>
								<tr width="50px">
									<td width="1px;">Recibo</td>
									<td>{{$pago_recibo}}</td>
									<td>{{$pago_recibo_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Convenio</td>
									<td>{{$pago_convenio}}</td>
									<td>{{$pago_convenio_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Carta de no Adeudo</td>
									<td>{{$pago_carta}}</td>
									<td>{{$pago_carta_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Pagos de facturas</td>
									<td>{{$pago_facturas}}</td>
									<td>{{$pago_facturas_abandonados}}</td>
								</tr>
							</table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr width="50px">
									<td width="1px;"><strong>Aclaraciones</strong></td>
									<td width="20px;"><strong>Atendidas</strong></td>
									<td width="20px;"><strong>Abandonadas</strong></td>
								</tr>
								<tr width="50px">
									<td width="1px;">Alto Consumo <br>(Con y sin medidor)</td>
									<td>{{$alto}}</td>
									<td>{{$alto_abandonado}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Reconexion de servicios</td>
									<td>{{$reconexion}}</td>
									<td>{{$reconexion_abandonado}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Error en lectura</td>
									<td>{{$error}}</td>
									<td>{{$error_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">No toma de lectura</td>
									<td>{{$notoma}}</td>
									<td>{{$notoma_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">No entrega de recibo</td>
									<td>{{$noentrega}}</td>
									<td>{{$noentrega_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Cambio de tarifa</td>
									<td>{{$cambiotarifa}}</td>
									<td>{{$cambiodetarifa_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Solicitud de medidor</td>
									<td>{{$solicitud}}</td>
									<td>{{$solicitud_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px;">Otros tramites</td>
									<td>{{$otros}}</td>
									<td>{{$otros_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px">Alta estimación de consumo</td>
									<td>{{$alta_estimacion}}</td>
									<td>{{$alta_estimacion_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px">Propuestas de pago</td>
									<td>{{$propuestas}}</td>
									<td>{{$propuestas_abandonados}}</td>
								</tr>
								<tr width="50px">
									<td width="1px">Aviso de incidencia</td>
									<td>{{$aviso}}</td>
									<td>{{$aviso_abandonados}}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="panel panel-default" id="turnos_totales">
				<div class="panel-body">
					<h4 style="text-align: center;"> Turnos Totales <br>{{$carbon}}</h4>
					<div class="row">
						<div class="col-md-12">
							<div id="totales"></div>
						</div>
					</div>
				</div>
			</div>
			<br>	
			<div class="panel panel-default">
				<div class="panel-body">
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<div class="row">
						<div class="col-md-6">
							<div id="subasunto"></div>
						</div>
						<div class="col-md-6">
							<div id="subasuntoabandonado"></div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="panel panel-default">
				<div class="panel-body" id="turnos_realizados">
					<h4 style="text-align: center;">Realizados</h4>
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<br><br>
					<div class="row">
						<div class="col-md-6">
							<div id="tramites"></div>
						</div>
						<div class="col-md-6">
							<div id="aclaraciones"></div>
						</div>
						<div class="col-md-6">
							<div id="pagos"></div>
						</div>
					</div>
				</div>
			</div>
			<br><br>
			<div class="panel panel-default">
				<div class="panel-body" id="turnos_abandonados">
					<h4 style="text-align: center;">Abandonados</h4>
					<h4 style="text-align: center;">{{$carbon}}</h4>
					<br><br>
					<div class="row">
						<div class="col-md-6">
							<div id="tramitesbandonados"></div>
						</div>
						<div class="col-md-6">
							<div id="aclaracionesabandonados"></div>
						</div>
						<div class="col-md-6">
							<div id="pagosabandonados"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body" id="operaciones_hora">
					<div class="row">
						<div class="col-md-12">
							<h4 style="text-align: center;">{{$carbon}}</h4>
							<div id="linealhora"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h4 style="text-align: center;">{{$carbon}}</h4>
							<div id="linealabandonadoshora"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row" id="tramites_hora">
						<div class="col-md-12">
							<h4 style="text-align: center;">{{$carbon}}</h4>
							<div id="tramiteshora"></div>
						</div>
					</div>
					<div class="row" id="aclaraciones_hora">
						<div class="col-md-12">
							<h4 style="text-align: center;">{{$carbon}}</h4>
							<div id="aclaracioneshora"></div>
						</div>
					</div>
					<div class="row" id="pagos_hora">
						<div class="col-md-12">
							<h4 style="text-align: center;">{{$carbon}}</h4>
							<div id="pagoshora"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default" id="promedio_tiempo">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<h4 style="text-align: center;">{{$carbon}}</h4>
							<table id="datatable" class="table table-bordered">
				    			<thead>
				        			<tr>
							            <th></th>
							           	<th>No.</th>
										<th>Promedio de tiempo de espera</th>
										<th>Promedio de tiempo de atencion</th>
				        			</tr>
				    			</thead>
				    			<tbody>
							        <!--<tr>
							            <th>Global</th>
							            <td>{{ $promedio }}</td>
							            <td>{{ $promedio_atendido }}</td>
							        </tr>-->
							        <tr>
							            <th>Tramites</th>
							            @if(is_null($promedio_tramites->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$tramites}}</td>
											<td>{{ $promedio_tramites->tiempo }}</td>
							            @endif	
							            @if(is_null($promedio_tramitesa->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_tramitesa->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Aclaraciones</th>
							            @if(is_null($promedio_aclaraciones->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$aclaraciones}}</td>	
							            	<td>{{ $promedio_aclaraciones->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_aclaracionesa->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_aclaracionesa->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Pago</th>
							            @if(is_null($promedio_pago->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$pago}}</td>	
							            	<td>{{ $promedio_pago->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_pagoa->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_pagoa->tiempo }}</td>
							        	@endif
							        </tr>
							     </tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="barraspromedio"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<h4 style="text-align: center;">Tramites {{$carbon}}</h4>
							<table id="datatabletramites" class="table table-bordered">
				    			<thead>
				        			<tr>
							            <th></th>
							            <th>No.</th>
							            <th>Promedio de tiempo de espera</th>
							            <th>Promedio de tiempo de atencion</th>
				        			</tr>
				    			</thead>
				    			<tbody>
							        <tr>
							            <th>Contrato</th>
							            @if(is_null($promedio_contrato_espera->tiempo ))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$contrato}}</td>	
							            	<td>{{ $promedio_contrato_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_contrato->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_contrato->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Convenio</th>
							            @if(is_null($promedio_convenio_espera->tiempo))
							            	<td>0</td>
											<td>0.00</td>
							            @else
							            	<td>{{$convenio}}</td>	
							            	<td>{{ $promedio_convenio_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_convenio->tiempo))
							            	<td>0.00</td>
							            @else		
							            	<td>{{ $promedio_convenio->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Cambio de nombre</th>
							            @if(is_null($promedio_cambio_espera->tiempo))
							            	<td>0</td>
											<td>0.00</td>
							            @else	
							            	<td>{{$cambio}}</td>
							            	<td>{{ $promedio_cambio_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_cambio->tiempo))
											<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_cambio->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Carta de no adeudo</th>
							            @if(is_null($promedio_carta_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$carta}}</td>		
							            	<td>{{ $promedio_carta_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_carta->tiempo))
							            	<td>0.00</td>
							            @else
							            	<td>{{ $promedio_carta->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Factibilidad de servicio</th>
							            @if(is_null($promedio_factibilidad_espera->tiempo))
							            	<td>0</td>
											<td>0.00</td>
							            @else
							            	<td>{{$factibilidad}}</td>	
							            	<td>{{ $promedio_factibilidad_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_factibilidad->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_factibilidad->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>2 o mas tramites</th>
							            @if(is_null($promedio_dosomas_espera->tiempo))
							            	<td>0</td>
											<td>0.00</td>
							            @else
							            	<td>{{$dosomas}}</td>	
							            	<td>{{ $promedio_dosomas_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_dosomas->tiempo))
											<td>0.00</td>
							            @else		
							            	<td>{{ $promedio_dosomas->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Solicitud de tarifa social</th>
							            @if(is_null($promedio_solicitud_tarifa_espera->tiempo))
							            	<td>0</td>
											<td>0.00</td>
							            @else
							            	<td>{{$solicitud_tarifa}}</td>	
							            	<td>{{ $promedio_solicitud_tarifa_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_solicitud_tarifa->tiempo))
											<td>0.00</td>
							            @else		
							            	<td>{{ $promedio_solicitud_tarifa->tiempo }}</td>
							        	@endif
							        </tr>
		 					         <tr>
							            <th>Baja por impago</th>
							            @if(is_null($promedio_solicitud_tarifa_espera->tiempo))
							            	<td>0</td>
											<td>0.00</td>
							            @else
							            	<td>{{$solicitud_tarifa}}</td>	
							            	<td>{{ $promedio_solicitud_tarifa_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_baja->tiempo))
											<td>0.00</td>
							            @else		
							            	<td>{{$promedio_baja->tiempo}}</td>
							        	@endif
							        </tr>
				    			</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="barraspromediotramites"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<h4 style="text-align: center;">Aclaraciones {{$carbon}} HOLA MUNDO</h4>
		 					<table id="datatableaclaraciones" class="table table-bordered">
				    			<thead>
				        			<tr>
							            <th></th>
							            <th>No.</th>
							            <th>Promedio de tiempo de espera</th>
							            <th>Promedio de tiempo de atencion</th>
				        			</tr>
				    			</thead>
				    			<tbody>
							        <tr>
							            <th>Alto consumo con y sin medidor</th>
							            @if(is_null($promedio_alto_espera->tiempo ))
							            	<td>0</td>
											<td>0.00</td>
							            @else	
							            	<td>{{$alto}}</td>
							            	<td>{{ $promedio_alto_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_alto->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_alto->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Reconexion de servicio</th>
							            @if(is_null($promedio_reconexion_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$reconexion}}</td>	
							            	<td>{{ $promedio_reconexion_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_reconexion->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_reconexion->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Error en lectura</th>
							            @if(is_null($promedio_error_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$error}}</td>	
							            	<td>{{ $promedio_error_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_error->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_error->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>No toma de lectura</th>
							            @if(is_null($promedio_notoma_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$notoma}}</td>
							            	<td>{{ $promedio_notoma_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_notoma->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_notoma->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>No entrega de recibo</th>
							            @if(is_null($promedio_noentrega_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else	
							            	<td>{{$noentrega}}</td>
							            	<td>{{ $promedio_noentrega_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_noentega->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_noentega->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Cambio de tarifa</th>
							            @if(is_null($promedio_cambiotarifa_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$cambiotarifa}}</td>	
							            	<td>{{ $promedio_cambiotarifa_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_cambiotarifa->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_cambiotarifa->tiempo }}</td>
							         	@endif
							         </tr>
							         <tr>
							            <th>Solicitud de medidor</th>
							            @if(is_null($promedio_solicitud_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$solicitud}}</td>	
							            	<td>{{ $promedio_solicitud_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_solicitud->tiempo))
							            	
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_solicitud->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Otros tramites</th>
							            @if(is_null($promedio_otros_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$otros}}</td>	
							            	<td>{{ $promedio_otros_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_otros->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_otros->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Alta estimación de consumo</th>
							            @if(is_null($promedio_altaestimacion_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$alta_estimacion}}</td>	
							            	<td>{{ $promedio_altaestimacion_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_altaestimacion->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_altaestimacion->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Propuestas de pago</th>
							            @if(is_null($promedio_propuestas_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$propuestas}}</td>	
							            	<td>{{ $promedio_propuestas_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_propuestas->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{$promedio_propuestas->tiempo}}</td>
							        	@endif
							        </tr>
							      	<tr>
							            <th>Aviso de incidencia</th>
							            @if(is_null($promedio_aviso_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{$aviso}}</td>	
							            	<td>{{ $promedio_aviso_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_aviso->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{$promedio_aviso->tiempo}}</td>
							        	@endif
							        </tr>
		 					    </tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="barraspromedioaclaraciones"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<h4 style="text-align: center;">Pagos {{$carbon}}</h4>
							<table id="datatablepago" class="table table-bordered">
				    			<thead>
				        			<tr>
							            <th></th>
							            <th>No.</th>
							            <th>Promedio de tiempo de espera</th>
							            <th>Promedio de tiempo de atencion</th>
				        			</tr>
				    			</thead>
				    			<tbody>
							        <tr>
							            <th>Pago de recibo</th>
							            @if(is_null($promedio_pago_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{ $pago_recibo }}</td>	
							            	<td>{{ $promedio_pago_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_pago_recibo->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_pago_recibo->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Pago de convenio</th>
							            @if(is_null($promedio_pago_convenio_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{ $pago_convenio }}</td>	
							            	<td>{{ $promedio_pago_convenio_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_pago_convenio->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_pago_convenio->tiempo }}</td>
							        	@endif
							        </tr>
							        <tr>
							            <th>Pago de carta de no adeudo</th>
							            @if(is_null($promedio_pago_carta_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{ $pago_carta }}</td>	
							            	<td>{{ $promedio_pago_carta_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_pago_carta->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_pago_carta->tiempo }}</td>
							        	@endif
							        </tr>
							         <tr>
							            <th>Pagos de facturas</th>
							            @if(is_null($promedio_pago_facturas_espera->tiempo))
							            	<td>0</td>
							            	<td>0.00</td>
							            @else
							            	<td>{{ $pago_facturas }}</td>	
							            	<td>{{ $promedio_pago_facturas_espera->tiempo }}</td>
							            @endif
							            @if(is_null($promedio_pago_facturas->tiempo))
							            	<td>0.00</td>
							            @else	
							            	<td>{{ $promedio_pago_facturas->tiempo }}</td>
							        	@endif
							        </tr>
							        
							   </tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="barraspromediopago"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row" id="promedio_espera_hora">
						<div class="col-md-12">
							<h4 style="text-align: center;">{{$carbon}}</h4>
							<div id="linealpromediohora"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row" id="promedio_atencion_hora">
						<div class="col-md-12">
							<h4 style="text-align: center;">{{$carbon}}</h4>
							<div id="linealpromediohoraatencion"></div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<h1 style="text-align: center">Reporte General Global</h1>
				</div>
			</div>
			<br>
			<br><br>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row" id="turnos_mes">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<td><strong>Asunto</strong></td>
									<td><strong>Mes</strong></td>
									<td><strong></strong></td>
								</tr>
								<tr>
									<td><strong></strong></td>
		 							@foreach($aclaraciones_mes as $pm)
 										<td>{{$pm->mes}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Aclaraciones</td>
									@foreach($aclaraciones_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Tramites</td>
									@foreach($tramites_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Pagos</td>
									@foreach($pagos_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
							</table>
							<br><br><br>
							<table class="table table-bordered">
								<tr>
									<td><strong>Tramites</strong></td>
									<td><strong>Mes</strong></td>
 								</tr>
								<tr>
									<td><strong></strong></td>
		 							@foreach($contrato_mes as $pm)
			 							<td>{{$pm->mes}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Contrato</td>
									@foreach($contrato_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Convenio</td>
									@foreach($convenio_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Cambio de nombre</td>
									@foreach($cambio_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Carta de no adeudo</td>
									@foreach($carta_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Factibilidad de servicio</td>
									@foreach($factibilidad_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>2 o mas tramites</td>
									@foreach($dosomas_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Solicitud de tarifa social</td>
									@foreach($dosomas_mes as $pm)
									<td>Falta</td>
									@endforeach
								</tr>
								<tr>
									<td>Baja por impago</td>
									@foreach($dosomas_mes as $pm)
									<td>Falta</td>
									@endforeach
								</tr>
							</table>
								<br><br><br>
								<table class="table table-bordered">
								<tr>
									<td><strong>Aclaraciones</strong></td>
									<td><strong>Mes</strong></td>
									<td><strong></strong></td>
								</tr>
								<tr>
									<td><strong></strong></td>
		 							@foreach($alto_mes as $pm)
			 							<td>{{$pm->mes}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Alto consumo con o sin medidor</td>
									@foreach($alto_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Reconexion de servicios</td>
									@foreach($reconexion_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Error en lectura</td>
									@foreach($error_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>No toma lectura</td>
									@foreach($notoma_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>No entrega de recibo</td>
									@foreach($noentrega_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Cambio de tarifa</td>
									@foreach($cambiotarifa_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Solicitud de medidor</td>
									@foreach($solicitud_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Otros tramites</td>
									@foreach($otro_mes as $pm)
									<td>{{$pm->numero}}</td>
									@endforeach
								</tr>
								<tr>
									<td>Alta estimación de consumo</td>
									@foreach($otro_mes as $pm)
									<td>Fallas</td>
									@endforeach
								</tr>
								<tr>
									<td>Propuestas de pago</td>
									@foreach($otro_mes as $pm)
									<td>Fallas</td>
									@endforeach
								</tr>
								<tr>
									<td>Aviso de incidencia</td>
									@foreach($otro_mes as $pm)
									<td>Fallas</td>
									@endforeach
								</tr>
							</table>
							<br><br><br>
							<table class="table table-bordered">
									<tr>
										<td><strong>Pagos</strong></td>
										<td><strong>Mes</strong></td>
										<td><strong></strong></td>
									</tr>
									<tr>
										<td><strong></strong></td>
			 							@foreach($pago_mes as $pm)
				 							<td>{{$pm->mes}}</td>
									@endforeach
									</tr>
									<tr>
										<td>Pago de recibo</td>
										@foreach($pago_mes as $pm)
										<td>{{$pm->numero}}</td>
										@endforeach
									</tr>
									<tr>
										<td>Pago de convenio</td>
										@foreach($pago_mes_convenio as $pm)
										<td>{{$pm->numero}}</td>
										@endforeach
									</tr>
									<tr>
										<td>Pago carta de no adeudo</td>
										@foreach($pago_mes_carta as $pm)
										<td>{{$pm->numero}}</td>
										@endforeach
									</tr>
									<tr>
										<td>Pagos de facturas</td>
										@foreach($pago_mes_carta as $pm)
										<td>FALTA</td>
										@endforeach
									</tr>
								</table>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12" id="promedio_espera_mes">
						<h3 style="text-align: center;">Promedio de tiempo de espera mes</h3><br>
					
						<table class="table table-bordered">
							<tr>
								<td width="100px"></td>
								@foreach($promedio_tramites_mes as $prom)
									<td><strong>{{$prom->mes}}</strong></td>										
								@endforeach
							</tr>
							<tr>
								<td><strong>Tramites</strong></td>
								@foreach($promedio_tramites_mes as $prom)
									<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
								@endforeach
							</tr>
		  					<tr>
								<td><strong>Aclaraciones</strong></td>
								@foreach($promedio_aclaraciones_mes as $prom)
									<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
								@endforeach
							</tr>
		  					<tr>
								<td><strong>Pago</strong></td>
								@foreach($promedio_pago_mes as $prom)
									<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
								@endforeach
							</tr>
						</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" id="promedio_atencion_mes">
							<h3 style="text-align: center;">Promedio de tiempo de atencion</h3><br>
							<table class="table table-bordered">
								<tr>
									<td width="100px"></td>
									@foreach($promedio_tramitesa_mes as $prom)
										@if($prom->mes=='1')
											<td><strong>Enero</strong></td>
										@elseif($prom->mes=='2')
											<td><strong>Febrero</strong></td>
										@elseif($prom->mes=='3')
											<td><strong>Marzo</strong></td>
										@elseif($prom->mes=='4')
											<td><strong>Abril</strong></td>
										@elseif($prom->mes=='5')
											<td><strong>Mayo</strong></td>
										@elseif($prom->mes=='6')
											<td><strong>Junio</strong></td>
										@elseif($prom->mes=='7')
											<td><strong>Julio</strong></td>
										@elseif($prom->mes=='8')
											<td><strong>Agosto</strong></td>
										@elseif($prom->mes=='9')
											<td><strong>Septiembre</strong></td>
										@elseif($prom->mes=='10')
											<td><strong>Octubre</strong></td>
										@elseif($prom->mes=='11')
											<td><strong>Noviembre</strong></td>
										@elseif($prom->mes=='12')
											<td><strong>Diciembre</strong></td>										
										@endif	
									@endforeach
								</tr>
								<tr>
									<td><strong>Tramites</strong></td>
									@foreach($promedio_tramitesa_mes as $prom)
										<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
									@endforeach
								</tr>
								<tr>
									<td width="100px"></td>
									@foreach($promedio_aclaracionesa_mes as $prom)
										@if($prom->mes=='1')
											<td><strong>Enero</strong></td>
										@elseif($prom->mes=='2')
											<td><strong>Febrero</strong></td>
										@elseif($prom->mes=='3')
											<td><strong>Marzo</strong></td>
										@elseif($prom->mes=='4')
											<td><strong>Abril</strong></td>
										@elseif($prom->mes=='5')
											<td><strong>Mayo</strong></td>
										@elseif($prom->mes=='6')
											<td><strong>Junio</strong></td>
										@elseif($prom->mes=='7')
											<td><strong>Julio</strong></td>
										@elseif($prom->mes=='8')
											<td><strong>Agosto</strong></td>
										@elseif($prom->mes=='9')
											<td><strong>Septiembre</strong></td>
										@elseif($prom->mes=='10')
											<td><strong>Octubre</strong></td>
										@elseif($prom->mes=='11')
											<td><strong>Noviembre</strong></td>
										@elseif($prom->mes=='12')
											<td><strong>Diciembre</strong></td>										
										@endif	
									@endforeach
								</tr>
								<tr>
									<td><strong>Aclaraciones</strong></td>
									@foreach($promedio_aclaracionesa_mes as $prom)
										<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
									@endforeach
								</tr>
								<tr>
									<td width="100px"></td>
									@foreach($promedio_pagoa_mes as $prom)
										@if($prom->mes=='1')
											<td><strong>Enero</strong></td>
										@elseif($prom->mes=='2')
											<td><strong>Febrero</strong></td>
										@elseif($prom->mes=='3')
											<td><strong>Marzo</strong></td>
										@elseif($prom->mes=='4')
											<td><strong>Abril</strong></td>
										@elseif($prom->mes=='5')
											<td><strong>Mayo</strong></td>
										@elseif($prom->mes=='6')
											<td><strong>Junio</strong></td>
										@elseif($prom->mes=='7')
											<td><strong>Julio</strong></td>
										@elseif($prom->mes=='8')
											<td><strong>Agosto</strong></td>
										@elseif($prom->mes=='9')
											<td><strong>Septiembre</strong></td>
										@elseif($prom->mes=='10')
											<td><strong>Octubre</strong></td>
										@elseif($prom->mes=='11')
											<td><strong>Noviembre</strong></td>
										@elseif($prom->mes=='12')
											<td><strong>Diciembre</strong></td>										
										@endif	
									@endforeach
								</tr>
								<tr>
									<td><strong>Pago</strong></td>
									@foreach($promedio_pagoa_mes as $prom)
										<td>{{$prom->tiempo}} ({{$prom->numero}})</td>
									@endforeach
								</tr>
							</table>
						</div>
					</div>
				</div>	
			</div>
			<div class="panel panel-default" id="operaciones_por_fecha">
				<div class="panel-body">
		 			<div class="row">
						<div class="col-md-12">
		 					<div id="lineal"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
		 					<div id="linealabandonados"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div id="linealpromedioatencion"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="linealpromedio"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default" id="promedio_tramites_mes">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div id="atenciontramites"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="esperatramites"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default" id="promedio_aclaraciones_mes">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div id="atencionaclaraciones"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="esperaaclaraciones"></div>
						</div>
					</div>
				</div>
			</div>																					
		</div>
    </div>
</div>

@endsection
@section('javascript')
{!! Html::script('assets/js/highcharts.js') !!}
{!! Html::script('assets/js/data.js') !!}
{!! Html::script('assets/js/exporting.js') !!}
{!! Html::script('assets/js/graficas_generales.js') !!}
{!! Html::script('assets/js/graficalineal.js')!!}
@stop

<!--<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="assets/js/exporting.js"></script>-->