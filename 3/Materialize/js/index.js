$(document).ready(function() {
	 		var alturaNav = $('nav').height();
	 		// alert(prueba)
	 		$(document).scroll(function(){
	 			var prueba = $(document).scrollTop();
	 			if (prueba>10) {
	 				$('nav').css({
	 					'position': 'fixed',
	 					'background':'blue',
	 					'height': '100px',
	 					'paddingTop':'15px' 
	 				});
	 			}else{
	 				$('nav').css({
	 					'position': 'fixed',
	 					'background':'teal',
	 					'height':'100px',
	 					'paddingTop':'7px' 
	 					// 'transition': 'all 5s ease'
	 				});
	 			}
	 		});
	 	});