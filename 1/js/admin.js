

$(window).ready(function(){
	var icono = $('.icon-menu');
	var menu = $('#navegacion ul');
	icono.click(function() {
		menu.toggleClass('muestra');
		$('#contenedor').toggleClass('prueba');
	})
});