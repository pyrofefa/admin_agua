$(document).ready(function() {
	var id = $('#valor').val();
	var fecha = $('#fecha').val();
    var fecha_dos = $('#fecha_dos').val();

	var optionsasunto_totales_fecha_id = {
        chart: {
            renderTo: 'totalesfechaid',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Turnos Totales',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatotalesidfecha/"+id+'/'+fecha+'/'+fecha_dos, function(json) {
        optionsasunto_totales_fecha_id.series[0].data = json;
        chart = new Highcharts.Chart(optionsasunto_totales_fecha_id);
    });


    var optionsubasuntosucursalfecha = {
        chart: {
            renderTo: 'subasuntofechasucursal',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntossucursalfecha/"+id+"/"+fecha+"/"+fecha_dos, function(json) {
        optionsubasuntosucursalfecha.series[0].data = json;
        chart = new Highcharts.Chart(optionsubasuntosucursalfecha);
    });


    var optionsubasuntosucursalfechaabandonados = {
        chart: {
            renderTo: 'subasuntoabandonadofechasucursal',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntossucursalfechaabandonados/"+id+"/"+fecha+"/"+fecha_dos, function(json) {
        optionsubasuntosucursalfechaabandonados.series[0].data = json;
        chart = new Highcharts.Chart(optionsubasuntosucursalfechaabandonados);
    });

    var options_tramites_sucursal_fecha = {
        chart: {
            renderTo: 'tramitesfechasucursal',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitessucursalfecha/"+id+"/"+fecha+"/"+fecha_dos, function(json) {
        options_tramites_sucursal_fecha.series[0].data = json;
        chart = new Highcharts.Chart(options_tramites_sucursal_fecha);
    });

    var options_aclaraciones_sucursal_fecha = {
        chart: {
            renderTo: 'aclaracionesfechasucursal',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionessucursalfecha/"+id+"/"+fecha+"/"+fecha_dos, function(json) {
        options_aclaraciones_sucursal_fecha.series[0].data = json;
        chart = new Highcharts.Chart(options_aclaraciones_sucursal_fecha);
    });


    var options_pagos_sucursal_fecha = {
        chart: {
            renderTo: 'pagosfechasucursal',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagossucursalfecha/"+id+"/"+fecha+"/"+fecha_dos, function(json) {
        options_pagos_sucursal_fecha.series[0].data = json;
        chart = new Highcharts.Chart(options_pagos_sucursal_fecha);
    });


    var options_tramites_sucursal_fecha_abandonados = {
        chart: {
            renderTo: 'tramitesbandonadosfechasucursal',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitessucursalfechaabandonados/"+id+"/"+fecha+"/"+fecha_dos, function(json) {
        options_tramites_sucursal_fecha_abandonados.series[0].data = json;
        chart = new Highcharts.Chart(options_tramites_sucursal_fecha_abandonados);
    });
    var options_aclaraciones_sucursal_fecha_abandonados = {
        chart: {
            renderTo: 'aclaracionesabandonadosfechasucursal',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionessucursalfechaabandonados/"+id+"/"+fecha+"/"+fecha_dos, function(json) {
        options_aclaraciones_sucursal_fecha_abandonados.series[0].data = json;
        chart = new Highcharts.Chart(options_aclaraciones_sucursal_fecha_abandonados);
    });
    var options_pagos_sucursal_fecha_abandonados = {
        chart: {
            renderTo: 'pagosabandonadosfechasucursal',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagossucursalfechaabandonados/"+id+"/"+fecha+"/"+fecha_dos, function(json) {
        options_pagos_sucursal_fecha_abandonados.series[0].data = json;
        chart = new Highcharts.Chart(options_pagos_sucursal_fecha_abandonados);
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
		$.getJSON("http://localhost/turnomatic/public/graficas/linealtramiteshorafechaid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_id.series[0].data.push(data.numero);
              	//options_lineal_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshorafechaid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
         	 $.each(data, function(index, data)
             {
             	//console.log(data);
             	options_lineal_hora_fecha_id.series[1].data.push(data.numero);
              	//options_lineal_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealpagohorafechaid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
         	 $.each(data, function(index, data)
             {
             	options_lineal_hora_fecha_id.series[2].data.push(data.numero);
              	//options_lineal_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_lineal_hora_fecha_id);
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
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/contrato_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[0].data.push(data.numero);
              	//options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/convenio_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[1].data.push(data.numero);
              	//options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/cambio_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[2].data.push(data.numero);
              	//options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/carta_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[3].data.push(data.numero);
              	//options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/factibilidad_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[4].data.push(data.numero);
              	//options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/dosomas_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_id_hora_fecha.series[5].data.push(data.numero);
              	//options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
    	});
        $.getJSON("http://localhost/turnomatic/public/graficas/tramites/solicitud_tarifa_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_tramites_id_hora_fecha.series[6].data.push(data.numero);
                //options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
        });
        $.getJSON("http://localhost/turnomatic/public/graficas/tramites/baja_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_tramites_id_hora_fecha.series[7].data.push(data.numero);
                //options_tramites_id_hora_fecha.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_tramites_id_hora_fecha);
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
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/altoconsumo_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[0].data.push(data.numero);
              	//options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/reconexion_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[1].data.push(data.numero);
              	//options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/errordelectura_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[2].data.push(data.numero);
              	//options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/notoma_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[3].data.push(data.numero);
              	//options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/noentrega_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[4].data.push(data.numero);
              	//options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/cambiodetarifa_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[5].data.push(data.numero);
              	//options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
    	
        $.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/solicitud_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[6].data.push(data.numero);
              	//options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/otros_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_aclaraciones_hora_fecha_id.series[7].data.push(data.numero);
                //options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
        });
        $.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/alta_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_aclaraciones_hora_fecha_id.series[8].data.push(data.numero);
              	//options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
    	});
        $.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/propuestas_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_aclaraciones_hora_fecha_id.series[9].data.push(data.numero);
                //options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
        });
        $.getJSON("http://localhost/turnomatic/public/graficas/aclaraciones/aviso_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
             console.log(data);
             $.each(data, function(index, data)
             {
                options_aclaraciones_hora_fecha_id.series[10].data.push(data.numero);
                //options_aclaraciones_hora_fecha_id.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_aclaraciones_hora_fecha_id);
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
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/recibo_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha_id.series[0].data.push(data.numero);
              	//options_pagos_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha_id);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/convenio_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha_id.series[1].data.push(data.numero);
              	//options_pagos_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/pago/carta_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_pagos_hora_fecha_id.series[2].data.push(data.numero);
              	//options_pagos_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_pagos_hora_fecha_id);
    	});
        $.getJSON("http://localhost/turnomatic/public/graficas/pago/facturas_id/"+id+"/"+fecha+'/'+fecha_dos, function(data) {
             //console.log(data);
             $.each(data, function(index, data)
             {
                options_pagos_hora_fecha_id.series[3].data.push(data.numero);
                //options_pagos_hora_fecha_id.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_pagos_hora_fecha_id);
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
        $.getJSON("http://localhost/turnomatic/public/graficas/linealtramiteshorafechaida/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
             $.each(data, function(index, data)
             {
                options_lineal_hora_fecha_id_a.series[0].data.push(data.numero);
                //options_lineal_hora_fecha_id_a.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_lineal_hora_fecha_id_a);
        });
        $.getJSON("http://localhost/turnomatic/public/graficas/linealaclaracioneshorafechaida/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
             $.each(data, function(index, data)
             {
                options_lineal_hora_fecha_id_a.series[1].data.push(data.numero);
                //options_lineal_hora_fecha_id_a.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_lineal_hora_fecha_id_a);
        });
        $.getJSON("http://localhost/turnomatic/public/graficas/linealpagohorafechaida/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
             $.each(data, function(index, data)
             {
                options_lineal_hora_fecha_id_a.series[2].data.push(data.numero);
                //options_lineal_hora_fecha_id_a.xAxis.categories.push(data.x);
            });
            chart = new Highcharts.Chart(options_lineal_hora_fecha_id_a);
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
              	//options_promedio_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaaclaracioneshoraid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha_id.series[1].data.push(data.numero);
              	//options_promedio_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha_id);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoespagoshorafechaid/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_hora_fecha_id.series[2].data.push(data.numero);
              	//options_promedio_hora_fecha_id.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_hora_fecha_id);
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
              	//options_promedio_espera_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempodeatencionhoraaclaidfecha/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora_fecha.series[1].data.push(data.numero);
              	//options_promedio_espera_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora_fecha);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempodeatencionhorapagosidfecha/"+fecha+"/"+fecha_dos+'/'+id, function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_espera_id_hora_fecha.series[2].data.push(data.numero);
              	//options_promedio_espera_id_hora_fecha.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_espera_id_hora_fecha);
    	});

});	