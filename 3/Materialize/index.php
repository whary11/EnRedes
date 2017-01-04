<?php 
  require_once("clases/conn.php");
 // Validar formulario e inicio de sesión
if (isset($_POST["ingreso"])) {
  $usuario = $_POST["usuario"];
  $clave = $_POST["clave"];
  $db = new connDb();
  $data = $db->leeTabla("SELECT id_user FROM registro WHERE contrasena1='$clave' AND correo='$usuario'");
  for ($i=0; $i <count($data) ; $i++) { 
    $id_user = $data[$i]->id_user;
  }
  // print($id_user);
  if($db::buscaUsuario("registro",$usuario,$clave)){
      header("location: admin.php");
      $_SESSION["id"]=$id_user;

  }else{
    header("location: index.php");
  }
}
unset($db);
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>EnRedes</title>
	<meta charset="UTF-8">
	<title>Materialize</title>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/max.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<!-- <div class="navbar-fixed"> -->
	<nav class="">
    	<div class="nav-wrapper">
      	<a href="#!" class="brand-logo right"><img src="img/logo.jpg" id="logo"></a>
      	<a href="#" data-activates="mobile-demo" class="button-collapse menu"><i class="material-icons font-20"></i></a>
      	<ul class="left hide-on-med-and-down">
	        <li><a href="#">Enlaces</a></li>
	        <li><a href="#">Blog <i class="material-icons right">credit_card</i></a></li>
	        <li><a href="#">Contactenos<i class="material-icons right">person_pin</i></a></li>
	        <li><a href="#admin">Adminstrador <i class="material-icons right">mode_edit</i></a></li>
      	</ul>
      <div>
      <ul class="side-nav" id="mobile-demo">
        <a class="waves-effect waves-light" href="#modal1"><i class="material-icons right">search</i></a>
        <li><a href="#">Enlaces</a></li>
        <li><a href="#">Blog <i class="material-icons right">credit_card</i></a></li>
        <li><a href="#">Contactenos<i class="material-icons right">Blog credit_card</i></a></li>
        <li><a href="#admin">Adminstrador <i class="material-icons right">mode_edit</i></a></li>
      </ul>
      </div>
      </div>
    </nav>

<!-- Espacio para bajar el Slider y permitir que se pueda ver -->
<div id="espacio"></div>
<!-- Sliders -->
<div class="slider">
<div class="content">
    <ul class="slides">
      <li>
        <img src="img/apple-606761_1920.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>Slide uno Center</h3>
          <h5 class="light grey-text text-lighten-3">Descripción 1</h5>
        </div>
      </li>
      <li>
        <img src="img/background.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>Slide dos Left</h3>
          <h5 class="light red-text text-lighten-3">Descripción 2</h5>
        </div>
      </li>
      <li>
        <img src="img/imac-605421_1920.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>Slide 3 Right</h3>
          <h5 class="light grey-text text-lighten-3">Descripción 3</h5>
        </div>
      </li>
      <li>
        <img src="img/presentation-1794128_1280.png"> <!-- random image -->
        <div class="caption center-align">
          <h3>Slide 4</h3>
          <h5 class="light grey-text text-lighten-3">Descripción 4</h5>
        </div>
      </li>
      <li>
        <img src="img/presentation-1794128_1280.png"> <!-- random image -->
        <div class="caption center-align">
          <h3>Slide 4</h3>
          <h5 class="light grey-text text-lighten-3">Descripción 4</h5>
        </div>
      </li>
    </ul>
  </div>
  </div>
<!-- Visión -->
<div class="container" id="vision">
<!-- <div class="row"> -->
<div class="col l12 s12">
<h2 class="center-align">Visión EnRedes</h2>
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
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
</div>
</div>
  <!-- Tarjetas -->
<div class="container">
<div class="row">
<h4 class="center-align">Equipo de trabajo</h4>
<?php 
  $db = new connDb();
  $q="SELECT * FROM contenidos";
  $data = $db->leeTabla($q);
  // print count($data);
  for ($i=0; $i <count($data); $i++) { 
    print('<div class="col l6 s12">
           <div class="card card-panel z-depth-2">
              <div class="card-image waves-effect waves-block waves-light col s6">
                <img class="z-depth-2" src="img/fotos/'.$data[$i]->imagen.'" width="100px">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Desarrollador Web<i class="material-icons right">more_vert</i></span>
                <div class="limit">
                <p>
                '.$data[$i]->contenido.'</p>
              <div>
                <p><a href="index.php#admin?id=123">EnRedes</a></p>
              </div>
              </div>
              </div>
              <div class="card-reveal blue lighten-3">
                <span class="card-title grey-text text-darken-4">'.$data[$i]->titulo.'<i class="material-icons right">close</i></span>
                <p>'.$data[$i]->contenido.'</p>
              </div>
            </div>
          </div>'
    );
    unset($db);
  }
 ?>
  <!-- <a href="index.php?men=memem">enviar</a> -->
<!-- 2 -->
  </div>
  </div>
		<!-- Administrador -->
    <!-- Validar formulario con Jquery -->

<div id="admin" class="modal">
    <div class="modal-content">
		<form action="" class="" method="post">
			<h4 class="center-align">Iniciar Sesión</h4>
		 			<div class="input-field col s6">
		 				<input type="text" name="usuario" id="usuario" class="validate">
		 				<label for="usuario">Usuario</label>
		 			</div>
		 			<div class="input-field col s6">
		 				<input type="password" name="clave" id="clave" class="validate">
		 				<label for="clave" id="clv">Contraseña</label>
		 			</div>
		 			<div class="row ">
		 				<!-- <input type="submit" name="enviar" value="Iniciar Sesión"> -->
		 				<button class="btn" name="ingreso">Iniciar Sesión</button>
		 			</div>

		 </form>
		
 </div>
</div>

<!-- Validación de formulario-->
<!-- <div id="arriba">
  <a href="#nav" class="btn-floating btn-large waves-effect waves-light red">Ir arriba</a>
</div> -->

	<!-- Ventana modal con formulario integrado -->
  
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
<!-- Contactenos
 -->

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
            © 2014 Copyright EnRedes
            <a class="grey-text text-lighten-4 right" href="#admin">Acá pueden ir las redes sociales</a>
            </div>
          </div>
</footer>
	 <script type="text/javascript">
			$(document).ready(function(){
				$('.modal').modal();
				$(".button-collapse").sideNav();
				$('.slider').slider();
			});	
	</script>
</body>
</html>