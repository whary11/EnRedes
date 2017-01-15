//Esta es una de la referencia muy util a la hora de obtener losdatos de Facebook por medio de su api -->
//facebook.developers.com -->
//https://developers.facebook.com/tools/explorer/145634995501895/?method=GET&path=me%3Ffields%3Did%2Ccover%2Cemail%2Ccontext%2Cage_range&version=v2.8 -->
window.fbAsyncInit = function() {
FB.init({
	//Id de la app creada en la consola de Facebook para desarrolladores, el resto de información debe estar tal cual 
  appId      : '1599969950310836',
  xfbml      : true,
  version    : 'v2.8'
	});
FB.AppEvents.logPageView();
};
(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) return;
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/es_LA/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



  /////////////Inicio de sesión con  la API de Facebook
$(document).ready(function() {
	$('#cerrar').hide();
	$('#face').submit(function(e) {	
		e.preventDefault();		
	});



	$('#compartir').click(function() {
	// alert(event.timeStamp());

	//////Compartir en Faceboock
	//Leer un poco esta documentación para optimizar tus publicaciones.
	//https://developers.facebook.com/docs/sharing/reference/share-dialog
	//https://developers.facebook.com/docs/sharing/webmasters#markup
	 FB.ui({
	    method: 'share',
	    display: 'popup',
	    ///Aquí va la url que aparecerá en el cuadro de publicación.
	    href: 'https://nutriendofs.com',
	  }, function(response){});
	});
		$('#btn-face').click(function(){
		  FB.getLoginStatus(function() {
		   	FB.login(function(response) {
			  if (response.status === 'connected') {
			    //la persona inició sesión en Facebook y en tu aplicación.
			    console.log(response.status)
			    ///////No hemos accedido al token del usuario, para que facebook nos permita realizar otras funciones.
			    FB.api('/me',{fields: "email, name,last_name,timezone, link, cover{id}, first_name,middle_name"}, function(response) {
			    	////// Obteniendo datos de Facebook, haceiendo uso de FB.api
			    	var nombre = response.name;
			    	var correo = response.email;
			    	var id = response.id;
			    	var foto ="<img src='http://graph.facebook.com/"+id+"/picture/' width='80px' height='80px' class='circle responsive-img'>";
			    	var enlace = response.link;
			    	var primer_n = response.first_name;
			    	var segundo_n = response.middle_name;
			    	var primer_a = response.last_name;
			    	var zona_horaria = response.timezone;
			    	$('#nombre').text(nombre);
			    	$('#correo').text(correo);
			    	$('#idus').text(id);
			    	$('#foto').html(foto);
			    	$('#enlacep').html('<a href="'+enlace+'">Aquí..</a>');
			    	$('#primer-n').text(primer_n);
			    	$('#segundo-n').text(segundo_n);
			    	$('#primer-a').text(primer_a);
			    	$('#zona-horaria').text('UTC'+zona_horaria);
				////////////////////Aquí debe ir el código para enviar los datos a la base de datos, es recomendable que utilices Jquery para enviar la petición y posteriormente los datos
			    });
			    $('#btn-face').hide();
			    $('#cerrar').show();
			  } else if(response.status === 'not_authorized') {
			    //la persona inició sesión en Facebook, pero no en tu aplicación.
			  } else {
			    // la persona no inició sesión en Facebook, de modo que no sabes si la inició en tu aplicación. O bien, se llamó a FB.logout() con anterioridad y no se pudo conectar con Facebook.
			  }
			}, {scope: 'public_profile, email'});
		  });

			/////Facebook Analitycs, falta afinar esta parte
		  function onButtonClick() {
			  FB.AppEvents.logEvent("sentFriendRequest");
			}
	});
	///////////Cerrar sesión
	$('#cerrar').click(function() {
		FB.logout(function(response) {
			console.log("Sesión cerrada")
		});
	})
});