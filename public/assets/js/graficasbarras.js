$(document).ready(function() {
	//alert();
    var id = $('#valor').val();
    //console.log(id);
    
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

});