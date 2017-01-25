<?php 
  require_once("clases/conn.php");
  session_start();
  $page;
  if (isset($_SESSION["usuario"])) {
    $page = "administrador/admin.php";
  }else{
    $page = "#admin";
  }
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>EnRedes</title>
	<meta charset="UTF-8">
	<title>EnRedes</title>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/max.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<nav class="">
    	<div class="nav-wrapper">
      	<a href="#!" class="brand-logo right"><img src="img/logo.jpg" id="logo"></a>
      	<a href="#" data-activates="mobile-demo" class="button-collapse menu"><i class="material-icons font-20"></i></a>
      	<ul class="left hide-on-med-and-down">
	        <li><a href="#">Enlaces</a></li>
	        <li><a href="#">Blog <i class="material-icons right">credit_card</i></a></li>
	        <li><a href="#">Contactenos<i class="material-icons right">person_pin</i></a></li>
	        <li><a href="<?php print($page) ?>">Adminstrador <i class="material-icons right">mode_edit</i></a></li>
      	</ul>
      <div>
      <ul class="side-nav" id="mobile-demo">
        <a class="waves-effect waves-light" href="#modal1"><i class="material-icons right">search</i></a>
        <li><a href="#">Enlaces</a></li>
        <li><a href="#">Blog <i class="material-icons right">credit_card</i></a></li>
        <li><a href="#">Contactenos<i class="material-icons right">Blog credit_card</i></a></li>
        <li><a href="<?php print($page) ?>">Adminstrador <i class="material-icons right">mode_edit</i></a></li>
      </ul>
      </div>
      </div>
    </nav>
<div id="espacio"></div>
<div class="slider">
    <ul class="slides">
      <li>
        <img src="img/apple-606761_1920.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="img/presentation-1794128_1280.png"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="img/background.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="img/background.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>

<!-- Visión -->
<div id="ir">
  <i class="material-icons icon">expand_less</i>
</div>
<div class="container" id="vision">
<div class="col l12 s12">
<h2 class="center-align">Un poco de nosotros</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
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
</div>
</div>
</div>
<hr>


  <!-- <a href="index.php?men=memem">enviar</a> -->
<!-- 2 -->
  </div>
  </div>
    <!-- Administrador -->
<div id="admin" class="modal modal_admin">
  <div class="modal-content">
    <form  id="form_admin" action="valida_enredes_er.php" method="POST">
      <div class="input-field col s6">
        <input type="text" name="usuario" id="usuario" class="validate" autofocus>
        <label for="usuario">Usuario</label>
      </div>
      <div class="input-field col s6">
        <input type="password" name="clave" id="clave" class="validate">
        <label for="clave" id="clv">Contraseña</label>
      </div>
        <input type="submit" class="btn" name="iniciar_sesion" value="Ingresar"/>
    </form>
  </div>
  <p id="error_form_admin" align="center"></p>
</div>
<!-- Validación de formulario-->
<!-- Ventana modal con formulario integrado -->  
<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
    <h2 class="center-align flow-textblack">Buscar</h2>
      <form action="index.php" class="col 6" method="post">
        <!-- <div class="input-field row"> -->
          <input type="text" name="nombre" id="nombre" class="validate">
          <button class="btn col s2">Buscar</button>
        <!-- </div> -->
      </form>
  </div>
    <div class="modal-footer">
      <a href="#" class=" modal-action modal-close waves-effect waves-green btn red">Cerrar</a>
    </div>
  </div>
<!-- Contactanos  -->
<!-- Contactenos

 -->

<h4 class="center-align">Nuestro Servicios</h4>
 <div class="slider" >
    <ul class="slides">
 <?php 
$db = new connDb();
  $q="SELECT * FROM servicios";
  $data = $db->leeTabla($q);
  // print count($data);  
  for ($i=0; $i <count($data); $i++) {
    print('<li>
      <section class="hoverable tarjetas" style="padding:3%; width: 30%; margin: 10px auto 10px auto; border-radius:5px;">
        <p align="center" style="font-size: 30px"><i  style="font-size: 90px;;" class="material-icons">'.utf8_encode($data[$i]->icono).'</i><hr><p style="font-size: 20px; text-align:center; font-weight: bold">'.utf8_encode($data[$i]->nombre_servicio).'</p></p>
        <p style="text-align: justify; padding: 5px;">'.utf8_encode($data[$i]->descripcion).'</p>
         <!-- Etiquetas -->
        <div class="chip card-panel lighten-2" style="background:'.utf8_encode($data[$i]->color).'">
          <i class="close material-icons" style="cursor:auto;">done</i>
        '.utf8_encode($data[$i]->etiqueta1).'
        </div>
        <div class="chip card-panel lighten-2" style="background:'.utf8_encode($data[$i]->color).'">
          <i class="close material-icons" style="cursor:auto;">done</i>
          '.utf8_encode($data[$i]->etiqueta2).'
        </div>
        <div class="chip card-panel lighten-2" style="background:'.utf8_encode($data[$i]->color).'">
          <i class="close material-icons" style="cursor:auto;">done</i>
          '.utf8_encode($data[$i]->etiqueta3).'
        </div>
        <div class="chip card-panel lighten-2" style="background:'.utf8_encode($data[$i]->color).'">
          <i class="close material-icons" style="cursor:auto;" >done</i>
          '.utf8_encode($data[$i]->etiqueta4).'
        </div>
        <div class="chip card-panel lighten-2">
          <i class="close material-icons" style="cursor:auto;" style="background:'.utf8_encode($data[$i]->color).'">done</i>
          '.utf8_encode($data[$i]->etiqueta5).'
        </div>
      </section>
      </li>
      ');
  }
$db->close();
?>
    <!-- </ul> -->
  </div>
<!-- Footer -->
<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l12 s12">
	                <h5 class="white-text">Contenido del Footer</h5>
	                <p class="grey-text text-lighten-4" id="parr">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              	</div>	
			</div>
		</div>
		<div class="footer-copyright">
            <div class="container">
            © 2016 Copyright EnRedes
            <a class="grey-text text-lighten-4 right" href="#admin">Acá pueden ir las redes sociales</a>
            </div>
          </div>
</footer>
	 <script type="text/javascript">
			$(document).ready(function(){
				$('.modal').modal();
				$(".button-collapse").sideNav();
				// Pause slider
        $('.slider').slider();
			});	
	</script>
</body>
</html>