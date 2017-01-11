$(document).ready(function() {
	var datos = $('#datos');
	var buscar = $('#buscar');
	datos.css({
		'display': 'none'
	});

	


	buscar.keyup(function(){

		var valor = buscar.val();

		// $('form').submit(function(event){
		// 	event.preventDefault();
		// });
		if(buscar.val().length>0){
			datos.css({
			'display': 'block'
		});
			$.post('bus.php', {valor: valor}, function(data, textStatus, xhr) {				
				if(data==111){
					$('#datos').html("<p align='center' class='z-depth-3'>No se han encontrado datos.</p>");
					datos.removeClass('z-depth-5');
				}else{
					datos.html(data);
				}
			});
		}else{
			datos.css({
			'display': 'none'
			});

		}
		
		

  
		
});


});