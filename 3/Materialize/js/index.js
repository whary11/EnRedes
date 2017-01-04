$(document).ready(function() {
	 		var alturaNav = $('nav').height();
	 		// alert(prueba)
	 		$(document).scroll(function(){
	 			var prueba = $(document).scrollTop();
	 			if (prueba>40) {
	 				$('nav').css({
	 					'position': 'fixed',
	 					'background':'blue',
	 					'height': '120px',
	 					'paddingTop':'7px' 
	 				});
	 				$('#logo').css({
	 					'marginTop':'20px',
	 					'width': '80px',
						'height': '80px'
	 				});
	 			}else{
	 				$('nav').css({
	 					'position': 'fixed',
	 					'height':'100px',
	 					'paddingTop':'7px' 
	 					// 'transition': 'all 5s ease'
	 				});
	 				$('#logo').css({
	 					'marginTop':'0px',
	 					'width': '90px',
						'height': '90px'
	 				});
	 			}
	 		});
	 	});

// Efenctos del menú
$(document).ready(function() {
	var bandera = true;
	$(".menu .font-20").text('menu');

	$(".menu .font-20").click(function() {
		if(bandera){
			$(".menu .font-20").text('shuffle');
			bandera = false;
		}else{

			$(".menu .font-20").text('menu');
			bandera = true;
		}
	});

	$(document).click(function(){
		var texto = $(".menu .font-20").text();
		if(texto==="shuffle"){
			$(".menu .font-20").text('menu');
			bandera=true;
		}
	});
});
