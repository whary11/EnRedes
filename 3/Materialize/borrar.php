<?php 
	if (isset($_GET["idborrar"])) {
		require_once("clases/conn.php");
		$db = new connDb();
		$id = $_GET["idborrar"];
		$data = $db->leeTabla("SELECT * FROM registro WHERE id_user = $id ");
		for ($i=0; $i <count($data) ; $i++) { 
			$datos = '<div class="container">
							<div class="grid-example col s12">
								<table class="centered bordered striped highlight responsive-table">
									<thead>
										<th>ID</th>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Teléfono</th>
										<th>Correo</th>
										<th>Clave1</th>
										<th>Clave2</th>
									</thead><tbody>
									<tr>	<td>'.$data[$i]->id_user.'</td>
							<td>'.$data[$i]->nombre.'</td>
							<td>'.$data[$i]->apellido.'</td>
							<td>'.$data[$i]->telefono.'</td>
							<td>'.$data[$i]->correo.'</td>
							<td>'.$data[$i]->contrasena1.'</td>
							<td>'.$data[$i]->contrasena2.'</td>
							</tr></tbody></table>
					
							</div>';
							$db->abc("DELETE FROM registro WHERE id_user = $id");
							header("location: admin.php");
		}
	}else if (isset($_GET["ideditar"])){
		require_once("clases/conn.php");
		$db = new connDb();
		$id = $_GET["ideditar"];
		$data = $db->leeTabla("SELECT * FROM registro WHERE id_user = $id ");
		for ($i=0; $i <count($data) ; $i++) { 
			$nombre = $data[$i]->nombre;
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar datos</title>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style type="text/css">
		#editar{
			width: 70%;
			margin:0px auto;
		}
	</style>
</head>
<body>	
    <form  id="editar" method="POST" action="borrar.php">
    	<h5 class="center-align">Datos a Actualizar</h5>


      	<input type="hidden" name="id" id="id" class="validate" value="<?php print($data[$i]->id_user); ?>" >
      	<!-- <label for="nombre">Id</label> -->

      <div class="input-field col s6">
      	<input type="text" name="nombre" id="nombre" class="validate" value="<?php print($data[$i]->nombre); ?>">
      	<label for="nombre">Nombre</label>
      </div>

      <div class="input-field col s6">
      	<input type="text" name="apellido" id="apellido" class="validate" value="<?php print($data[$i]->apellido); ?>">
      	<label for="apellido">Apellido</label>
      </div>

      <div class="input-field col s6">
      	<input type="text" name="telefono" id="telefono" class="validate" value="<?php print($data[$i]->telefono); ?>">
      	<label for="telefono">Teléfono</label>
      </div>


      <div class="input-field col s6">
      	<input type="email" name="correo" id="correo" class="validate" value="<?php print($data[$i]->correo); ?>">
      	<label for="correo">Correo</label>
      </div>
      	<input type="submit" class="btn" name="actualizar" value="Actualizar" id="crear" />
    </form>
</body>
</html>
<?php 
	}
	$db->close();
}else if(isset($_POST["actualizar"])&&isset($_POST["nombre"]) ){
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$telefono = $_POST["telefono"];
	$correo = $_POST["correo"];
	$id = $_POST["id"];

	require_once("clases/conn.php");
	$q = "UPDATE registro SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', correo = '$correo' WHERE registro. id_user = '$id';";
	$db = new connDb();
	$db->abc($q);
	$db->close();
	header("location: admin.php");
}

 ?>
