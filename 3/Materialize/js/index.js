$(document).ready(function() {
	var alturaNav = $('nav').height();
	// alert(prueba)
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
				// 'color':'blac'
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