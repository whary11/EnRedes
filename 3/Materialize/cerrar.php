<?php 
session_start();
// Validamos si la sesión está iniciada, le preguntamos si una de las variables de sesión creadas en el admin.php está activa
if(isset($_SESSION["usuario"])){
// Si lo está ejecutamos la solicitud que ha hecho el usuario "Cerrar Sesión" y luego lo enviamos nuevamente al sistema de Inicio de Sesión
	session_destroy();
	header("location: index.php");
}else{
// Si la variable de sesión no está iniciada, ningún usuario podra ingresar a nuestra página creada unica y exclisivamente para destruir la sesión inciada.
	header("location: admin.php");
}
?>