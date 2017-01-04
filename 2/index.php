<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Proyecto 2 EnRedes</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/script.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
</head>
<body>
<header>
	<nav>
		<ul  id="uno" class="list-group">
			<a href=""><li class="">Inicio</li></a>
			<a href=""><li>Proyecto</li></a>
		</ul>
		<ul  id="dos">
			<a href=""><li>Varios</li></a>
			<a href=""><li>Admin</li></a>
		</ul>
		<img src="img/logo.jpg" class="img-circle" id="logo">

	</nav>
</header>
<div>
	<img src="img/background.jpg" id="banner" class="img-responsive">
</div>


<div class="col-xs-12 col-md-12" id="equipo">
<?php 
  for ($i=0; $i < 8; $i++) { 
 ?>
  <section class="equipo col-md-3" col-md-3 col-md-offset">
  <img src="img/logo.jpg" class="col-xs-3 col-xs-offset-1">
  	<p class="text-primary text-center nombre">Luis Fernando Raga Renteria</p>
    	<p class="text-success">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
  </section>
<?php 
  }
 ?>
</div>

<div id="form" class="col-md-12">
<form class="form-inline col-md-12 col-md-offset-1">
  <div class="form-group">
    <label class="sr-only" for="correo">Correo Electrónico</label>
    <input type="email" class="form-control" id="correo" placeholder="Correo Electrónico">
  </div>
  <div class="form-group">
    <label class="sr-only" for="clave">Comtraseña</label>
    <input type="password" class="form-control" id="clave" placeholder="Comtraseña">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> <a href="#">Aceptas los teminos y condiciones?</a>
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Suscribete</button>
</form>
</div>

 <p class="col-md-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



	<!-- <div class="container contenido" >
  		<p class="col-xs-6"> nkjklvjxcvzckjlzbxcvjkbzckjzbcvzljkblore Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  		</p>
  		<p class="col-xs-6">
  			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  		</p>
  		<p class="col-xs-6">
  			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  		</p>
  		<p class="col-xs-6">
  			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  		</p>
  		<p class="col-xs-6">
  			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  		</p>
  		<p class="col-xs-6">
  			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  		</p>
	</div> -->
	
</body>
</html>