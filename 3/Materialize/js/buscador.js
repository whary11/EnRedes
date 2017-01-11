$(document).ready(function() {	
	$('#buscador').keyup(function(){
	$('#buscar').submit(function(event) {
		event.preventDefault();
		});
		var datos = $('#buscar').serialize();
		$.post('buscar.php', datos, function(data, textStatus, xhr) {
			$('#resultado').html(data);
		});
	})
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
			$.post('insertar.php', {nombre: nombre.val(),apellido:apellido.val(),telefono:telefono.val(),correo:correo.val(),clave1:clave1.val(),clave2:clave2.val(), usuario_insert:usuario_insert.val()}, function(data, textStatus, xhr){
				if(data != 1111){
					$('#error_form_admin').text(data);
					$('#error_form_admin').css({
						'color': 'teal',
						'fontSize': '30px'
					});
					location.href = "admin.php";
				}else{
					event.preventDefault();
					$('#error_form_admin').text("El usuario ya está registrado.");
				}
			});
		}
	});
});	