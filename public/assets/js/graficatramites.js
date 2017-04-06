$(document).ready(function() {
    var id = $('#valor').val();
    var fecha = $('#fecha').val();
    var fecha_dos = $('#fecha_dos').val();
	//console.log(id);
    var options_tramites_hora_fecha = {
    	chart:{
    			renderTo: 'tramiteshorafecha',

			}, 
		    title: {
		        text: 'Tramites por hora',
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
		    	name: 'Contrato',
		        data: []
		    },{
		    	name: 'Convenio',
		        data: []
		    },{
		    	name: 'Cambio de nombre',
		        data: []
			},{
		    	name: 'Carta de no adeudo',
		        data: []
			},{
		    	name: 'Factibilidad',
		        data: []
			},{
		    	name: '2 o mas tramites',
		        data: []
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/contrato/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[0].data.push(data.numero);
              	options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/convenio/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[1].data.push(data.numero);
              	options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/cambio/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[2].data.push(data.numero);
              	options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/carta/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[3].data.push(data.numero);
              	options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/factibilidad/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[4].data.push(data.numero);
              	options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/dosomas/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[5].data.push(data.numero);
              	options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});


    	var options_tramites_id_hora_fecha = {
    	chart:{
    			renderTo: 'tramiteshorafechaid',

			}, 
		    title: {
		        text: 'Tramites por hora',
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
		    	name: 'Contrato',
		        data: []
		    },{
		    	name: 'Convenio',
		        data: []
		    },{
		    	name: 'Cambio de nombre',
		        data: []
			},{
		    	name: 'Carta de no adeudo',
		        data: []
			},{
		    	name: 'Factibilidad',
		        data: []
			},{
		    	name: '2 o mas tramites',
		        data: []
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/contrato_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[0].data.push(data.numero);
              	options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/convenio_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[1].data.push(data.numero);
              	options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/cambio_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[2].data.push(data.numero);
              	options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/carta_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[3].data.push(data.numero);
              	options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/factibilidad_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[4].data.push(data.numero);
              	options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/dosomas_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[5].data.push(data.numero);
              	options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});


    	var options_tramites_hora = {
    	chart:{
    			renderTo: 'tramiteshora',

			}, 
		    title: {
		        text: 'Tramites por hora',
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
		    	name: 'Contrato',
		        data: []
		    },{
		    	name: 'Convenio',
		        data: []
		    },{
		    	name: 'Cambio de nombre',
		        data: []
			},{
		    	name: 'Carta de no adeudo',
		        data: []
			},{
		    	name: 'Factibilidad',
		        data: []
			},{
		    	name: '2 o mas tramites',
		        data: []
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/contrato", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora.series[0].data.push(data.numero);
              	options_tramites_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/convenio", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora.series[1].data.push(data.numero);
              	options_tramites_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/cambio", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora.series[2].data.push(data.numero);
              	options_tramites_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/carta", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora.series[3].data.push(data.numero);
              	options_tramites_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/factibilidad", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora.series[4].data.push(data.numero);
              	options_tramites_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/dosomas", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora.series[5].data.push(data.numero);
              	options_tramites_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora);
    	});


    	var options_tramites_id = {
    	chart:{
    			renderTo: 'tramiteshoraid',

			}, 
		    title: {
		        text: 'Tramites por hora',
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
		    	name: 'Contrato',
		        data: []
		    },{
		    	name: 'Convenio',
		        data: []
		    },{
		    	name: 'Cambio de nombre',
		        data: []
			},{
		    	name: 'Carta de no adeudo',
		        data: []
			},{
		    	name: 'Factibilidad',
		        data: []
			},{
		    	name: '2 o mas tramites',
		        data: []
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/contrato/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id.series[0].data.push(data.numero);
              	options_tramites_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/convenio/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id.series[1].data.push(data.numero);
              	options_tramites_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/cambio/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id.series[2].data.push(data.numero);
              	options_tramites_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/carta_id/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id.series[3].data.push(data.numero);
              	options_tramites_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/factibilidad/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id.series[4].data.push(data.numero);
              	options_tramites_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/dosomas/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id.series[5].data.push(data.numero);
              	options_tramites_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id);
    	});


});