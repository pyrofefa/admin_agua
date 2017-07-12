$(document).ready(function() {
	
	 var optionsasunto_totales = {
        chart: {
            renderTo: 'totales',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatotales", function(json) {
        optionsasunto_totales.series[0].data = json;
        chart = new Highcharts.Chart(optionsasunto_totales);
    });

    var optionsasunto = {
        chart: {
            renderTo: 'subasunto',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntos", function(json) {
        optionsasunto.series[0].data = json;
        chart = new Highcharts.Chart(optionsasunto);
    });

    var optionsasuntoabandonado = {
        chart: {
            renderTo: 'subasuntoabandonado',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntos_abandonados", function(json) {
        optionsasuntoabandonado.series[0].data = json;
        chart = new Highcharts.Chart(optionsasuntoabandonado);
    });

    var optionst = {
        chart: {
            renderTo: 'tramites',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramites", function(json) {
        optionst.series[0].data = json;
        chart = new Highcharts.Chart(optionst);
    });


    var optionsaa = {
        chart: {
            renderTo: 'aclaraciones',
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaraciones", function(json) {
        optionsaa.series[0].data = json;
        chart = new Highcharts.Chart(optionsaa);
    });

     var optionss = {
        chart: {
            renderTo: 'pagos',
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
                return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagos", function(json) {
        optionss.series[0].data = json;
        chart = new Highcharts.Chart(optionss);
    });

    var optionsta = {
        chart: {
            renderTo: 'tramitesbandonados',
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
                return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitesabandonados", function(json) {
        optionsta.series[0].data = json;
        chart = new Highcharts.Chart(optionsta);
    });

    var optionsaclaracionesa = {
        chart: {
            renderTo: 'aclaracionesabandonados',
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
                return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
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
                    return '<b>'+ this.point.name +'</b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionesabandonados", function(json) {
        optionsaclaracionesa.series[0].data = json;
        chart = new Highcharts.Chart(optionsaclaracionesa);
    });

     //abandonados
    var optionspa = {
        chart: {
            renderTo: 'pagosabandonados',
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
                return '<b>'+ this.point.name +' ('+this.point.y+') </b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
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
                    return '<b>'+ this.point.name +'</b><br><b>'+Math.round(this.percentage*100)/100 + '% </b>';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagosabandonados", function(json) {
        optionspa.series[0].data = json;
        chart = new Highcharts.Chart(optionspa);
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
                formatter: function() {
                    return '<b>'+ this.series.data.y +' </b>:';
                }
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
        	 console.log(data);
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
		    series: [{
		    	name: 'Global',
		        data: []
		    },{
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
		$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionglobal", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_promedio_atencion.series[0].data.push(data.numero);
              	options_promedio_atencion.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatenciontramites", function(data) {
         	 $.each(data, function(index, data)
             {
             	options_promedio_atencion.series[1].data.push(data.numero);
              	options_promedio_atencion.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionaclaraciones", function(data) {
         	 $.each(data, function(index, data)
             {
             	options_promedio_atencion.series[2].data.push(data.numero);
              	options_promedio_atencion.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoatencionpago", function(data) {
         	 $.each(data, function(index, data)
             {
             	options_promedio_atencion.series[3].data.push(data.numero);
              	options_promedio_atencion.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_promedio_atencion);
    	});

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
		    series: [{
		    	name: 'Global',
		        data: []
		    },{
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
		$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaglobal", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionspromedio.series[0].data.push(data.numero);
              	optionspromedio.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionspromedio);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperatramites", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionspromedio.series[1].data.push(data.numero);
              	optionspromedio.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionspromedio);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoesperaaclaraciones", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionspromedio.series[2].data.push(data.numero);
              	optionspromedio.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionspromedio);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/linealtiempoespagos", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	optionspromedio.series[3].data.push(data.numero);
              	optionspromedio.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(optionspromedio);
    	});

    	var options_tramites_mes = {
    	chart:{
    			renderTo: 'atenciontramites',

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
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_contrato", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes.series[0].data.push(data.numero);
              	options_tramites_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_convenio", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes.series[1].data.push(data.numero);
              	options_tramites_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_cambio", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes.series[2].data.push(data.numero);
              	options_tramites_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_carta", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes.series[3].data.push(data.numero);
              	options_tramites_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_factibilidad", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes.series[4].data.push(data.numero);
              	options_tramites_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/atencion_dosomas", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_mes.series[5].data.push(data.numero);
              	options_tramites_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_mes);
    	});

    	var options_tramites_espera_mes = {
    	chart:{
    			renderTo: 'esperatramites',

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
			}
			]
		}
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_contrato", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes.series[0].data.push(data.numero);
              	options_tramites_espera_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_convenio", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes.series[1].data.push(data.numero);
              	options_tramites_espera_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_cambio", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes.series[2].data.push(data.numero);
              	options_tramites_espera_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_carta", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes.series[3].data.push(data.numero);
              	options_tramites_espera_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes);
    	});	
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_factibilidad", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes.series[4].data.push(data.numero);
              	options_tramites_espera_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes);
    	});
    	$.getJSON("http://localhost/turnomatic/public/graficas/tramites/espera_dosomas", function(data) {
        	 //console.log(data);
        	 $.each(data, function(index, data)
             {
             	options_tramites_espera_mes.series[5].data.push(data.numero);
              	options_tramites_espera_mes.xAxis.categories.push(data.x);
			});
			chart = new Highcharts.Chart(options_tramites_espera_mes);
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