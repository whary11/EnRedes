<?php 
session_start();
if(isset($_SESSION["id"])) {
		$id = $_SESSION["id"];
	}else{
		header("location: index.php");
		} ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Área del administrador</title>
</head>
<body>
	<h1>Bienvenido usuario con id <?php print($id);?>
 </h1>
</body>
</html>