$(document).ready(function() {
    var id = $('#valor').val();
    var fecha = $('#fecha').val();
    var fecha_dos = $('#fecha_dos').val();
	//console.log(id);
    var options_pagos_hora_fecha = {
    	chart:{
    			renderTo: 'pagoshorafecha',

			}, 
		    title: {
		        text: 'Pagos por hora',
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
		    	name: 'Recibo',
		        data: []
		    },{
		    	name: 'Convenio',
		        data: []
		    },{
		    	name: 'Carta de no adeudo',
		        data: []
			}]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/recibo/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha.series[0].data.push(data.numero);
              	options_pagos_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/convenio/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha.series[1].data.push(data.numero);
              	options_pagos_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/carta/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha.series[2].data.push(data.numero);
              	options_pagos_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha);
    	});
    	

    	var options_pagos_hora_fecha_id = {
    	chart:{
    			renderTo: 'pagoshorafechaid',

			}, 
		    title: {
		        text: 'Pagos por hora',
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
		    	name: 'Recibo',
		        data: []
		    },{
		    	name: 'Convenio',
		        data: []
		    },{
		    	name: 'Carta de no adeudo',
		        data: []
			}]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/recibo_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha_id.series[0].data.push(data.numero);
              	options_pagos_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/convenio_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha_id.series[1].data.push(data.numero);
              	options_pagos_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/carta_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha_id.series[2].data.push(data.numero);
              	options_pagos_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha_id);
    	});

    	var options_pagos_hora = {
    	chart:{
    			renderTo: 'pagoshora',

			}, 
		    title: {
		        text: 'Pagos por hora',
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
		    	name: 'Recibo',
		        data: []
		    },{
		    	name: 'Convenio',
		        data: []
		    },{
		    	name: 'Carta de no adeudo',
		        data: []
			}]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/recibo", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora.series[0].data.push(data.numero);
              	options_pagos_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/convenio", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora.series[1].data.push(data.numero);
              	options_pagos_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/carta", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora.series[2].data.push(data.numero);
              	options_pagos_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora);
    	});


    	var options_pagos_hora_id = {
    	chart:{
    			renderTo: 'pagoshoraid',

			}, 
		    title: {
		        text: 'Pagos por hora',
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
		    	name: 'Recibo',
		        data: []
		    },{
		    	name: 'Convenio',
		        data: []
		    },{
		    	name: 'Carta de no adeudo',
		        data: []
			}]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/recibo/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_id.series[0].data.push(data.numero);
              	options_pagos_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/convenio/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_id.series[1].data.push(data.numero);
              	options_pagos_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/carta/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_id.series[2].data.push(data.numero);
              	options_pagos_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_id);
    	});

});