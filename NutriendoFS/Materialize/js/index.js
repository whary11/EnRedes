$(document).ready(function() {
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
	 	});