$(document).ready(function() {
    var id = $('#valor').val();
    var fecha = $('#fecha').val();
    var fecha_dos = $('#fecha_dos').val();
	//console.log(id);
    var options_aclaraciones_hora_fecha = {
    	chart:{
    			renderTo: 'aclaracioneshorafecha',

			}, 
		    title: {
		        text: 'Aclaraciones por hora',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Hora'
		        },
		         /*scrollbar: {
            		enabled: true
        		},*/
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Numero de Turnos'
		        },
		        plotLines: [{
		            value: 0,
		            width: 1,
		            color: '#808080'
		        }]
		    },
		    tooltip: {
		        valueSuffix: ''
		    },
		    legend: {
		        layout: 'vertical',
		        align: 'right',
		        verticalAlign: 'middle',
		        borderWidth: 0
		    },
		    series: [{
		    	name: 'Alto Consumo (con y sin medidor)',
		        data: []
		    },{
		    	name: 'Reconexion de servicio',
		        data: []
		    },{
		    	name: 'Error en lectura',
		        data: []
			},{
		    	name: 'No toma de lectura',
		        data: []
			},{
		    	name: 'No entrega de recibo',
		        data: []
			},{
		    	name: 'Cambio de tarifa',
		        data: []
			},{
		    	name: 'Solicitud de medidor',
		        data: []
			},{
		    	name: 'Otros tramites',
		        data: []
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/altoconsumo/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[0].data.push(data.numero);
              	options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/reconexion"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[1].data.push(data.numero);
              	options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/errordelectura/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[2].data.push(data.numero);
              	options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/notoma/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[3].data.push(data.numero);
              	options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/noentrega/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[4].data.push(data.numero);
              	options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/cambiodetarifa/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[5].data.push(data.numero);
              	options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
    		$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/solicitud/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[6].data.push(data.numero);
              	options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/otros/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[7].data.push(data.numero);
              	options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});


    	var options_aclaraciones_hora_fecha_id = {
    	chart:{
    			renderTo: 'aclaracioneshorafechaid',

			}, 
		    title: {
		        text: 'Aclaraciones por hora',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Hora'
		        },
		         /*scrollbar: {
            		enabled: true
        		},*/
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Numero de Turnos'
		        },
		        plotLines: [{
		            value: 0,
		            width: 1,
		            color: '#808080'
		        }]
		    },
		    tooltip: {
		        valueSuffix: ''
		    },
		    legend: {
		        layout: 'vertical',
		        align: 'right',
		        verticalAlign: 'middle',
		        borderWidth: 0
		    },
		    series: [{
		    	name: 'Alto Consumo (con y sin medidor)',
		        data: []
		    },{
		    	name: 'Reconexion de servicio',
		        data: []
		    },{
		    	name: 'Error en lectura',
		        data: []
			},{
		    	name: 'No toma de lectura',
		        data: []
			},{
		    	name: 'No entrega de recibo',
		        data: []
			},{
		    	name: 'Cambio de tarifa',
		        data: []
			},{
		    	name: 'Solicitud de medidor',
		        data: []
			},{
		    	name: 'Otros tramites',
		        data: []
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/altoconsumo_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[0].data.push(data.numero);
              	options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/reconexion_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[1].data.push(data.numero);
              	options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/errordelectura_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[2].data.push(data.numero);
              	options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/notoma_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[3].data.push(data.numero);
              	options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/noentrega_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[4].data.push(data.numero);
              	options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/cambiodetarifa_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[5].data.push(data.numero);
              	options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
    		$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/solicitud_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[6].data.push(data.numero);
              	options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/otros_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[7].data.push(data.numero);
              	options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});

    	var options_aclaraciones = {
    	chart:{
    			renderTo: 'aclaracioneshora',

			}, 
		    title: {
		        text: 'Aclaraciones por hora',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Hora'
		        },
		         /*scrollbar: {
            		enabled: true
        		},*/
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Numero de Turnos'
		        },
		        plotLines: [{
		            value: 0,
		            width: 1,
		            color: '#808080'
		        }]
		    },
		    tooltip: {
		        valueSuffix: ''
		    },
		    legend: {
		        layout: 'vertical',
		        align: 'right',
		        verticalAlign: 'middle',
		        borderWidth: 0
		    },
		    series: [{
		    	name: 'Alto Consumo (con y sin medidor)',
		        data: []
		    },{
		    	name: 'Reconexion de servicio',
		        data: []
		    },{
		    	name: 'Error en lectura',
		        data: []
			},{
		    	name: 'No toma de lectura',
		        data: []
			},{
		    	name: 'No entrega de recibo',
		        data: []
			},{
		    	name: 'Cambio de tarifa',
		        data: []
			},{
		    	name: 'Solicitud de medidor',
		        data: []
			},{
		    	name: 'Otros tramites',
		        data: []
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/altoconsumo", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones.series[0].data.push(data.numero);
              	options_aclaraciones.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/reconexion", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones.series[1].data.push(data.numero);
              	options_aclaraciones.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/errordelectura", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones.series[2].data.push(data.numero);
              	options_aclaraciones.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/notoma", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones.series[3].data.push(data.numero);
              	options_aclaraciones.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/noentrega", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones.series[4].data.push(data.numero);
              	options_aclaraciones.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/cambiodetarifa", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones.series[5].data.push(data.numero);
              	options_aclaraciones.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones);
    	});
    		$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/solicitud", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones.series[6].data.push(data.numero);
              	options_aclaraciones.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/otros", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones.series[7].data.push(data.numero);
              	options_aclaraciones.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones);
    	});

    	var options_aclaraciones_hora_id = {
    	chart:{
    			renderTo: 'aclaracioneshoraid',

			}, 
		    title: {
		        text: 'Aclaraciones por hora',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Hora'
		        },
		         /*scrollbar: {
            		enabled: true
        		},*/
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Numero de Turnos'
		        },
		        plotLines: [{
		            value: 0,
		            width: 1,
		            color: '#808080'
		        }]
		    },
		    tooltip: {
		        valueSuffix: ''
		    },
		    legend: {
		        layout: 'vertical',
		        align: 'right',
		        verticalAlign: 'middle',
		        borderWidth: 0
		    },
		    series: [{
		    	name: 'Alto Consumo (con y sin medidor)',
		        data: []
		    },{
		    	name: 'Reconexion de servicio',
		        data: []
		    },{
		    	name: 'Error en lectura',
		        data: []
			},{
		    	name: 'No toma de lectura',
		        data: []
			},{
		    	name: 'No entrega de recibo',
		        data: []
			},{
		    	name: 'Cambio de tarifa',
		        data: []
			},{
		    	name: 'Solicitud de medidor',
		        data: []
			},{
		    	name: 'Otros tramites',
		        data: []
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/altoconsumo/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_id.series[0].data.push(data.numero);
              	options_aclaraciones_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/reconexion/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_id.series[1].data.push(data.numero);
              	options_aclaraciones_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/errordelectura/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_id.series[2].data.push(data.numero);
              	options_aclaraciones_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/notoma/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_id.series[3].data.push(data.numero);
              	options_aclaraciones_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/noentrega/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_id.series[4].data.push(data.numero);
              	options_aclaraciones_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/cambiodetarifa/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_id.series[5].data.push(data.numero);
              	options_aclaraciones_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_id);
    	});
    		$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/solicitud/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_id.series[6].data.push(data.numero);
              	options_aclaraciones_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/otros/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_id.series[7].data.push(data.numero);
              	options_aclaraciones_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_id);
    	});




    	var options_aclaraciones_mes = {
    	chart:{
    			renderTo: 'atencionaclaraciones',

			}, 
		    title: {
		        text: 'Promedio tiempo de atencion aclaraciones por mes',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Mes'
		        },
		         /*scrollbar: {
            		enabled: true
        		},*/
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Promedio'
		        },
		        plotLines: [{
		            value: 0,
		            width: 1,
		            color: '#808080'
		        }]
		    },
		    tooltip: {
		        valueSuffix: ''
		    },
		    legend: {
		        layout: 'vertical',
		        align: 'right',
		        verticalAlign: 'middle',
		        borderWidth: 0
		    },
		    series: [{
		    	name: 'Alto Consumo (con y sin medidor)',
		        data: []
		    },{
		    	name: 'Reconexion de servicio',
		        data: []
		    },{
		    	name: 'Error en lectura',
		        data: []
			},{
		    	name: 'No toma de lectura',
		        data: []
			},{
		    	name: 'No entrega de recibo',
		        data: []
			},{
		    	name: 'Cambio de tarifa',
		        data: []
			},{
		    	name: 'Solicitud de medidor',
		        data: []
			},{
		    	name: 'Otros tramites',
		        data: []
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_altoconsumo", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes.series[0].data.push(data.numero);
              	options_aclaraciones_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_reconexion", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes.series[1].data.push(data.numero);
              	options_aclaraciones_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_errordelectura", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes.series[2].data.push(data.numero);
              	options_aclaraciones_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_notoma", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes.series[3].data.push(data.numero);
              	options_aclaraciones_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_noentrega", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes.series[4].data.push(data.numero);
              	options_aclaraciones_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_cambiodetarifa", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes.series[5].data.push(data.numero);
              	options_aclaraciones_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes);
    	});
    		$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_solicitud", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes.series[6].data.push(data.numero);
              	options_aclaraciones_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_otros", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes.series[7].data.push(data.numero);
              	options_aclaraciones_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes);
    	});


    	var options_aclaraciones_mes_espera = {
    	chart:{
    			renderTo: 'esperaaclaraciones',

			}, 
		    title: {
		        text: 'Promedio tiempo de espera aclaraciones por mes',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Mes'
		        },
		         /*scrollbar: {
            		enabled: true
        		},*/
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Promedio'
		        },
		        plotLines: [{
		            value: 0,
		            width: 1,
		            color: '#808080'
		        }]
		    },
		    tooltip: {
		        valueSuffix: ''
		    },
		    legend: {
		        layout: 'vertical',
		        align: 'right',
		        verticalAlign: 'middle',
		        borderWidth: 0
		    },
		    series: [{
		    	name: 'Alto Consumo (con y sin medidor)',
		        data: []
		    },{
		    	name: 'Reconexion de servicio',
		        data: []
		    },{
		    	name: 'Error en lectura',
		        data: []
			},{
		    	name: 'No toma de lectura',
		        data: []
			},{
		    	name: 'No entrega de recibo',
		        data: []
			},{
		    	name: 'Cambio de tarifa',
		        data: []
			},{
		    	name: 'Solicitud de medidor',
		        data: []
			},{
		    	name: 'Otros tramites',
		        data: []
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_altoconsumo", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera.series[0].data.push(data.numero);
              	options_aclaraciones_mes_espera.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_reconexion", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera.series[1].data.push(data.numero);
              	options_aclaraciones_mes_espera.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_errordelectura", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera.series[2].data.push(data.numero);
              	options_aclaraciones_mes_espera.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_notoma", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera.series[3].data.push(data.numero);
              	options_aclaraciones_mes_espera.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_noentrega", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera.series[4].data.push(data.numero);
              	options_aclaraciones_mes_espera.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_cambiodetarifa", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera.series[5].data.push(data.numero);
              	options_aclaraciones_mes_espera.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera);
    	});
    		$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_solicitud", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera.series[6].data.push(data.numero);
              	options_aclaraciones_mes_espera.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_otros", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera.series[7].data.push(data.numero);
              	options_aclaraciones_mes_espera.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera);
    	});
});