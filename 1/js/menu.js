// Código creado para los efectos en el menú de navegación estamos utilizando Jquery
// Instanciamos nuestro código para que se ejecute cuando el navegador haya vargado los elementos
$(document).ready(function() {
	$(window).scroll(function(){
		var scroll = $(window).scrollTop();

		if(scroll>50){
			$('header').css('background-color', '#4E6FFF');
			$('#logo').css({
				marginTop: '-5px',
				width: '70px',
				height: '70px'
			});
			$('nav ul a').css('color', 'white');
		}else{
			$('header').css('background-color', '#363636');	
			$('#logo').css({
				marginTop: '30px',
				width: '200px',
				height: '200px'
			});
				
			$('nav ul a').css('color', 'white');
		}
	});
});
