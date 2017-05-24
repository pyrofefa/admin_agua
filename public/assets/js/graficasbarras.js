$(document).ready(function() {
    var id = $('#valor').val();
    var fecha = $('#fecha').val();
    var fecha_dos = $('#fecha_dos').val();
    var options = {
    	chart:{
    			renderTo: 'lineal',

			}, 
		    title: {
		        text: 'Operaciones por fecha',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Fecha'
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
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntos", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options.series[0].data.push(data.numero);
              	options.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntosa", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options.series[1].data.push(data.numero);
              	options.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntosp", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options.series[2].data.push(data.numero);
              	options.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options);
    	});


    	var optionsid = {
    	chart:{
    			renderTo: 'linealid',

			}, 
		    title: {
		        text: 'Operaciones por fecha',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Fecha'
		        },
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
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntos/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsid.series[0].data.push(data.numero);
              	optionsid.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsid);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntosa/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsid.series[1].data.push(data.numero);
              	optionsid.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsid);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntosp/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsid.series[2].data.push(data.numero);
              	optionsid.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsid);
    	});

    	//Abandonados
    	var optionsabandonados = {
    	chart:{
    			renderTo: 'linealabandonados',

			}, 
		    title: {
		        text: 'Operaciones por fecha Abandonados',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Fecha'
		        },
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
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntosabandonados", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsabandonados.series[0].data.push(data.numero);
              	optionsabandonados.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsabandonados);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntosaabandonados", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsabandonados.series[1].data.push(data.numero);
              	optionsabandonados.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsabandonados);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntospabandonados", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsabandonados.series[2].data.push(data.numero);
              	optionsabandonados.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsabandonados);
    	});

    	//Abandonados
    	var optionsabandonadosid = {
    	chart:{
    			renderTo: 'linealabandonadosid',

			}, 
		    title: {
		        text: 'Operaciones por fecha Abandonados',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Fecha'
		        },
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
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntosabandonados/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsabandonadosid.series[0].data.push(data.numero);
              	optionsabandonadosid.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsabandonadosid);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntosaabandonados/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsabandonadosid.series[1].data.push(data.numero);
              	optionsabandonadosid.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsabandonadosid);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealsubasuntospabandonados/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsabandonadosid.series[2].data.push(data.numero);
              	optionsabandonadosid.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsabandonadosid);
    	});

    	var optionshora = {
    	chart:{
    			renderTo: 'linealhora',

			}, 
		    title: {
		        text: 'Operaciones por hora',
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
		        scrollbar: {
            		enabled: false
        		},
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
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtramiteshora", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionshora.series[0].data.push(data.numero);
              	optionshora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionshora);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshora", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionshora.series[1].data.push(data.numero);
              	optionshora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionshora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagoshora", function(data) {
        	 $.each(data, function(index, data)
             {
             	optionshora.series[2].data.push(data.numero);
              	optionshora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionshora);
    	});

    	var optionsabandonadoshora = {
    	chart:{
    			renderTo: 'linealabandonadoshora',

			}, 
		    title: {
		        text: 'Operaciones por hora Abandonados',
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
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		$.getJSON("http://localhost/turnomatic/public/graficas/linealtramiteshoraabandonados", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsabandonadoshora.series[0].data.push(data.numero);
              	optionsabandonadoshora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsabandonadoshora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshoraabandonados", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsabandonadoshora.series[1].data.push(data.numero);
              	optionsabandonadoshora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsabandonadoshora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagoshoraabandonados", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionsabandonadoshora.series[2].data.push(data.numero);
              	optionsabandonadoshora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionsabandonadoshora);
    	});


    	var options_hora_id = {
    	chart:{
    			renderTo: 'linealhoraid',

			}, 
		    title: {
		        text: 'Operaciones por hora',
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
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtramiteshoraid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_hora_id.series[0].data.push(data.numero);
              	options_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_hora_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshoraid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_hora_id.series[1].data.push(data.numero);
              	options_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagoshoraid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_hora_id.series[2].data.push(data.numero);
              	options_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_hora_id);
    	});



    	var options_hora_id_abandonados = {
    	chart:{
    			renderTo: 'linealabandonadoshoraid',

			}, 
		    title: {
		        text: 'Operaciones por hora abandonados',
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
		        scrollbar: {
            		enabled: true
        		},
		        
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
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtramiteshoraidabandonados/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_hora_id_abandonados.series[0].data.push(data.numero);
              	options_hora_id_abandonados.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_hora_id_abandonados);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshoraidabandonados/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_hora_id_abandonados.series[1].data.push(data.numero);
              	options_hora_id_abandonados.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_hora_id_abandonados);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagoshoraidabandonados/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_hora_id_abandonados.series[2].data.push(data.numero);
              	options_hora_id_abandonados.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_hora_id_abandonados);
    	});


    	//promedios
    	var optionspromedio = {
    	chart:{
    			renderTo: 'linealpromedio',

			}, 
		    title: {
		        text: 'Promedio de tiempo de espera fecha',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Fecha'
		        },
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
		    series: [/*{
		    	name: 'Global',
		        data: []
		    },*/{
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		/*$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaglobal", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionspromedio.series[0].data.push(data.numero);
              	optionspromedio.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionspromedio);
    	});*/
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperatramites", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionspromedio.series[0].data.push(data.numero);
              	optionspromedio.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionspromedio);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaaclaraciones", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionspromedio.series[1].data.push(data.numero);
              	optionspromedio.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionspromedio);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoespagos", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionspromedio.series[2].data.push(data.numero);
              	optionspromedio.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionspromedio);
    	});

    	var options_promedio_hora = {
    	chart:{
    			renderTo: 'linealpromediohora',

			}, 
		    title: {
		        text: 'Promedio de tiempo de espera hora',
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
		    series: [/*{
		    	name: 'Global',
		        data: []
		    },*/{
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		/*$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaglobalhora", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora.series[0].data.push(data.numero);
              	options_promedio_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora);
    	});*/
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperatramiteshora", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora.series[0].data.push(data.numero);
              	options_promedio_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaaclaracioneshora", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora.series[1].data.push(data.numero);
              	options_promedio_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoespagoshora", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora.series[2].data.push(data.numero);
              	options_promedio_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora);
    	});

    	var options_promedio_hora_fecha = {
    	chart:{
    			renderTo: 'linealpromediohorafecha',

			}, 
		    title: {
		        text: 'Promedio de tiempo de espera hora',
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
		    series: [/*{
		    	name: 'Global',
		        data: []
		    },*/{
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		/*$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaglobalhorafecha/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha.series[0].data.push(data.numero);
              	options_promedio_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha);
    	});*/
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperatramiteshorafecha/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha.series[0].data.push(data.numero);
              	options_promedio_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaaclaracioneshora/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha.series[1].data.push(data.numero);
              	options_promedio_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoespagoshorafecha/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha.series[2].data.push(data.numero);
              	options_promedio_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha);
    	});


    	var options_promedio_hora_fecha_id = {
    	chart:{
    			renderTo: 'linealpromediohorafechaid',

			}, 
		    title: {
		        text: 'Promedio de tiempo de espera hora',
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
		    series: [/*{
		    	name: 'Global',
		        data: []
		    },*/{
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		/*$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaglobalhorafechaid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha_id.series[0].data.push(data.numero);
              	options_promedio_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha_id);
    	});*/
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperatramiteshorafechaid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha_id.series[0].data.push(data.numero);
              	options_promedio_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaaclaracioneshoraid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha_id.series[1].data.push(data.numero);
              	options_promedio_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoespagoshorafechaid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha_id.series[2].data.push(data.numero);
              	options_promedio_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha_id);
    	});


    	var options_lineal_hora_fecha = {
    	chart:{
    			renderTo: 'linealhorafecha',

			}, 
		    title: {
		        text: 'Operaciones por hora',
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
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Numero'
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
		    series: [
		    {
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
 		$.getJSON("http://localhost/turnomatic/public/graficas/linealtramiteshorafecha/"+fecha+'/'+fecha_dos, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha.series[0].data.push(data.numero);
              	options_lineal_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshorafecha/"+fecha+'/'+fecha_dos, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha.series[1].data.push(data.numero);
              	options_lineal_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagohorafecha/"+fecha+'/'+fecha_dos, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha.series[2].data.push(data.numero);
              	options_lineal_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha);
    	});

    	var options_lineal_hora_fecha_aban = {
    	chart:{
    			renderTo: 'linealhorafechaabandonados',

			}, 
		    title: {
		        text: 'Operaciones por hora abandonados',
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
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Numero'
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
		    series: [
		    {
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		$.getJSON("http://localhost/turnomatic/public/graficas/linealtramiteshorafechaabandonados/"+fecha+'/'+fecha_dos, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_aban.series[0].data.push(data.numero);
              	options_lineal_hora_fecha_aban.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_aban);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshorafechaabandonados/"+fecha+'/'+fecha_dos, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_aban.series[1].data.push(data.numero);
              	options_lineal_hora_fecha_aban.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_aban);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagohorafechaabandonados/"+fecha+'/'+fecha_dos, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_aban.series[2].data.push(data.numero);
              	options_lineal_hora_fecha_aban.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_aban);
    	});

    	var options_lineal_hora_fecha_id = {
    	chart:{
    			renderTo: 'linealfechasucursal',

			}, 
		    title: {
		        text: 'Operaciones por hora',
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
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Numero'
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
		    series: [
		    {
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		$.getJSON("http://localhost/turnomatic/public/graficas/linealtramiteshorafechaid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_id.series[0].data.push(data.numero);
              	options_lineal_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshorafechaid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
         	 $.each(data, function(index, data)
             {
             	//console.log(data);
             	options_lineal_hora_fecha_id.series[1].data.push(data.numero);
              	options_lineal_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagohorafechaid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_id.series[2].data.push(data.numero);
              	options_lineal_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_id);
    	});


    	var options_lineal_hora_fecha_id_a = {
    	chart:{
    			renderTo: 'linealabandonadosfechasucursal',

			}, 
		    title: {
		        text: 'Operaciones por hora abandonados',
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
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Numero'
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
		    series: [
		    {
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		$.getJSON("http://localhost/turnomatic/public/graficas/linealtramiteshorafechaida/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_id_a.series[0].data.push(data.numero);
              	options_lineal_hora_fecha_id_a.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_id_a);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshorafechaida/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_id_a.series[1].data.push(data.numero);
              	options_lineal_hora_fecha_id_a.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_id_a);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagohorafechaida/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_id_a.series[2].data.push(data.numero);
              	options_lineal_hora_fecha_id_a.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_id_a);
    	});


    	var options_promedio_atencion = {
    	chart:{
    			renderTo: 'linealpromedioatencion',

			}, 
		    title: {
		        text: 'Promedio de tiempo de atencion fecha',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Fecha'
		        },
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
		    series: [/*{
		    	name: 'Global',
		        data: []
		    },*/{
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		/*$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionglobal", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion.series[0].data.push(data.numero);
              	options_promedio_atencion.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion);
    	});*/
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatenciontramites", function(data) {
         	 $.each(data, function(index, data)
             {
             	options_promedio_atencion.series[0].data.push(data.numero);
              	options_promedio_atencion.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionaclaraciones", function(data) {
         	 $.each(data, function(index, data)
             {
             	options_promedio_atencion.series[1].data.push(data.numero);
              	options_promedio_atencion.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionpago", function(data) {
         	 $.each(data, function(index, data)
             {
             	options_promedio_atencion.series[2].data.push(data.numero);
              	options_promedio_atencion.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion);
    	});

    	var options_promedio_atencion_hora = {
    	chart:{
    			renderTo: 'linealpromediohoraatencion',

			}, 
		    title: {
		        text: 'Promedio de tiempo de atencion hora',
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
		    series: [/*{
		    	name: 'Global',
		        data: []
		    },*/{
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		/*$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionglobalhora", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora.series[0].data.push(data.numero);
              	options_promedio_atencion_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora);
    	});*/
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatenciontramiteshora", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora.series[0].data.push(data.numero);
              	options_promedio_atencion_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionaclaracioneshora", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora.series[1].data.push(data.numero);
              	options_promedio_atencion_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionpagohora", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora.series[2].data.push(data.numero);
              	options_promedio_atencion_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora);
    	});


    	var options_promedio_atencion_hora_fecha = {
    	chart:{
    			renderTo: 'linealpromediohoraatencionfecha',

			}, 
		    title: {
		        text: 'Promedio de tiempo de atencion hora',
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
		    series: [/*{
		    	name: 'Global',
		        data: []
		    },*/{
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		/*$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionglobalhorafecha/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_fecha.series[0].data.push(data.numero);
              	options_promedio_atencion_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_fecha);
    	});*/
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatenciontramiteshorafecha/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_fecha.series[0].data.push(data.numero);
              	options_promedio_atencion_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionaclaracioneshorafecha/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_fecha.series[1].data.push(data.numero);
              	options_promedio_atencion_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionpagohorafecha/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_fecha.series[2].data.push(data.numero);
              	options_promedio_atencion_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_fecha);
    	});


    	var options_promedio_atencion_id = {
    	chart:{
    			renderTo: 'linealpromedioatencionid',

			}, 
		    title: {
		        text: 'Promedio de tiempo de atencion fecha',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Fecha'
		        },
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
		    series: [/*{
		    	name: 'Global',
		        data: []
		    },*/{
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		/*$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionsid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_id.series[0].data.push(data.numero);
              	options_promedio_atencion_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_id);
    	});*/
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatenciontramitesid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_id.series[0].data.push(data.numero);
              	options_promedio_atencion_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionaclaracionesid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_id.series[1].data.push(data.numero);
              	options_promedio_atencion_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionpagoid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_id.series[2].data.push(data.numero);
              	options_promedio_atencion_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_id);
    	});

		var options_promedio_atencion_hora_id = {
    	chart:{
    			renderTo: 'linealpromediohoraatencionid',

			}, 
		    title: {
		        text: 'Promedio de tiempo de atencion hora',
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
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			},{
		    	name: 'Global',
		        data: []
		    }
			]
		}
		$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionglobalhoraid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_id.series[3].data.push(data.numero);
              	options_promedio_atencion_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatenciontramiteshoraid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_id.series[0].data.push(data.numero);
              	options_promedio_atencion_hora_id.xAxis.categories.push(data.x_tramites);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionaclaracioneshoraid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_id.series[1].data.push(data.numero);
              	options_promedio_atencion_hora_id.xAxis.categories.push(data.x_aclaraciones);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionpagohoraid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_id.series[2].data.push(data.numero);
              	options_promedio_atencion_hora_id.xAxis.categories.push(data.x_pago);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_id);
    	});


    	var options_promedio_espera_id = {
    	chart:{
    			renderTo: 'linealpromedioid',

			}, 
		    title: {
		        text: 'Promedio de tiempo de espera fecha',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Fecha'
		        },
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
		    series: [/*{
		    	name: 'Global',
		        data: []
		    },*/{
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		/*$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaglobalid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id.series[0].data.push(data.numero);
              	options_promedio_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id);
    	});*/
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperatramitesid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id.series[0].data.push(data.tiempo);
              	options_promedio_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaaclaracionesid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id.series[1].data.push(data.tiempo);
              	options_promedio_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoespagosid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id.series[2].data.push(data.tiempo);
              	options_promedio_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id);
    	});


    	var options_promedio_espera_id_hora = {
    	chart:{
    			renderTo: 'linealpromediohoraid',

			}, 
		    title: {
		        text: 'Promedio de tiempo de espera hora',
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
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			},{
		    	name: 'Global',
		        data: []
		    }
			]
		}
		$.getJSON("http://localhost/turnomatic/public/graficas/linelpromedioesperaglobalid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora.series[3].data.push(data.numero);
              	options_promedio_espera_id_hora.xAxis.categories.push(data.x_global);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linelpromedioesperatramitesid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora.series[0].data.push(data.numero);
              	options_promedio_espera_id_hora.xAxis.categories.push(data.x_tramites);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linelpromedioesperaaclaracionesid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora.series[1].data.push(data.numero);
              	options_promedio_espera_id_hora.xAxis.categories.push(data.x_aclaraciones);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linelpromedioesperapagoid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora.series[2].data.push(data.numero);
              	options_promedio_espera_id_hora.xAxis.categories.push(data.x_pago);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora);
    	});

		var options_promedio_espera_id_hora_fecha = {
    	chart:{
    			renderTo: 'linealpromediohoraatencionfechaid',

			}, 
		    title: {
		        text: 'Promedio de tiempo de atencion hora',
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
		    series: [/*{
		    	name: 'Global',
		        data: []
		    },*/{
		    	name: 'Tramites',
		        data: []
		    },{
		    	name: 'Aclaraciones',
		        data: []
		    },{
		    	name: 'Pagos',
		        data: []
			}]
		}
		/*$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempodeatencionglobalhoraidfecha/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora_fecha.series[0].data.push(data.numero);
              	options_promedio_espera_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora_fecha);
    	});*/
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempodeatencionhoratridfecha/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora_fecha.series[0].data.push(data.numero);
              	options_promedio_espera_id_hora_fecha.xAxis.categories.push(data.x_tramites);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempodeatencionhoraaclaidfecha/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora_fecha.series[1].data.push(data.numero);
              	options_promedio_espera_id_hora_fecha.xAxis.categories.push(data.x_aclaraciones);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempodeatencionhorapagosidfecha/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora_fecha.series[2].data.push(data.numero);
              	options_promedio_espera_id_hora_fecha.xAxis.categories.push(data.x_pago);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora_fecha);
    	});
});