$(document).ready(function() 
{

$.datepicker.regional['es'] = {
				closeText: 'Cerrar',
				prevText: '< Ant',
				nextText: 'Sig >',
				currentText: 'Hoy',
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
				dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
				weekHeader: 'Sm',
				dateFormat: 'dd/mm/yy',
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: false,
				yearSuffix: ''
				};
				$.datepicker.setDefaults($.datepicker.regional['es']);

					$( "#fecha" ).datepicker({ 
						dateFormat: 'yy-mm-dd',
				     	maxDate: 'today',
						mindate: new Date()

					});
					$( "#fecha_dos" ).datepicker({ 
						dateFormat: 'yy-mm-dd',
						maxDate: new Date()
				 
					});

			jQuery(".datepicket").datepicker( 
	        	{ 
	                "disabled":false, 
	                "dateFormat":"dd/mm/yy", 
	                "changeMonth": true, 
	                "changeYear": true, 
	                "firstDay": 1, 
	                "showOn":'both' 
	            }).next('button').button({ 
	                icons: { 
	                    primary: 'ui-icon-calendar' 
	                }, text:false 
	            }).css({'font-size':'80%', 'margin-left':'2px', 'margin-top':'-5px'}); 
});