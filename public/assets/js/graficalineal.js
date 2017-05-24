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
	        allowDecimals: true,
	        title: {
	            text: 'Minutos'
	        }
	    },
	    tooltip: {
	        formatter: function () {
	            return '<b>' + this.series.name + '</b><br/>' +
	                this.point.y + ' ' + this.point.name.toLowerCase();
	        }
	    }
	});

	Highcharts.chart('barraspromediotramites', {
	    data: {
	        table: 'datatabletramites'
	    },
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Promedio'
	    },
	    yAxis: {
	        allowDecimals: true,
	        title: {
	            text: 'Minutos'
	        }
	    },
	    tooltip: {
	        formatter: function () {
	            return '<b>' + this.series.name + '</b><br/>' +
	                this.point.y + ' ' + this.point.name.toLowerCase();
	        }
	    }
	});


	Highcharts.chart('barraspromedioaclaraciones', {
	    data: {
	        table: 'datatableaclaraciones'
	    },
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Promedio'
	    },
	    yAxis: {
	        allowDecimals: true,
	        title: {
	            text: 'Minutos'
	        }
	    },
	    tooltip: {
	        formatter: function () {
	            return '<b>' + this.series.name + '</b><br/>' +
	                this.point.y + ' ' + this.point.name.toLowerCase();
	        }
	    }
	});

	Highcharts.chart('barraspromediopago', {
	    data: {
	        table: 'datatablepago'
	    },
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Promedio'
	    },
	    yAxis: {
	        allowDecimals: true,
	        title: {
	            text: 'Minutos'
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