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
	<nav id="minav">
  	<a href="#!" class="brand-logo right" style="color: teal; margin-right:20px;" >EnRedes</a>
    <div id="mmenu">
      <i class="material-icons right">menu</i>

    </div>
  	<ul class="left">
      <li><a href="#">Blog <i class="material-icons right">credit_card</i></a></li>
      <li><a href="#contacto">Contactenos<i class="material-icons right">person_pin</i></a></li>
      <li><a href="<?php print($page) ?>">Admin<i class="material-icons right">mode_edit</i></a></li>
  	</ul>
    </nav>
<!-- Visión -->
  <div id="ir">
    <i class="material-icons icon">expand_less</i>
  </div>

 
  <section id="uno">
    <h1>Misión</h1>
    <p id="p1">
    Ofrecer a nuestros clientes soluciones integrales con tecnologías de innovaciones permanentes y aplicables de manera segura, que permita un buen posicionamiento en el mercado en red de manera productiva y competitiva para aquellas empresas o clientes  que se proyectan en ser líderes en sus mercados sociales, culturales y económicos. 
    </p>    
    <hr style="background-color:#FFD740; height:1px;border: none;width: 100%;">
    <h2>Visión</h2>
    <p id="p2">
    Ser una empresa que vaya a la vanguardia de la tecnología, que contribuya en el crecimiento de los  clientes que planean una proyección de progreso por medio del mercadeo en red, optimizando sus procesos para faciliar cómo se muestrán al mundo.</p>
  </section>
  <section id="escibe" style="background: #FFD740;width: 100%; padding: 20px; font-size: 30px; margin-top: -130px;">
      <p style="color:teal;text-align: center;">"Contactanos, somos la mejor alternativa en Dasarrollo de sisitemas y aplicaciones Web."<span>&#160</span></p>
    </section>
<h4 class="center-align" style="color: teal">Nuestro Servicios</h4>
 <div class="slider" style="display:block">
    <ul class="slides">
 <?php 
$db = new connDb();
  $q="SELECT * FROM servicios";
  $data = $db->leeTabla($q); 
  for ($i=0; $i <count($data); $i++) {
    print('<li>
            <section class="hoverable tarjetas" style="padding:3%; width: 40%; margin: 10px auto 10px auto; border-radius:5px;">
              <p align="center" style="font-size: 30px"><i  style="font-size: 90px;;" class="material-icons">'.utf8_encode($data[$i]->icono).'</i><hr><p style="font-size: 20px; text-align:center; font-weight: bold">'.utf8_encode($data[$i]->nombre_servicio).'</p></p>
              <p style="text-align: justify; padding: 5px;">'.utf8_encode($data[$i]->descripcion).'</p>
               <!-- Etiquetas -->
              <div class="chip" style="background:'.utf8_encode($data[$i]->color).'">
              '.utf8_encode($data[$i]->etiqueta1).'
              </div>
              <div class="chip" style="background:'.utf8_encode($data[$i]->color).'">
                '.utf8_encode($data[$i]->etiqueta2).'
              </div>
              <div class="chip" style="background:'.utf8_encode($data[$i]->color).'">
                '.utf8_encode($data[$i]->etiqueta3).'
              </div>
              <div class="chip" style="background:'.utf8_encode($data[$i]->color).'">
                '.utf8_encode($data[$i]->etiqueta4).'
              </div>
              <div class="chip" style="background:'.utf8_encode($data[$i]->color).'">
                '.utf8_encode($data[$i]->etiqueta5).'
              </div>
            </select>
          </li>
      ');
  }
$db->close();
?>
</ul>
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
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h2 class="center-align flow-textblack">Buscar</h2>
      <form action="index.php" class="col 6" method="post">
          <input type="text" name="nombre" id="nombre" class="validate">
          <button class="btn col s2">Buscar</button>
      </form>
    </div>
    <div class="modal-footer">
      <a href="#" class=" modal-action modal-close waves-effect waves-green btn red">Cerrar</a>
    </div>
  </div>
<!-- Contactanos  -->
<div id="contacto" class="modal modal_admin">
  <div class="modal-content">
    <p style="color: teal;font-size: 30px; text-align: center;">Contactos</p>
    <p style="font-style: italic;text-align: justify;">Si tienes una idea y necesitas de nuestros servicios, dejanos tus datos y te contactaremos en el menor tiempo posible, pero si gustas te puedes comunicar con nosotros cuando lo desees.</p>
    <span style="color: teal">Tle: 3127049308</span><br>
    <hr>
    <span style="color: teal;" >Correos Eelectrónicos: clientes@enredes.com</span>  
  </div>
</div>
<!-- Footer -->
  <footer class="page-footer" style="background-color: teal">
    
    <div id="suscribe" class="modal">
      <div class="modal-content">
        <form id="suscribirse">
          <input type="email" id="scorreo" placeholder=" Suscribete......">
          <input type="submit" value="Suscribirse" id="senvia" class="btn">
        </form>
      </div>
    </div>
      <a href="#suscribe" class="btn" style=" display:block;width:200px; margin:0px auto 20px auto;">Suscribete</a>
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
      $('.slider').slider();
  	});	
	</script>
</body>
</html>