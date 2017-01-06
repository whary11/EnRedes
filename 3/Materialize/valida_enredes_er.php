
<?php

// sleep(1);
require_once("clases/conn.php");
  if (isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $db = new connDb();
    if ($db::buscaUsuario("registro",$usuario,$clave)) {
      print "correcto";
    }else{
      print "Incorrecto";
    }
  }
 ?>