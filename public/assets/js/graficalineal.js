$(document).ready(function() {
	//alert();
	//console.log("Hola Mundo");
    var id = $('#valor').val();
	
	Highcharts.chart('barraspromedio', {
	    data: {
	        table: 'datatable'
	    },
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Promedio'
	    },
	    yAxis: {
	        allowDecimals: false,
	        title: {
	            text: 'Unidades'
	        }
	    },
	    tooltip: {
	        formatter: function () {
	            return '<b>' + this.series.name + '</b><br/>' +
	                this.point.y + ' ' + this.point.name.toLowerCase();
	        }
	    }
	});

});