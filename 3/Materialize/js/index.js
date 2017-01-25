$(document).ready(function() {
	var alturaNav = $('nav').height();
	$(document).scroll(function(){
		var prueba = $(document).scrollTop();
		if (prueba>=40) {
			$('nav').css({
				'position': 'fixed',
				'background':'blue',
				'height': '120px',
				'paddingTop':'7px' 
			});
			$('#logo').css({
				'marginTop':'12px',
				'width': '80px',
				'height': '80px',
				'marginRight':'40px'
			});
			$(".menu .font-20").css({
				'marginTop':'20px'
			});
			$("#ir .icon").css({
			});
		}else{
			$('nav').css({
				'position': 'fixed',
				'height':'100px',
				'background':'red',
				'paddingTop':'7px'
			});
			$('#logo').css({
				'marginTop':'-4px',
				'width': '90px',
				'height': '90px',
				'marginRight':'0px'
			});
			$(".menu .font-20").css({
				'marginTop':'12px'
			});
			$("#ir .icon").css({
				'color':'black'
			});
		}
	});
	var bandera = true;
	$(".menu .font-20").text('menu');

	$(".menu .font-20").click(function() {
		if(bandera){
			$(".menu .font-20").text('clear');
			bandera = false;
		}else{

			$(".menu .font-20").text('menu');
			bandera = true;
		}
	});
	$(document).click(function(){
		var texto = $(".menu .font-20").text();
		if(texto==="clear"){
			$(".menu .font-20").text('menu');
			bandera=true;
		}
	});
	$('#ir').click(function(){
		$(document).scrollTop("0px").animate({'scrollTop': '0px'}, 1000);
	});

});
////////////Formulario de admin///////////

$(document).ready(function(){
	var pet = $('#form_admin').attr("action");
	var met = $('#form_admin').attr("method");
	$('#form_admin').submit(function(e){
		e.preventDefault();

//////////Aquí empieza la validación////////
		
//////////////Variables donde se almacena la Información que se envía
		var usuario = $('#usuario');
		var clave = $('#clave');
		var red = "red";
		var teal = "teal";
		if(usuario.val()==""){
			usuario.css('borderColor', red);
			e.preventDefault();
			$('#error_form_admin').text("");
		}else if(clave.val()==""){
			usuario.css('borderColor','teal');	
			clave.css('borderColor', red);
			$('#error_form_admin').text("");
			e.preventDefault();
		}else if(clave.val()==usuario.val()){
			clave.css('borderColor', teal);
			$('#error_form_admin').text("");
			e.preventDefault();
			$('#error_form_admin').text('Los campos no pueden ser iguales.');
			$('#error_form_admin').css('color', red);
		}else{
			$('#error_form_admin').text('');
			clave.css('borderColor', teal);
			var info = $('#form_admin').serialize();

				$.post(pet,info, function(resp,estado,Html){			
	// Afinar aquí mi código, no se ha podido hacer la igualdad...
				if (resp == 1234567890) {
					$('#error_form_admin').css('color', teal);
					location.href = "administrador/admin.php";
				}else{
					$('#error_form_admin').text("Usuario no registrado.");
					$('#error_form_admin').css('color', red);
				}
			});
		}
  })
	//////Esliders 
	
});