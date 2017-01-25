<?php 
	if (isset($_POST["color"]) && isset($_POST["nservicio"]) && isset($_POST["descripcion"]) && isset($_POST["etiqueta1"]) && isset($_POST["etiqueta2"]) && isset($_POST["etiqueta3"]) && isset($_POST["etiqueta4"]) && isset($_POST["etiqueta5"]) && $_POST["descripcion"]!="") {
		$icono = $_POST["icono"];
		$color = $_POST["color"];
		$nservicio = utf8_decode($_POST["nservicio"]);
		$descripcion = utf8_decode($_POST["descripcion"]);
		$etiqueta1 = utf8_decode($_POST["etiqueta1"]);
		$etiqueta2 = utf8_decode($_POST["etiqueta2"]);
		$etiqueta3 = utf8_decode($_POST["etiqueta3"]);
		$etiqueta4 = utf8_decode($_POST["etiqueta4"]);
		$etiqueta5 = utf8_decode($_POST["etiqueta5"]);
		require_once("../../clases/conn.php");
		$db = new connDb();
		$db->abc("INSERT INTO `servicios` (`id`, `icono`, `color`, `nombre_servicio`, `descripcion`, `etiqueta1`, `etiqueta2`, `etiqueta3`, `etiqueta4`, `etiqueta5`) VALUES (NULL, '$icono', '$color', '$nservicio', '$descripcion', '$etiqueta1', '$etiqueta2', '$etiqueta3', '$etiqueta4', '$etiqueta5')");
		$db->close();
		print("Datos ingresados con exito.");
	}else{
		header("location: ../admin.php");
	}
 ?>