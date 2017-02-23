<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nutriendo F.S</title>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/max.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<nav class="pink lighten-2">
    	<div class="nav-wrapper">
      	<a href="#!" class="brand-logo right"><h1>Nutriendo F.S.</h1></a>
      	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons menu">menu</i></a>
      	<ul class="left hide-on-med-and-down">
          <li><a href="#">Servicios<i class="material-icons right">work</i></a></li>
	        <li><a href="#">Productos<i class="material-icons right">credit_card</i></a></li>
	        <li><a href="#contaco">Contactenos<i class="material-icons right">person_pin</i></a></li>
	        <li><a href="#admin"><i class="material-icons right">settings_applications</i></a></li>
      	</ul>
      <div>
      <ul class="side-nav" id="mobile-demo">
        <a class="waves-effect waves-light" href="#modal1"><i class="material-icons right">search</i></a>
        <li><a href="#">Servicios<i class="material-icons right">work</i></a></li>
        <li><a href="#">Productos<i class="material-icons right">credit_card</i></a></li>
        <li><a href="#contaco">Contactenos<i class="material-icons right">person_pin</i></a></li>
        <li><a href="#admin"><i class="material-icons right">settings_applications</i></a></li>
      </ul>
      </div>
      </div>
    </nav>
<div id="dintancia"></div>
<div class="slider" id="slider">
<div class="content">

    <ul class="slides">
      <li>
        <img src="img/1.jpg"> <!-- random image -->
        <div class="caption center-align">
          <!-- <h3>Slide uno Center</h3> -->
          <!-- <h5 class="light grey-text text-lighten-3">Descripción 1</h5> -->
        </div>
      </li>
      <li>
        <img src="img/2.jpg"> <!-- random image -->
        <div class="caption left-align">
          <!-- <h3>Slide dos Left</h3> -->
          <!-- <h5 class="light red-text text-lighten-3">Descripción 2</h5> -->
        </div>
      </li>
      <li>
        <img src="img/3.jpg"> <!-- random image -->
        <div class="caption right-align">
          <!-- <h3>Slide 3 Right</h3> -->
          <!-- <h5 class="light grey-text text-lighten-3">Descripción 3</h5> -->
        </div>
      </li>
      <li>
        <img src="img/4.jpg"> <!-- random image -->
        <div class="caption center-align">
          <!-- <h3>Slide 4</h3> -->
          <!-- <h5 class="light grey-text text-lighten-3">Descripción 4</h5> -->
        </div>
      </li>
      
      <li>
        <img src="img/5.jpg"> <!-- random image -->
        <div class="caption center-align">
          <!-- <h3>Slide 4</h3> -->
          <!-- <h5 class="light grey-text text-lighten-3">Descripción 4</h5> -->
        </div>
      </li>
    </ul>
  </div>
  </div>
  <!-- <div class="progress pink lighten-2">
      <div class="indeterminate white lighten-2" id="cargando"></div>
  </div> -->
<!-- Visión -->
<div class="container" id="vision">
<div class="col l12 s12">
<h2 class="center-align">Visión</h2>
<p class="flow-text">
  <?php
  require_once("clases/conn.php"); 
  $db = new connDb();
  $q="SELECT * FROM contenidos";
  $data = $db->leeTabla($q); 
  for ($i=0; $i <count($data); $i++) {
    print(utf8_encode($data[$i]->vision));
  }
?>
</p>
</div>
</div>
<!-- Mapa Google-->
<div id="mapa" class="z-depth-5">
<iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1991.411871790154!2d-76.54164007171062!3d3.3931671822178284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a15af486aad1%3A0xafea3a3157d9b621!2sCl.+11a+%2370-35%2C+Cali%2C+Valle+del+Cauca%2C+Colombia!5e0!3m2!1ses-419!2s!4v1483235042298" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

		<!-- Administrador -->

<div id="admin" class="modal">

    <div class="modal-content">
		<form action="" id="registro">
			<h4 class="center-align">Iniciar Sesión</h4>
      <div id="noti">
          <i class="material-icons"></i>
          <span ></span>
      <div id="cargando" style="width: 100%;margin: auto;text-align: center;"></div>
      </div>
          <div class="input-field col s6">
            <input type="text" name="usuario" id="usuario" class="validate">
            <label for="usuario">Usuario</label>
          </div>
          <div class="input-field col s6">
            <input type="password" name="clave" id="clave" class="validate">
            <label for="clave">Contraseña</label>
          </div>
          <div class="row ">
            <!-- <input type="submit" name="enviar" value="Iniciar Sesión"> -->
            <button class="btn pink lighten-2" name="ingreso">Iniciar Sesión</button>
          </div>
     </form>
 </div>
</div>
  
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
		<h2 class="center-align flow-textblack">Buscar</h2>
		 	<form action="index.php" class="col 6" method="post">
		 		<!-- <div class="input-field row"> -->
		 			<input type="text" name="nombre" id="nombre" class="validate"><button class="btn col s2">Buscar</button>
		 		<!-- </div> -->
	 		</form>
	</div>
    <div class="modal-footer">
      <a href="#" class=" modal-action modal-close waves-effect waves-green btn red">Cerrar</a>
    </div>
  </div>
<!-- Contactanos  -->
<div id="contaco" class="modal">
    <div class="modal-content">
    <form action="" class="" method="post">
      <h4 class="center-align">Contactanos</h4>
          <div class="input-field col s6">
            <input type="text" name="usuario" id="usuario" class="validate">
            <label for="usuario">Nombres y apellidos</label>
          </div>
          <div class="input-field col s6">
            <input type="email" name="clave" id="apellido" class="validate">
            <label for="clave">Correo Electrónico</label>
          </div>
          <div class="input-field col s6">
            <textarea id="servicio" class="materialize-textarea"></textarea>
            <label for="servicio">Necesitas un servicio en particular ?</label>
          </div>
          <div class="row ">
            <button class="btn pink lighten-2" name="ingreso">Contactar</button>
          </div>
     </form>
 </div>
</div>
<?php 
  require_once("clases/conn.php");
  $db = new connDb();
  $q = "";
  $data = $db->leeTabla($q)
 ?>
<!-- Footer -->
<footer class="page-footer pink lighten-2" id="footer">
		<div class="container">
			<div class="row">
				<div class="col l12 s12">
	                <h5 class="white-text">Contactos</h5>
	                <p class="grey-text text-lighten-4">
                    <?php 
                      $db = new connDb();
                        $q="SELECT * FROM contenidos";
                        $data = $db->leeTabla($q); 
                        for ($i=0; $i <count($data); $i++) {
                          print(utf8_encode($data[$i]->direccion));
                        }
                      $db->close();

                     ?>


                  </p>
              	</div>	
			</div>
		</div>
		<div class="footer-copyright">
            <div class="container">
            © 2014 Copyright <a href="https://www.Enredes.com" target="_blank">EnRedes</a>
            <a class="grey-text text-lighten-4 right" href="#admin"><i class="material-icons right"><!-- swap_vertical_circle --></i>--------------</a>
            </div>
          </div>
</footer>
	 <script type="text/javascript">
			$(document).ready(function(){
				$('.modal').modal();
				$(".button-collapse").sideNav();
				$('.slider').slider();
        // $('.carousel.carousel-slider').carousel({
        //   full_width: true,
        //   time_constant:100
        // });
			});	
	</script>
</body>
</html>