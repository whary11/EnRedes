
<!-- Inicio de Sesión -->
<?php
  session_start();
// Validar formulario para inicio de sesión
  require_once("clases/conn.php");
  if(isset($_POST["iniciar_sesion"])) {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    // Crear conexión 
    $db = new connDb();
  // Consultar de id de usuario
    $data = $db->leeTabla("SELECT id_user FROM registro WHERE contrasena1='$clave' AND correo='$usuario'");
  //Iterar el arreglo 
    for ($i=0; $i <count($data) ; $i++) { 
      $id_user = $data[$i]->id_user;
    }
    //Verificar si el usuario existe
    if($db::buscaUsuario("registro",$usuario,$clave)){
      $_SESSION["id"]=$id_user;
      header("location: admin.php");
    }else{
      // print("No hay usuario.");
      header("location: index.php"); 
    }
    $db->close();
  }else{
    header('location: index.php');
  }
  if(isset($_SESSION["id"])) {
  	session_destroy();
    header("location: index.php");
  }else{
    header("location: index.php");
  }
// unset($db);
 ?>

<a href="index.php">Inicio</a>