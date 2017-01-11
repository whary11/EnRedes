
<?php

// sleep(1);
require_once("clases/conn.php");
  if (isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $db = new connDb();
if($db::buscaUsuario("registro",$usuario,$clave)){
      session_start();
      $_SESSION["usuario"] = $usuario;
      print "1234567890";
      //header("location: admin.php");
    }else{
      print "1234";
      // header("location: index.php");
    }
  }
 ?>