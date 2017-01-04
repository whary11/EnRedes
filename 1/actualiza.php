<?php 
session_start();
	require_once("includes/conectar.php");
	$bandera = false;
	$nota = "";
	if(isset($_POST["pparrafo"])){
		$id="";
		$tipo="pparrafo";
		$titulo = $_POST["titulo"];
		$contenido = $_POST["contenido"];
		$id_user= $_SESSION["id"];
		$foto = $id_user.".jpg";
		$q= "UPDATE contenidos SET id='[value-1]', tipo='[value-2]', titulo='[value-3]',contenido='[value-4]',imagen='[value-5]',id_user='[value-6]' WHERE id_user='$id_user'";
		if($titulo==""){
			$nota= "El titulo es requerido.";
			$bandera = false;
		}elseif($contenido=="") {
			$nota= "El Contenido es requerido.";
			$bandera = false;
		}elseif(is_uploaded_file($_FILES['foto']['tmp_name'])){
			copy($_FILES['foto']['tmp_name'], "img/fotos/$foto");
			$bandera = true;
		}
		if($bandera==true){
			mysqli_query($conectar, $q);	
			print($q.$id_user);
			header("location: index.php");
		}else{
			print("No está afinado tu código");
		}
}else{
	header("location: admin.php");
}
 ?>