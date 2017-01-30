$(document).ready(function() {	
	$('#buscador').keyup(function(){
	$('#buscar').submit(function(event) {
		event.preventDefault();
	});
		var datos = $('#buscar').serialize();
		$.post('procesadores/buscar.php', datos, function(data, textStatus, xhr) {
			$('#resultado').html(data);
		});
	})

	////Agregar usuarios nuevos
	$('#form_add').submit(function(event){
		event.preventDefault();
		var nombre = $('#nombre');
		var apellido = $('#apellido');
		var telefono = $('#telefono');
		var correo = $('#correo');
		var clave1 = $('#clave1');
		var clave2 = $('#clave2');
		var usuario_insert = $('#crear');
		if(nombre.val()=="" || apellido.val()=="" || telefono.val()=="" || correo.val()=="" || clave1.val()=="" || clave2.val()==""){
			$('#error_form_admin').text("Todos losdatos deben ser diligenciados.");
				event.preventDefault();
		}else if(clave1.val() != clave2.val()){
			$('#error_form_admin').text("Las contraseñas debes ser iguales.");
			event.preventDefault();
		}else{
			$.post('../administrador/procesadores/insertar.php', {nombre: nombre.val(),apellido:apellido.val(),telefono:telefono.val(),correo:correo.val(),clave1:clave1.val(),clave2:clave2.val(), usuario_insert:usuario_insert.val()}, function(data, textStatus, xhr){
				console.log(data)
				if(data != 1111){
					$('#error_form_admin').text(data);
					$('#error_form_admin').css({
						'color':'teal',
						'fontSize': '30px'
					});
					location.href ="admin.php";
				}else{
					event.preventDefault();
					$('#error_form_admin').text("El usuario ya está registrado.");
				}
			});
		}
	});

	//////Insertar productos nuevos
	//Cargar icono de muestra
	$('#icono-servi').keyup(function() {
		$('#icono-servi i').text($('#icono-servi1').val());
	});
	//Cargar color de muestra
	$('#color').keyup(function() {
		$('#colorError').css({
			'background': $('#color').val()
		});
	});
	
		$('#form_servi input[name="envio_servicios"]').click(function() {
			$('#form_servi').submit(function(event) {

				var icono = $('#icono-servi1').val();
				var color = $('#color').val();
				var nservicio = $('#nservicio').val();
				var descripcion = $('#descripcion').val();
				var etiqueta1 = $('#etiqueta1').val();
				var etiqueta2 = $('#etiqueta2').val();
				var etiqueta3 = $('#etiqueta3').val();
				var etiqueta4 = $('#etiqueta4').val();
				var etiqueta5 = $('#etiqueta5').val();
				var datos = {icono: icono,
							color:color,
							nservicio:nservicio,
							descripcion:descripcion,
							etiqueta1:etiqueta1,
							etiqueta2:etiqueta2,
							etiqueta3:etiqueta3,
							etiqueta4:etiqueta4,
							etiqueta5:etiqueta5
							}
				// alert(etiqueta1)
				if (icono==""||color==""||nservicio==""||descripcion==""||etiqueta1===null||etiqueta2===null||etiqueta3===null||etiqueta4===null||etiqueta5===null) {
					// alert("datos incorrectos");
					$('#notificaciones').html('<p align="center" style="color: red;">Datos incorrectos.</p>');
					event.preventDefault();
				}else{
					$.post('Procesadores/insertar_datos.php',datos, function(data, textStatus, xhr){
					});
				}
			});
		});
		$(document).ready(function(){
			$('.modal').modal();
		});	
		$(document).ready(function() {
			$('select').material_select();
		});
	///Edición de servicios.
	$('#serviciosDesple').hide();
	var bandera = true;
	$('#EdicionServi').click(function(event) {
		if(bandera==true){
			$('#serviciosDesple').show("slow");
			$('#EdicionServi').text('Ocultar Servicios');			
			bandera = false;
		}else{
			$('#serviciosDesple').hide("slow");
			$('#EdicionServi').text('Mostrar Servicios');
			bandera = true;
		}
	});
});	


