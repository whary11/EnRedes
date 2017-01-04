$(document).ready(function() {
   $(document).scroll(function(){
   	if($(document).scrollTop()>10){
   		$('header').css({
   			'background-color':'red',
   			'height':'90px'
   		});

         $('#dos li, #uno li').css({
            'lineHeight': '10px'
         });
   		$('#logo').css({
   			'width': '80px',
   			'marginTop': '35px'
   		});
   	}else{
   		$('header').css({
   			'background-color':'teal',
   			'height':'120px'
   		});
   		$('#logo').css({
   			'width': '15%',
   			'marginTop': '30px'
   		});
         $('#dos li, #uno li').css({
            'lineHeight': '50px'
         });
   	}
   })
});


