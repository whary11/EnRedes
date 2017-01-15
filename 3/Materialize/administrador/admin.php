<?php 
	session_start();

	if(isset($_SESSION["usuario"])) {
		require_once("../clases/conn.php");
		$id = $_SESSION["usuario"];
		$db = new connDb();
		// print $id;
		$data = $db->leeTabla("SELECT * FROM registro WHERE correo ='$id'");
		for ($i=0; $i <count($data); $i++) { 
			$nombre = $data[$i]->nombre;
		}
	}else{
		header("location: ../index.php");
	} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Administrador</title>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<script type="text/javascript" src="../js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="../js/buscador.js"></script>
	<style type="text/css">
		#buscar{
			/*background: red*/
			width:40%;
			margin: 10px auto;
		}
		#nave .agregar{
			font-size: 40px;
			color: white;
		}				
		.modal{
			height:80%;
			/*width: 100%*/
		}
		#form_add{
			width:100%;
			margin: 0px auto;
		}
		#usuarios{
			width:50%;
			margin: 10px auto;
		}
		#error_form_admin{
			color: red;
		}
		nav{
			margin-top:0px;
			position: fixed;
		}
		#espacio{
			height:100px;
		}
		nav{
			z-index: 1000;
		}
	</style>
</head>
<body>
<nav>
	<ul id="nave" class="left">
		<li><a href="#"><i class="material-icons right">mode_edit</i></a></li>
		<li><a href="#"><i class="material-icons right">mode_edit</i></a></li>
		<li><a href="#usuarios" value="Crear usuario"><i class="material-icons right agregar">add</i></a></li>
	</ul>
	<ul class="right">
		<li><a href="../cerrar.php">Cerrar Sesión</a></li>
	</ul>
</nav>
<div id="espacio">
</div>

<h3 align="center">Bienvenido <?php print($nombre)?></h3>
<form id="buscar">
	<div class="input-field col s6">	
		<label for="buscador">Bucar aquí</label>
		<input type="text" name="buscador" id="buscador" autofocus>
	</div>
</form>


<div id="resultado">
<?php
		$db = new connDb();
		$data = $db->leeTabla("SELECT * FROM registro");
		if (count($data)>=1) {
			print('<div class="row">
							<div class="col s12">
								<table class="centered bordered striped highlight responsive-table">
									<thead>
										<th>ID</th>
										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Teléfono</th>
										<th>Correo</th>
										<th>Clave1</th>
										<th>Clave2</th>
										<th>Editar</th>
										<th>Eliminar</th>
									</thead><tbody>
									');
			for ($i=0; $i < count($data); $i++) { 
				print('<tr>	<td>'.$data[$i]->id_user.'</td>
							<td>'.$data[$i]->nombre.'</td>
							<td>'.$data[$i]->apellido.'</td>
							<td>'.$data[$i]->telefono.'</td>
							<td>'.$data[$i]->correo.'</td>
							<td>'.$data[$i]->contrasena1.'</td>
							<td>'.$data[$i]->contrasena2.'</td>
							<td><a href="../borrar.php?ideditar='.$data[$i]->id_user.'">Actualizar</a></td>
							<td><a href="../borrar.php?idborrar='.$data[$i]->id_user.'">Borrar</a></td>
							</tr>');
			}
			print('</tbody></table>
						

							</div>
							<p>Se han encontrado '.count($data).' resultados</p></div>');
			$db->close();
		}
 ?>
</div>
<!-- Insertar usuarios -->

<!--  -->
<!--  -->

<div id="usuarios" class="modal modal_admin">
  <div class="modal-content">
    <form  id="form_add" method="POST">
    	<h5 class="center-align">Datos de usuario nuevo</h5>

      <div class="input-field col s6">
      	<input type="text" name="nombre" id="nombre" class="validate">
      	<label for="nombre">Nombre</label>
      </div>

      <div class="input-field col s6">
      	<input type="text" name="apellido" id="apellido" class="validate">
      	<label for="apellido">Apellido</label>
      </div>

      <div class="input-field col s6">
      	<input type="text" name="telefono" id="telefono" class="validate">
      	<label for="telefono">Teléfono</label>
      </div>


      <div class="input-field col s6">
      	<input type="email" name="correo" id="correo" class="validate">
      	<label for="correo">Correo</label>
      </div>

      <div class="input-field col s6">
      	<input type="password" name="clave1" id="clave1" class="validate">
      	<label for="clave1">Contraseña</label>
      </div>

      <div class="input-field col s6">
      	<input type="password" name="clave2" id="clave2" class="validate">
      	<label for="clave2">Repetir contraseña</label>
      </div>
      	<input type="submit" class="btn" name="usuario_insert" value="Crear" id="crear" />
    </form>
  </div>
  <p id="error_form_admin" align="center"></p>
</div>

<h5 align="center">Ejemplo de tarjeta para servicios.</h5>
<br>

<dir class="row">
	<div class="col s6 offset-s3">
	    <p style="font-size: 30px" class="header centered">Matenimiento de su web</p>
	    <div class="card horizontal">
	      <div class="card-image">
	        <img src="http://lorempixel.com/100/190/nature/6">
	      </div>
	      <div class="card-stacked">
	        <div class="card-content">
	          <p>Tenemos todo para modenizar su pagina web y que lusca como usted lo desea.</p>
	        </div>
	        <div class="card-action">
	          <a href="#">Mas información</a>
	        </div>
	      </div>
	    </div>
	  </div>
</dir>
<script type="text/javascript">
			$(document).ready(function(){
				$('.modal').modal();
			});	
	</script>
</body>
</html>