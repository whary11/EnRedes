$(document).ready(function() {
// FronEnd - Nav
	var alturaNav = $('nav').height();
	// alert(prueba)
	$(document).scroll(function(){
		var prueba = $(document).scrollTop();
		if (prueba>10) {
			$('nav').css({
				'position': 'fixed',
				'height': '120px',
				'paddingTop':'15px' 
			});
		}else{
			$('nav').css({
				'position': 'fixed',
				'height':'100px',
				'paddingTop':'7px'
			});
		}
	});
	// Validación de formulario.
	

	$('#registro').submit(function(event){
		event.preventDefault();
		var usuario = $('#usuario').val();
		var clave = $('#clave').val();
		var notificacionspan = $('#noti span');
		var notificacionicon = $('#noti i');
		if(usuario=="" || clave=="") {
			notificacionspan.text('Los campos deben ser diligenciados');
			notificacionspan.css('color', 'red');
			notificacionicon.text('priority_high');
			notificacionicon.css('color', 'red');
		}else{
			$.ajax({
				url: 'validaciones/ingreso.php',
				type: 'POST',
				dataType: 'html',
				data: {usuario: usuario, clave:clave},
				timeout:9000,
				beforeSend: function(){
					$('#noti').html('<div class="preloader-wrapper small active">'+
										    '<div class="spinner-layer spinner-green-only">'+
										      '<div class="circle-clipper left">'+
										       ' <div class="circle"></div>'+
										     ' </div><div class="gap-patch">'+
										        '<div class="circle"></div>'+
										      '</div><div class="circle-clipper right">'+
										        '<div class="circle"></div>'+
										      '</div>'+
										   ' </div>'+
										  '</div>')
				}
			})
			.fail(function() {
				$('#noti').html('<i class="material-icons" style="color:red;">error</i><span style="color:red;">Compruebe su conexión e intentelo nuevamente</span>');

			})
			.always(function(data){
				if(data==1234){
					$('#noti').html('<i class="material-icons" style="color:red;">priority_high</i><span style="color:red;">El usuario no existe.</span>');
				}else{
					$('#noti').html('<i class="material-icons" style="color:teal;">done</i><span style="color:teal;">Usuario correcto, estamos preparando su área de trabajo....</span>');
				}
			});
			notificacionspan.text('Estamos validando su usuario');
			notificacionspan.css('color', 'teal');
			notificacionicon.text('done');
			notificacionicon.css('color', 'teal');
		}
		event.preventDefault();
	})

});