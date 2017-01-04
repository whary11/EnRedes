<?php
	require_once 'includes/conectar.php';
	session_start();
	
 ?>
<?php
	$datosContenido = "";	
	$nota = "";
	$dbusuario = "";
	$dbclave = "";
if(!isset($_SESSION["usuario"])){
 
	if(isset($_POST["ingresar"])){
		# code...
		$usuario = $_POST["usuario"];
		$clave = $_POST["clave"];
	// Obtenemos la consulta para hacer la validación inicial
		$q = "SELECT * FROM registro WHERE correo='$usuario' and contrasena1='$clave'";
		$resultado = mysqli_query($conectar, $q);
		$Nfilas = mysqli_num_rows($resultado);
		if($Nfilas=="1"){
			while($data = mysqli_fetch_array($resultado)){
				$dbusuario = ($data["correo"]);
				$dbclave = $data["contrasena1"];
				$dbid = $data["id_user"];
				$dbnombre = $data["nombre"];
				$dbapellidos = $data["apellido"];
				$dbtelefono = $data["telefono"];
			}
	}
// Hacemos todo el proceso de validación con los datos obtenidos desde la base de datos y los introducidos por el usuario
	if($usuario==""){
		$nota = "El Usuario debe ser digitado.";
	}elseif ($clave=="") {
		$nota = "La contraseña debe ser digitada.";
	}elseif(!filter_var($usuario, FILTER_VALIDATE_EMAIL)){
	 	$nota = "Recuaerde que su usuario es su Correo electrónico resgistrado.";	
	}elseif ($usuario!=$dbusuario) {
		$nota = "Este usuario no está registrado.";
	}elseif ($clave!=$dbclave) {
		$nota = "La contraseña no coincide.";
	}else{
		$_SESSION["usuario"] = $dbusuario;
		$_SESSION["id"] = $dbid;
		$_SESSION["nombre"] = $dbnombre;
		$_SESSION["apellidos"] = $dbapellidos;
		$_SESSION["telefono"] = $dbtelefono;
		header("location: admin.php");
	}
// Sentencia para desconectar nuestar consulta y evitar cargar nuestra pagina.
	mysqli_free_result($resultado);
	mysqli_close($conectar);
}
  ?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
  	<meta charset="UTF-8">
  	<title>Inicio de Sesión</title>
  	<link rel="stylesheet" type="text/css" href="css/sesion.css">
  	<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Source+Sans+Pro" rel="stylesheet">
  </head>
  <body>
<section id="formulario" class="inicio">
		<form action="admin.php" method="post" >
		<h1>Inicio de Sesión</h1>
			<br><br>
			<div id="error"><p><?php print($nota); ?></p></div>
			<br><br>
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Escribe su Usuario">
				<label for="clave">Contraseña</label>
				<input type="password" id="clave" name="clave" placeholder="Escribe su contraseña">
				<button type="submit" name="ingresar">Ingresar</button>
		</form>
</section>
</body>
  </html>
<?php 
}else{
 ?>
 <?php 
$dbnombre= $_SESSION["nombre"];
$dbapellidos= $_SESSION["apellidos"];
$dbusuario = $_SESSION["usuario"];
$dbid = $_SESSION["id"];
$dbtelefono = $_SESSION["telefono"];

$datos = array($dbid,$dbnombre/*,$dbapellidos*/,$dbtelefono, $dbusuario);
 ?>
<!-- Aquí escribiremos enuestro código en caso de haber iniciado sesión -->
<!DOCTYPE html>

  <html lang="es">
  <head>
  	<meta charset="UTF-8">
  	<title>Área del Administrador</title>
  	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/admin.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Source+Sans+Pro" rel="stylesheet">
  	<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->
  	<script type="text/javascript" src="js/admin.js"></script>
  	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src='ckeditor/ckeditor.js'></script>


  	
  	<!-- <script>
  	tinymce.init({selector:'textarea' });
  	
  	</script> -->
  </head>
  <body>
  <?php 
$bandera = false;
$nota = "";
$id_user= $_SESSION["id"];
//Solucionar errores
$qc = "SELECT * FROM contenidos WHERE id_user='$id_user'";
		$result = mysqli_query($conectar, $qc);
		// print($result);
		$fila = mysqli_num_rows($result);
		if($fila=="1"){
			while($datac = mysqli_fetch_array($result)){
				$dbcid = $datac["id"];
				$dbctipo = $datac["tipo"];
				$dbctitulo = $datac["titulo"];
				$dbccontenido = $datac["contenido"];
				$dbcimagen = $datac["imagen"];
				$dbcid_user = $datac["id_user"];
			}			
		}
if(isset($_POST["pparrafo"])){
	$id="";
	$tipo="pparrafo";
	$titulo = $_POST["titulo"];
	$contenido = $_POST["contenido"];
	$foto = $id_user.".jpg";
	$q= "UPDATE contenidos SET tipo='$tipo', titulo='$titulo', contenido='$contenido', imagen='$foto', id_user='$id_user' WHERE id_user='$id_user'";
	if($titulo==""){
		$nota= "El titulo es requerido.";
	}elseif($contenido=="") {
		$nota= "El Contenido es requerido.";
	}elseif(is_uploaded_file($_FILES['foto']['tmp_name'])){
		// Afinar este código para obtener el nombre del archivo y cambiar la variable $skd
		copy($_FILES['foto']['tmp_name'], "img/fotos/$foto");
		mysqli_query($conectar,$q);
		header("location: admin.php#actualiza");
	}else{
		mysqli_query($conectar,$q);
		header("location: admin.php#actualiza");
	}	
}
 ?>
<!-- Aquí va nuestro formulario para manejar la información de la pagina dde inicio -->
<header>
<span class="icon-menu"></span>
	<div id="cerrar">
	<a href="cerrar.php" ><li>Cerrar Sesión</li></a>
	</div>
	<nav id="navegacion">
		<ul>
		<img src="img/fotos/<?php print $datos[0]; ?>.jpg" id="logo" amen="Logo de EnRedes">
		<h2 class="amenu">Actualizar</h2>
		<a href="index.php"><li>Inicio</li></a>
		<a href=""><li>LeónXXXXXXX</li></a>
		<a href=""><li>Caballo</li></a>
		<a href=""><li>Cebra</li></a>
		<a href="cerrar.php"><li>Salir</li></a>			
		</ul>
	</nav>
</header>
<div id="contenedor">
<br><br><br><br><br><br><br>
<h1 align='center'>Bienvenido <?php print $dbnombre." ".$dbapellidos; ?></h1>
<br><br><br><br>

<!-- <h6 align='center'>Información importante</h6>
<?php 
	// for ($i=0; $i<count($datos); $i++) { 
			// print("<p align='center'><span class='icon-user-minus'></span> ".$datos[$i]."</p><br>");
	// }
 ?>
<br><br> -->
<form method="post" action="admin.php" id="pform" enctype="multipart/form-data">
<h3>Actualizar la sección "Equipo de trabajo"</h3>
<br>
<label for="titulo">Nombre del integrante</label>
<input type="text" name="titulo" id="titulo" value="<?php print($dbctitulo); ?>">

	<textarea id="pparrafo" name="contenido"><?php print($dbccontenido); ?>
	</textarea>
	<script type="text/javascript">
		$('#pform').ready(function() {
			CKEDITOR.replace( 'pparrafo' );
		});
  	</script>

<label for="file">Cargar imagen</label>
<input type="file" id="foto" name="foto">


<input type="submit" id="actualiza" name="pparrafo" value="actualizar">
	
</form>


</div>
<br><br><br>
</body>

</html>
<?php
}
 ?>
