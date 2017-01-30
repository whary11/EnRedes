<?php 
	session_start();
	if(isset($_SESSION["usuario"]) && isset($_GET["id"])) {
		require_once("../../clases/conn.php");
		$id = $_GET["id"];
		$db = new connDb();
		// print $id;
		$data = $db->leeTabla("SELECT * FROM servicios WHERE id ='$id'");
		for ($i=0; $i <count($data); $i++) { 
			$icono = $data[$i]->icono;
			$color = $data[$i]->color;
			$servicio = $data[$i]->nombre_servicio;
			$descripcion = $data[$i]->descripcion;
			$etiqueta1 = $data[$i]->etiqueta1;
			$etiqueta2 = $data[$i]->etiqueta2;
			$etiqueta3 = $data[$i]->etiqueta3;
			$etiqueta4 = $data[$i]->etiqueta4;
			$etiqueta5 = $data[$i]->etiqueta5;
		}
	}else{
		header("location: ../index.php");
	} 
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Servicios - EnRedes</title>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/materialize.css">
	<script type="text/javascript" src="../../js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<!-- Formulario para insertar productos -->
	<div class="row modal-content">
	<form style=" width: 100%;margin: 0px auto; padding: 20px;border-radius: 5px;">
		<p style="text-align: center"><a target="_blank" href="https://material.io/icons/#ic_3d_rotation">Ten en cuenta esta lista para tu icono personalizado.</a></p>
	  	<div class="input-field col s12" id="icono-servi">
	      <input id="icono-servi1" type="text" class="validate" value="<?php print($icono); ?>" autofocus>
	      <label for="icono-servi1" data-error="wrong">Escribe el nombre del icono acá:</label><i style="font-size: 20px; color: teal;" class="material-icons"></i>
	    </div>
	    <div class="input-field col s12">
	      <input id="color" type="text" class="validate" value="<?php print($color); ?>">
	      <label for="color" data-error="wrong" data-success="Vamos bien">Color</label>
	      <div style="height:10px;width:100px;border-radius:5px;transition:2s;" id="colorError"></div>
	    </div>
	    <div class="input-field col s12">
	      <input id="nservicio" type="text" class="validate" value="<?php print($servicio); ?>">
	      <label for="nservicio" data-error="wrong" data-success="Vamos bien">Nombre del servicio</label>
	    </div>
	    <div class="input-field col s12">
	      <input id="descripcion" type="text" class="materialize-textarea" value="<?php print($descripcion); ?>">
	      <label for="descripcion" data-error="wrong" data-success="Vamos bien">Descripción</label>
	    </div>
	    <p align="center">Etiquetas de servicio (Sólo selecciona 5 opciones.)</p>
	

	<div class="input-field col s12">
	    <select id="">
	      <option value="<?php print($etiqueta1); ?>" disabled selected><?php print($etiqueta1); ?></option>
	      <option value="Diseño">Diseño</option>
	      <option value="Desarrollo">Desarrollo</option>
	      <option value="Funcionalidad">Funcionalidad</option>
	      <option value="Confianza">Confianza</option>
	      <option value="Clientes">Clientes</option>
	      <option value="Satisfacción">Satisfacción</option>
	      <option value="Posicionamiento">Posicionamiento</option>
	      <option value="Buen servicio">Buen servicio</option>
	    </select>
	    <label>Selecciona la etiqueta # 1</label>
		</div>

		<div class="input-field col s12">
	    <select>
	      <option value="<?php print($etiqueta2); ?>" disabled selected><?php print($etiqueta2); ?></option>
	      <option value="Diseño">Diseño</option>
	      <option value="Desarrollo">Desarrollo</option>
	      <option value="Funcionalidad">Funcionalidad</option>
	      <option value="Confianza">Confianza</option>
	      <option value="Clientes">Clientes</option>
	      <option value="Satisfacción">Satisfacción</option>
	      <option value="Posicionamiento">Posicionamiento</option>
	      <option value="Buen servicio">Buen servicio</option>
	    </select>
	    <label>Selecciona la etiqueta # 2</labe>
		</div>

		<div class="input-field col s12">
	    <select id="etiqueta'.$i.'">
	      <option value="<?php print($etiqueta3); ?>" disabled selected><?php print($etiqueta3); ?></option>
	      <option value="Diseño">Diseño</option>
	      <option value="Desarrollo">Desarrollo</option>
	      <option value="Funcionalidad">Funcionalidad</option>
	      <option value="Confianza">Confianza</option>
	      <option value="Clientes">Clientes</option>
	      <option value="Satisfacción">Satisfacción</option>
	      <option value="Posicionamiento">Posicionamiento</option>
	      <option value="Buen servicio">Buen servicio</option>
	    </select>
	    <label>Selecciona la etiqueta # 3</labe>
		</div>

		<div class="input-field col s12">
	    <select id="etiqueta'.$i.'">
	      <option value="<?php print($etiqueta4); ?>" disabled selected><?php print($etiqueta4); ?></option>
	      <option value="Diseño">Diseño</option>
	      <option value="Desarrollo">Desarrollo</option>
	      <option value="Funcionalidad">Funcionalidad</option>
	      <option value="Confianza">Confianza</option>
	      <option value="Clientes">Clientes</option>
	      <option value="Satisfacción">Satisfacción</option>
	      <option value="Posicionamiento">Posicionamiento</option>
	      <option value="Buen servicio">Buen servicio</option>
	    </select>
	    <label>Selecciona la etiqueta # 4</labe>
		</div>

		<div class="input-field col s12">
	    <select id="etiqueta'.$i.'">
	      <option value="<?php print($etiqueta5);?>" disabled selected><?php print($etiqueta5);?></option>
	      <option value="Diseño">Diseño</option>
	      <option value="Desarrollo">Desarrollo</option>
	      <option value="Funcionalidad">Funcionalidad</option>
	      <option value="Confianza">Confianza</option>
	      <option value="Clientes">Clientes</option>
	      <option value="Satisfacción">Satisfacción</option>
	      <option value="Posicionamiento">Posicionamiento</option>
	      <option value="Buen servicio">Buen servicio</option>
	    </select>
	    <label>Selecciona la etiqueta # 5</labe>
		</div>

		<input type="submit" class="btn" name="" value="Actualizar">
		</form>
	<script type="text/javascript">
		$(document).ready(function() {
	    	$('select').material_select();    	
		//Cargar color e icono de muestra
		$('#icono-servi').keyup(function() {
			$('#icono-servi i').text($('#icono-servi1').val());
		});
		$('#color').keyup(function() {
			$('#colorError').css({
				'background': $('#color').val()
			});
		});
		$('#icono-servi i').text($('#icono-servi1').val());
		$('#colorError').css({
				'background': $('#color').val()
			});
		});
	</script>
</body>
</html>

