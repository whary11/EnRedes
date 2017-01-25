<?php 
	if (isset($_POST['usuario_insert'])) {
		require_once("../../clases/conn.php");
		$db = new connDb();
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$telefono = $_POST["telefono"];
		$correo = $_POST["correo"];
		$clave1 = $_POST["clave1"];
		$clave2 = $_POST["clave2"];
		$data = $db->leeTabla("SELECT * FROM registro where correo='$correo'");
		if(count($data)>0){
			print("1111");
		}else{
			$db->abc("INSERT INTO `registro` (`id_user`, `nombre`, `apellido`, `telefono`, `correo`, `contrasena1`, `contrasena2`) VALUES (NULL, '$nombre', '$apellido', '$telefono', '$correo', '$clave1', '$clave2')");
			// print("Datos Registrados con éxito....");
		}
	}
 ?>