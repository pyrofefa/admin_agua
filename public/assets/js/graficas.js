$(document).ready(function() {
    var id = $('#valor').val();
    var fecha = $('#fecha').val();

    console.log(fecha);
    //console.log(id);


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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntos_abandonados", function(json) {
        optionsasuntoabandonado.series[0].data = json;
        chart = new Highcharts.Chart(optionsasuntoabandonado);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntos_abandonados/"+id, function(json) {
        optionsasuntoabandonadoid.series[0].data = json;
        chart = new Highcharts.Chart(optionsasuntoabandonadoid);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntosfecha/"+fecha, function(json) {
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntos_abandonados_fecha/"+fecha, function(json) {
        optionsasuntofechaaban.series[0].data = json;
        chart = new Highcharts.Chart(optionsasuntofechaaban);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagos/"+id, function(json) {
        options.series[0].data = json;
        chart = new Highcharts.Chart(options);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
            return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaraciones/"+id, function(json) {
        optionsa.series[0].data = json;
        //console.log(json);
        chart = new Highcharts.Chart(optionsa);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagos", function(json) {
        optionss.series[0].data = json;
        chart = new Highcharts.Chart(optionss);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramites", function(json) {
        optionst.series[0].data = json;
        chart = new Highcharts.Chart(optionst);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitesfecha/"+fecha, function(json) {
        optionstfecha.series[0].data = json;
        chart = new Highcharts.Chart(optionstfecha);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitesabandonadosfecha/"+fecha, function(json) {
        optionstfechaaban.series[0].data = json;
        chart = new Highcharts.Chart(optionstfechaaban);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionesfecha/"+fecha, function(json) {
        optionsafecha.series[0].data = json;
        chart = new Highcharts.Chart(optionsafecha);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionesabandonadosfecha/"+fecha, function(json) {
        optionsafechaaban.series[0].data = json;
        chart = new Highcharts.Chart(optionsafechaaban);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagosfecha/"+fecha, function(json) {
        optionspfecha.series[0].data = json;
        chart = new Highcharts.Chart(optionspfecha);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagosabandonadosfecha/"+fecha, function(json) {
        optionspfechaaban.series[0].data = json;
        chart = new Highcharts.Chart(optionspfechaaban);
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
            return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaraciones", function(json) {
        optionsaa.series[0].data = json;
        chart = new Highcharts.Chart(optionsaa);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagosabandonados/"+id, function(json) {
        optionsaid.series[0].data = json;
        chart = new Highcharts.Chart(optionsaid);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitesabandonados", function(json) {
        optionsta.series[0].data = json;
        chart = new Highcharts.Chart(optionsta);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitesabandonados/"+id, function(json) {
        optionstaid.series[0].data = json;
        chart = new Highcharts.Chart(optionstaid);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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

    var optionsaclaracionesa = {
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionesabandonados/"+id, function(json) {
        optionsaclaracionesa.series[0].data = json;
        chart = new Highcharts.Chart(optionsaclaracionesa);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntossucursalfecha/"+id+"/"+fecha, function(json) {
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficasubasuntossucursalfechaabandonados/"+id+"/"+fecha, function(json) {
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitessucursalfecha/"+id+"/"+fecha, function(json) {
        options_tramites_sucursal_fecha.series[0].data = json;
        chart = new Highcharts.Chart(options_tramites_sucursal_fecha);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficatramitessucursalfechaabandonados/"+id+"/"+fecha, function(json) {
        options_tramites_sucursal_fecha_abandonados.series[0].data = json;
        chart = new Highcharts.Chart(options_tramites_sucursal_fecha_abandonados);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionessucursalfecha/"+id+"/"+fecha, function(json) {
        options_aclaraciones_sucursal_fecha.series[0].data = json;
        chart = new Highcharts.Chart(options_aclaraciones_sucursal_fecha);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficaaclaracionessucursalfechaabandonados/"+id+"/"+fecha, function(json) {
        options_aclaraciones_sucursal_fecha_abandonados.series[0].data = json;
        chart = new Highcharts.Chart(options_aclaraciones_sucursal_fecha_abandonados);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagossucursalfecha/"+id+"/"+fecha, function(json) {
        options_pagos_sucursal_fecha.series[0].data = json;
        chart = new Highcharts.Chart(options_pagos_sucursal_fecha);
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
                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'%';
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
    $.getJSON("http://localhost/turnomatic/public/graficas/graficapagossucursalfechaabandonados/"+id+"/"+fecha, function(json) {
        options_pagos_sucursal_fecha_abandonados.series[0].data = json;
        chart = new Highcharts.Chart(options_pagos_sucursal_fecha_abandonados);
    });

});   