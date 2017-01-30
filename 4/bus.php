<?php 
	require_once "clases/conn.php";
	if (isset($_POST['valor'])) {
		$valor = $_POST['valor'];

		$q = "SELECT * FROM registro WHERE nombre LIKE '%$valor%' or correo LIKE '%$valor%' or apellido LIKE '%$valor%'";
		$db = new connDb();
		$data = $db->leeTabla($q);
		if (count($data)>=1){
			for ($i=0; $i<count($data); $i++) { 
				print '<div class="col 64 m4 offset-m2 l3 offset-l3">
			        <div class="card-panel grey lighten-5 z-depth-1">
			          <div class="row valign-wrapper">
			            <div class="col s2">
			              <img src="img/IMG_20161030_175743.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
			            </div>
			            <div class="col s10">
			            <strong align="center"><p>Datos de los usuarios</p></strong>
			            <span class="black-text">
			                Nombre completos: '.$data[$i]->nombre." ".$data[$i]->apellido.'
			              </span>
			              <br>
			              <span class="black-text">
			                Correo electrónico: '.$data[$i]->correo.'
			              </span>
			              <br>
			              <span class="black-text">
			                Teléfono de contacto: '.$data[$i]->telefono.'
			              </span>
			            </div>
			    </div>
			    </div>
			    </div>' ;
			}
		}else{
			print "<p class='nada'>Hay Usuarios registrados.</p>";
		}
	}else{
		header("location: index.php");
	}
 ?>