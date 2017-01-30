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
	<title>Administrador - EnRedes</title>
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
		#form_servi{
			/*background: red;*/
			width: 50%;
		}
	</style>
</head>
<body>
<nav>
	<ul id="nave" class="left">
		<li><a href="#form_servi" value="Crear usuario"><i class="material-icons right agregar">add</i>Agregar Servicios</a></li>
		<li><a href="#usuarios" value="Crear servicio"><i class="material-icons right agregar">add</i>Agregar Usuarios</a></li>
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
							<td><a href="procesadores/borrar.php?ideditar='.$data[$i]->id_user.'">Actualizar</a></td>
							<td><a href="procesadores/borrar.php?idborrar='.$data[$i]->id_user.'">Borrar</a></td>
							</tr>');
			}
			print('</tbody></table>
								<br>
							</div>						
							<p style="text-align:center;">Se han encontrado '.count($data).' resultados</p></div>');
			$db->close();
		}
 ?>
</div>
<!-- Insertar usuarios -->
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
<!-- Formulario para insertar productos -->
<div class="modal" id="form_servi">
	<div class="row modal-content">
		<form style=" width: 100%;margin: 0px auto; padding: 20px;border-radius: 5px;">
			<p style="text-align: center"><a target="_blank" href="https://material.io/icons/#ic_3d_rotation">Ten en cuenta esta lista para tu icono personalizado.</a></p>
		  	<div class="input-field col s12" id="icono-servi">
		      <input id="icono-servi1" type="text" class="validate" autofocus>
		      <label for="icono-servi1" data-error="wrong">Escribe el nombre del icono acá:</label><i style="font-size: 20px; color: teal;" class="material-icons"></i>
		    </div>
		    <div class="input-field col s12">
		      <input id="color" type="text" class="validate" >
		      <label for="color" data-error="wrong" data-success="Vamos bien">Color</label>
		      <div style="height:10px;width:100px;border-radius:5px;transition:2s;" id="colorError"></div>
		    </div>
		    <div class="input-field col s12">
		      <input id="nservicio" type="text" class="validate" >
		      <label for="nservicio" data-error="wrong" data-success="Vamos bien">Nombre del servicio</label>
		    </div>
		    <div class="input-field col s12">
		      <input id="descripcion" type="text" class="materialize-textarea" >
		      <label for="descripcion" data-error="wrong" data-success="Vamos bien">Descripción</label>
		    </div>
		    <p align="center">Etiquetas de servicio (Sólo selecciona 5 opciones.)</p>
			<?php 
for ($i=1; $i < 6; $i++) { 
	print('<div class="input-field col s12">
		    <select id="etiqueta'.$i.'">
		      <option value="" disabled selected>Etiqueta # '.$i.'</option>
		      <option value="Diseño">Diseño</option>
		      <option value="Desarrollo">Desarrollo</option>
		      <option value="Funcionalidad">Funcionalidad</option>
		      <option value="Confianza">Confianza</option>
		      <option value="Clientes">Clientes</option>
		      <option value="Satisfacción">Satisfacción</option>
		      <option value="Posicionamiento">Posicionamiento</option>
		      <option value="Buen servicio">Buen servicio</option>
		    </select>
		    <label>Selecciona la etiqueta # '.$i.'</label>
	  	</div>');
}
?>
			<input type="submit" name="envio_servicios" value="Enviar" class="btn">
			<div id="notificaciones"></div>
	</form>
	</div>
</div>

<div id="editar_servicio" style="text-align: center">
	<p id="EdicionServi" style="cursor: pointer; color:#2196f3;">Mostrar Servicios</p>
	<div id="serviciosDesple">
		<?php 
			$db = new connDb();
		$data = $db->leeTabla("SELECT * FROM servicios");
		if (count($data)>=1) {
			print('<div class="row">
							<div class="col s12">
								<table class="centered bordered striped highlight responsive-table">
									<thead>
										<th>Icono</th>
										<th>Color</th>
										<th>Nombre Servi</th>
										<th>Descripción</th>
										<th>Etiqueta 1</th>
										<th>Etiqueta 2</th>
										<th>Etiqueta 3</th>
										<th>Etiqueta 4</th>
										<th>Etiqueta 5</th>
									</thead><tbody>
									');
			for ($i=0; $i < count($data); $i++) { 
				print('<tr>	<td>'.$data[$i]->icono.'</td>
							<td>'.$data[$i]->color.'</td>
							<td>'.$data[$i]->nombre_servicio.'</td>
							<td><a href="procesadores/editar_servi.php?id='.$data[$i]->id.'" alt="Los servicios">'.$data[$i]->descripcion.'<a/></td>
							<td>'.$data[$i]->etiqueta1.'</td>
							<td>'.$data[$i]->etiqueta2.'</td>
							<td>'.$data[$i]->etiqueta3.'</td>
							<td>'.$data[$i]->etiqueta4.'</td>
							<td>'.$data[$i]->etiqueta5.'</td>
							</tr>');
			}
			print('</tbody></table>
								<br>
							</div>						
							<p style="text-align:center;">Se han encontrado '.count($data).' resultados</p></div>');
			$db->close();
		}
		 ?>
	</div>
</div>


<script type="text/javascript">
			$(document).ready(function(){
				$('.modal').modal();
				$('select').material_select();
			});	
	</script>
</body>
</html>