<?php 
	require_once("../../clases/conn.php");
	if (isset($_POST["buscador"])) {
		$valor = $_POST["buscador"];
		$db = new connDb();
		$data = $db->leeTabla("SELECT * FROM registro WHERE nombre LIKE '%$valor%' or apellido LIKE '%$valor%' or telefono LIKE '%$valor%' or correo LIKE '%$valor%' ");
		if (count($data)>=1) {
			print('
						<div class="row">
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

			}else{
				print('<h2 align="center">No hemos encontrado Resultados.</h2>');
			}
		}else{
			header("location: buscador.php");
		}
 ?>