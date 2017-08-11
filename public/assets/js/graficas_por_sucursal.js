$(document).ready(function() {
	var id = $('#valor').val();
    
	//alert();
	var optionsasunto_totales_id = {
        chart: {
            renderTo: 'totalesid',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '',
            x: -20 //center
        },
        tooltip: {
            
            formatter: function() {
                return '<b>'+ this.point.name +' ('+this.point.y+') </b>: </b>'+ Highcharts.numberFormat(this.percentage, 1) +'%';
            }
        },
        plotOptions: {
            pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    }
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatotalesid/"+id, function(json) {
        optionsasunto_totales_id.series[0].data = json;
        chart = new Highcharts.Chart(optionsasunto_totales_id);
    });


    var optionsasuntoid = {
        chart: {
            renderTo: 'subasuntoid',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Realizados',
            x: -20 //center
        },
        tooltip: {
            
            formatter: function() {
                return '<b>'+ this.point.name +' ('+this.point.y+') </b>: </b>'+ Highcharts.numberFormat(this.percentage, 1) +'%';
            }
        },
        plotOptions: {
            pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    }
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntos/"+id, function(json) {
        optionsasuntoid.series[0].data = json;
        chart = new Highcharts.Chart(optionsasuntoid);
    });

    var optionsasuntoabandonadoid = {
        chart: {
            renderTo: 'subasuntoabandonadoid',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Abandonados',
            x: -20 //center
        },
        tooltip: {
            
            formatter: function() {
                return '<b>'+ this.point.name +' ('+this.point.y+') </b>: </b>'+ Highcharts.numberFormat(this.percentage, 1) +'%';
            }
        },
        plotOptions: {
            pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    }
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntos_abandonados/"+id, function(json) {
        optionsasuntoabandonadoid.series[0].data = json;
        chart = new Highcharts.Chart(optionsasuntoabandonadoid);
    });


    var optionstid = {
        chart: {
            renderTo: 'tramitesid',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Trámites',
            x: -20 //center
        },
        tooltip: {
            
            formatter: function() {
                return '<b>'+ this.point.name +' ('+this.point.y+') </b>: </b>'+ Highcharts.numberFormat(this.percentage, 1) +'%';
            }
        },
        plotOptions: {
            pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    }
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramites/"+id, function(json) {
        optionstid.series[0].data = json;
        chart = new Highcharts.Chart(optionstid);
    });


    var optionsa = {
        chart: {
            renderTo: 'aclaracionesid',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Aclaraciones',
            x: -20 //center
        },
        tooltip: {
            formatter: function() {
            return '<b>'+ this.point.name +' ('+this.point.y+') </b>: </b>'+ Highcharts.numberFormat(this.percentage, 1) +'%';
            }
        },
        plotOptions: {
            pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    }
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaraciones/"+id, function(json) {
        optionsa.series[0].data = json;
        //console.log(json);
        chart = new Highcharts.Chart(optionsa);
    });
    var options = {
        chart: {
            renderTo: 'pagosid',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Pagos',
            x: -20 //center
        },
        tooltip: {
            
            formatter: function() {
                return '<b>'+ this.point.name +' ('+this.point.y+') </b>: </b>'+ Highcharts.numberFormat(this.percentage, 1) +'%';
            }
        },
        plotOptions: {
            pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    }
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagos/"+id, function(json) {
        options.series[0].data = json;
        chart = new Highcharts.Chart(options);
    });

    var optionstaid = {
        chart: {
            renderTo: 'tramitesbandonadosid',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Trámites',
            x: -20 //center
        },
        tooltip: {
            
            formatter: function() {
                return '<b>'+ this.point.name +' ('+this.point.y+') </b>: </b>'+ Highcharts.numberFormat(this.percentage, 1) +'%';
            }
        },
        plotOptions: {
            pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    }
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitesabandonados/"+id, function(json) {
        optionstaid.series[0].data = json;
        chart = new Highcharts.Chart(optionstaid);
    });

    var optionsaclaracionesa_id = {
        chart: {
            renderTo: 'aclaracionesabandonadosid',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Aclaraciones',
            x: -20 //center

        },
        tooltip: {
            
            formatter: function() {
                return '<b>'+ this.point.name +' ('+this.point.y+') </b>: </b>'+ Highcharts.numberFormat(this.percentage, 1) +'%';
            }
        },
        plotOptions: {
            pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    }
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionesabandonados/"+id, function(json) {
        optionsaclaracionesa_id.series[0].data = json;
        chart = new Highcharts.Chart(optionsaclaracionesa_id);
    });

    var optionsaid = {
        chart: {
            renderTo: 'pagosabandonadosid',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Pagos',
            x: -20 //center
        },
        tooltip: {
            
            formatter: function() {
                return '<b>'+ this.point.name +' ('+this.point.y+') </b>: </b>'+ Highcharts.numberFormat(this.percentage, 1) +'%';
            }
        },
        plotOptions: {
            pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: []
        }]
    }
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagosabandonados/"+id, function(json) {
        optionsaid.series[0].data = json;
        chart = new Highcharts.Chart(optionsaid);
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


    	var options_tramites_id = {
    	chart:{
    			renderTo: 'tramiteshoraid'
    			//type: 'spline'
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
			},{
                name: 'Solicitud de tarifa social',
                data: []
            },{
                name: 'Baja por impago',
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
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/carta/"+id, function(data) {
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
			},{
                name: 'Pagos de factiuras',
                data: []
            }
            ]
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

        $.getJSON("http://localhost/turnomatic/public/graficas/pago/facturas/"+id, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_pagos_hora_id.series[3].data.push(data.numero);
                options_pagos_hora_id.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_pagos_hora_id);
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
			},{
                name: 'Alta estimación de consumo',
                data: []
            },{
                name: 'Propuestas de pago',
                data: []
            },{
                name: 'Aviso de incidencia',
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
              	options_promedio_espera_id_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linelpromedioesperatramitesid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora.series[0].data.push(data.numero);
              	options_promedio_espera_id_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linelpromedioesperaaclaracionesid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora.series[1].data.push(data.numero);
              	options_promedio_espera_id_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linelpromedioesperapagoid/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora.series[2].data.push(data.numero);
              	options_promedio_espera_id_hora.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora);
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
              	options_promedio_atencion_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionaclaracioneshoraid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_id.series[1].data.push(data.numero);
              	options_promedio_atencion_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionpagohoraid/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_id.series[2].data.push(data.numero);
              	options_promedio_atencion_hora_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_id);
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


    	var options_tramites_mes_id = {
    	chart:{
    			renderTo: 'atenciontramitesid',

			}, 
		    title: {
		        text: 'Promedio tiempo de atencion tramites por mes',
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
		            text: 'Minutos'
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
			},{
                name: 'Solicitud de tarifa social',
                data: []
            },{
                name: 'Baja por impago',
                data: []
            }
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_contrato/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes_id.series[0].data.push(data.numero);
              	options_tramites_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_convenio/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes_id.series[1].data.push(data.numero);
              	options_tramites_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_cambio/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes_id.series[2].data.push(data.numero);
              	options_tramites_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_carta/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes_id.series[3].data.push(data.numero);
              	options_tramites_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_factibilidad/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes_id.series[4].data.push(data.numero);
              	options_tramites_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_dosomas/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes_id.series[5].data.push(data.numero);
              	options_tramites_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes_id);
    	});

    	var options_tramites_espera_mes_id = {
    	chart:{
    			renderTo: 'esperatramitesid',

			}, 
		    title: {
		        text: 'Promedio tiempo de espera tramites por mes',
		        x: -20 //center
		    },
		    subtitle: {
		        //text: 'Source: WorldClimate.com',
		        //x: -20
		    },
		    xAxis:  {
		    	title: {
		            text: 'Meses'
		        },
		         /*scrollbar: {
            		enabled: true
        		},*/
        		
		        categories: []
		    },
		    yAxis: {
		        title: {
		            text: 'Minutos'
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
			},{
                name: 'Solicitud de tarifa social',
                data: []
            },{
                name: 'Baja por impago',
                data: []
            }
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_contrato/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes_id.series[0].data.push(data.numero);
              	options_tramites_espera_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_convenio/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes_id.series[1].data.push(data.numero);
              	options_tramites_espera_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_cambio/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes_id.series[2].data.push(data.numero);
              	options_tramites_espera_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_carta/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes_id.series[3].data.push(data.numero);
              	options_tramites_espera_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_factibilidad/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes_id.series[4].data.push(data.numero);
              	options_tramites_espera_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_dosomas/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes_id.series[5].data.push(data.numero);
              	options_tramites_espera_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes_id);
    	});


    	var options_aclaraciones_mes_id = {
    	chart:{
    			renderTo: 'atencionaclaracionesid'

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
			},{
                name: 'Alta estimación de consumo',
                data: []
            },{
                name: 'Propuestas de pago',
                data: []
            },{
                name: 'Aviso de incidencia',
                data: []
            }

			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_altoconsumo/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_id.series[0].data.push(data.numero);
              	options_aclaraciones_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_reconexion/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_id.series[1].data.push(data.numero);
              	options_aclaraciones_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_errordelectura/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_id.series[2].data.push(data.numero);
              	options_aclaraciones_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_notoma/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_id.series[3].data.push(data.numero);
              	options_aclaraciones_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_noentrega/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_id.series[4].data.push(data.numero);
              	options_aclaraciones_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_cambiodetarifa/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_id.series[5].data.push(data.numero);
              	options_aclaraciones_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_id);
    	});
    		$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_solicitud/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_id.series[6].data.push(data.numero);
              	options_aclaraciones_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/atencion_otros/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_id.series[7].data.push(data.numero);
              	options_aclaraciones_mes_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_id);
    	});


    	var options_aclaraciones_mes_espera_id = {
    	chart:{
    			renderTo: 'esperaaclaracionesid',

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
			},{
                name: 'Alta estimación de consumo',
                data: []
            },{
                name: 'Propuestas de pago',
                data: []
            },{
                name: 'Aviso de incidencia',
                data: []
            }

			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_altoconsumo/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera_id.series[0].data.push(data.numero);
              	options_aclaraciones_mes_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_reconexion/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera_id.series[1].data.push(data.numero);
              	options_aclaraciones_mes_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_errordelectura/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera_id.series[2].data.push(data.numero);
              	options_aclaraciones_mes_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_notoma/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera_id.series[3].data.push(data.numero);
              	options_aclaraciones_mes_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_noentrega/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera_id.series[4].data.push(data.numero);
              	options_aclaraciones_mes_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_cambiodetarifa/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera_id.series[5].data.push(data.numero);
              	options_aclaraciones_mes_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera_id);
    	});
    		$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_solicitud/"+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera_id.series[6].data.push(data.numero);
              	options_aclaraciones_mes_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/espera_otros/"+id, function(data) {
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_mes_espera_id.series[7].data.push(data.numero);
              	options_aclaraciones_mes_espera_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_mes_espera_id);
    	});




});