$(document).ready(function() {
	var fecha = $('#fecha').val();
    var fecha_dos = $('#fecha_dos').val();
	var optionsasunto_totales_fecha = {
        chart: {
            renderTo: 'totalesfecha',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatotalesfecha/"+fecha+'/'+fecha_dos, function(json) {
        optionsasunto_totales_fecha.series[0].data = json;
        chart = new Highcharts.Chart(optionsasunto_totales_fecha);
    });


    var optionsasuntofecha = {
        chart: {
            renderTo: 'subasuntofecha',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntosfecha/"+fecha+'/'+fecha_dos, function(json) {
        optionsasuntofecha.series[0].data = json;
        chart = new Highcharts.Chart(optionsasuntofecha);
    });

    var optionsasuntofechaaban = {
        chart: {
            renderTo: 'subasuntoabandonadofecha',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntos_abandonados_fecha/"+fecha+'/'+fecha_dos, function(json) {
        optionsasuntofechaaban.series[0].data = json;
        chart = new Highcharts.Chart(optionsasuntofechaaban);
    });
    var optionstfecha = {
        chart: {
            renderTo: 'tramitesfecha',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitesfecha/"+fecha+'/'+fecha_dos, function(json) {
        optionstfecha.series[0].data = json;
        chart = new Highcharts.Chart(optionstfecha);
    });

    var optionsafecha = {
        chart: {
            renderTo: 'aclaracionesfecha',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionesfecha/"+fecha+'/'+fecha_dos, function(json) {
        optionsafecha.series[0].data = json;
        chart = new Highcharts.Chart(optionsafecha);
    });

    var optionspfecha = {
        chart: {
            renderTo: 'pagosfecha',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagosfecha/"+fecha+'/'+fecha_dos, function(json) {
        optionspfecha.series[0].data = json;
        chart = new Highcharts.Chart(optionspfecha);
    });


     var optionstfechaaban = {
        chart: {
            renderTo: 'tramitesbandonadosfecha',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitesabandonadosfecha/"+fecha+'/'+fecha_dos, function(json) {
        optionstfechaaban.series[0].data = json;
        chart = new Highcharts.Chart(optionstfechaaban);
    });

    var optionsafechaaban = {
        chart: {
            renderTo: 'aclaracionesabandonadosfecha',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionesabandonadosfecha/"+fecha+'/'+fecha_dos, function(json) {
        optionsafechaaban.series[0].data = json;
        chart = new Highcharts.Chart(optionsafechaaban);
    });

    var optionspfechaaban = {
        chart: {
            renderTo: 'pagosabandonadosfecha',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagosabandonadosfecha/"+fecha+'/'+fecha_dos, function(json) {
        optionspfechaaban.series[0].data = json;
        chart = new Highcharts.Chart(optionspfechaaban);
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
                categories: ['7','8','9','10','11','12','13','14','15','16']
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
              	//options_lineal_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshorafecha/"+fecha+'/'+fecha_dos, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha.series[1].data.push(data.numero);
              	//options_lineal_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagohorafecha/"+fecha+'/'+fecha_dos, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha.series[2].data.push(data.numero);
              	//options_lineal_hora_fecha.xAxis.categories.push(data.x);
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
		        categories: ['7','8','9','10','11','12','13','14','15','16']
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
              	//options_lineal_hora_fecha_aban.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_aban);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshorafechaabandonados/"+fecha+'/'+fecha_dos, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_aban.series[1].data.push(data.numero);
              	//options_lineal_hora_fecha_aban.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_aban);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagohorafechaabandonados/"+fecha+'/'+fecha_dos, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_aban.series[2].data.push(data.numero);
              	//options_lineal_hora_fecha_aban.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_aban);
    	});

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
                categories: ['7','8','9','10','11','12','13','14','15','16']
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
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/contrato/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[0].data.push(data.numero);
              	//options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/convenio/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[1].data.push(data.numero);
              	//options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/cambio/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[2].data.push(data.numero);
              	//options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/carta/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[3].data.push(data.numero);
              	//options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/factibilidad/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[4].data.push(data.numero);
              	//options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/dosomas/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_hora_fecha.series[5].data.push(data.numero);
              	//options_tramites_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_hora_fecha);
    	});
        $.getJSON("http://localhost/turnomatic/public/graficas/tramites/solicitud/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_tramites_hora_fecha.series[6].data.push(data.numero);
                //options_tramites_hora_fecha.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_tramites_hora_fecha);
        });
        $.getJSON("http://localhost/turnomatic/public/graficas/tramites/baja/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_tramites_hora_fecha.series[7].data.push(data.numero);
                //options_tramites_hora_fecha.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_tramites_hora_fecha);
        });

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
                categories: ['7','8','9','10','11','12','13','14','15','16']
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
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/altoconsumo/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[0].data.push(data.numero);
              	//options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/reconexion"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[1].data.push(data.numero);
              	//options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/errordelectura/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[2].data.push(data.numero);
              	//options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/notoma/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[3].data.push(data.numero);
              	//options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/noentrega/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[4].data.push(data.numero);
              	//options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/cambiodetarifa/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[5].data.push(data.numero);
              	//options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
    		$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/solicitud/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[6].data.push(data.numero);
              	//options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/otros/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha.series[7].data.push(data.numero);
              	//options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
    	});
        $.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/alta_estimacion/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_aclaraciones_hora_fecha.series[8].data.push(data.numero);
                //options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
        });
        $.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/propuestas/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_aclaraciones_hora_fecha.series[9].data.push(data.numero);
                //options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
        });
        $.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/aviso/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_aclaraciones_hora_fecha.series[10].data.push(data.numero);
                //options_aclaraciones_hora_fecha.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_aclaraciones_hora_fecha);
        });

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
                categories: ['7','8','9','10','11','12','13','14','15','16']
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
                name: 'Pagos de facturas',
                data: []
            }
            ]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/recibo/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha.series[0].data.push(data.numero);
              	//options_pagos_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/convenio/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha.series[1].data.push(data.numero);
              	//options_pagos_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/carta/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha.series[2].data.push(data.numero);
              	//options_pagos_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha);
    	});
        $.getJSON("http://localhost/turnomatic/public/graficas/pago/facturas/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_pagos_hora_fecha.series[3].data.push(data.numero);
                //options_pagos_hora_fecha.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_pagos_hora_fecha);
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
                categories: ['7','8','9','10','11','12','13','14','15','16']
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
              	//options_promedio_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaaclaracioneshora/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha.series[1].data.push(data.numero);
              	//options_promedio_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoespagoshorafecha/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha.series[2].data.push(data.numero);
              	//options_promedio_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha);
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
                categories: ['7','8','9','10','11','12','13','14','15','16']
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
              	//options_promedio_atencion_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionaclaracioneshorafecha/"+fecha+'/'+fecha_dos, function(data) {
        	 console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_fecha.series[1].data.push(data.numero);
              	//options_promedio_atencion_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionpagohorafecha/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion_hora_fecha.series[2].data.push(data.numero);
              	//options_promedio_atencion_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion_hora_fecha);
    	});



});