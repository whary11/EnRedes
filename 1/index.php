<?php 
	require_once 'includes/cabeza.php';
	require_once "includes/conectar.php";
	$nota="";
	$correo2="";
	$nombre2;
	if(isset($_POST["suscribe"])){
		$nombre = $_POST["nombre"];
		$correo = $_POST["correo"];
		$q = "INSERT INTO suscribirse (id,nombre,correo) values ('','$nombre','$correo')" ;
		$prueba = mysqli_query($conectar, "SELECT * FROM suscribirse WHERE correo='$correo'");
		$crArray = array();
		while ($obj = mysqli_fetch_object($prueba)) {
			array_push($crArray,$obj);
		}
		for ($i=0; $i < count($crArray); $i++) { 
			$correo2 = $crArray[$i]->correo;
			$nombre2 = $crArray[$i]->nombre;
		}
		if ($nombre=="") {
			$nota = "Debe digitar su Nombre.";
		}elseif ($correo=="") {
			$nota = "Debe digitar su Correo.";
		}elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			$nota = "Debe digitar un Correo válido .";
		}elseif($correo2==$correo){
			$nota = "Señor(a) $nombre2, el correo $correo2 ya existe en nuestra base de datos";
		}else{
			mysqli_query($conectar, $q);
			$nota = "Pronto recibirá nuestras últimas actualizaciones.";
		}

	}
 ?>
	<section id="imagen">
		<img src="img/background.jpg">
	</section>

	
	<section id="nosotros">

	<!-- Consulta para imprimir integrantes del equipo.-->
	<?php 
		$qc = "SELECT * FROM contenidos ";
		$result = mysqli_query($conectar, $qc);
		$equipo = array();

	 ?>
	<h1>Nuestro Equipo de Trabajo</h1>
	<?php
	while ($obj = mysqli_fetch_object($result)) {
			array_push($equipo,$obj);
		}
	for ($i=0; $i < count($equipo); $i++) { 
	print'<div class="equipo">
	<img src="img/fotos/'.utf8_encode($equipo[$i]->id_user).'.jpg" class="perfil"><hr>
	<p class="nombre"><span class="icon-user-minus"></span> '.utf8_encode($equipo[$i]->titulo).'</p>
	<p>'.utf8_encode($equipo[$i]->contenido).'</p><hr>
	<p style="text-align: center;">Desarrolladores Certificados - EnRedes</p>
	</div>';
	 }
	?>
	</section>


	<section id="experiencias">
	<h2>Algunas experiencias</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
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
		<p class="linea"></p>
	</section>
	<section id="formulario">
		<form action="#" method="post">
		<h6>Suscribrete</h6>
			<br>
			<p align="center" id="error"><?php print($nota); ?></p>
			<br>
			<div id="error"></div>
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre">
				<label for="correo">Correo Electrónico</label>
				<input type="email" name="correo" placeholder="Correo Electrónico">
				<button type="submit" name="suscribe">Suscribirse</button>
			</form>
	</section>
<?php 
	require_once 'includes/pie.php';
 ?>