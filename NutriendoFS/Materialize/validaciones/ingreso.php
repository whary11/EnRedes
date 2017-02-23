<?php 
	require_once('../clases/conn.php');
	// sleep(100);
	if (isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $db = new connDb();
	if($db::buscaUsuario("login",$usuario,$clave)){
		$id;
      session_start();
      $_SESSION["usuario"] = $usuario;
      print "123";
    }else{
      print "1234";
    }
  }
 ?>