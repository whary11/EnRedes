<?php 
/**
* 

*/
class connDb{
	private $host = "localhost";
	private $usuario = "root";
	private $clave = "";
	private $db = "inicioenredes";
	private $conn;
// Crear la conexión desde la función constructora
	public function __construct(){
					$this->conn = mysqli_connect($this->host, $this->usuario, $this->clave, $this->db);
					if(mysqli_connect_error()){
						printf("Error en la conexion: %d",mysqli_connect_error());
						exit;
					} else {
						// print "Conexion exitosa<br>";	
					}
				}


	public function query($q){
				$data = array();
				if($q!=""){
					if($r=mysqli_query($this->conn, $q)){
						$data = mysqli_fetch_row($r);	
					}
				}
				return $data;
			}
// Función para leer cualquier tabla en la base de datos
	public function leeTabla($q){
				$data = array();
				if($q!=""){
					if($r=mysqli_query($this->conn, $q)){
						while($obj = mysqli_fetch_object($r)){
							array_push($data,$obj);
						}
					}
				}
				return $data;
			}
// función para buscar cualquier usuario siguiendo los parámetros exigidos
	public static function buscaUsuario($tabla,$usuario, $clave){
				$db = new connDb();
				$data = $db->query("SELECT * FROM $tabla WHERE correo='".$usuario."' AND contrasena1='".$clave."'");
				$db->close();
				unset($db);
				return isset($data[0]);
			}
			// función para cerrar cualquier base de datos que sea abierta
	public function close(){
				mysqli_close($this->conn);	
				// print "Se cerró la conexion de forma exitosa<br>";
			}
}
/*
Esta es la forma de imprimir los datos en pantalla
$db = new connDb();
$q="SELECT * FROM sucribirse WHERE id=35";
$data = $db->leeTabla($q);
// print count($data);
for ($i=0; $i <count($data); $i++) { 
	print("<p>".$data[$i]->correo."</p>");
}
ASLKDMlaknsdlkNA*/
/*Esta es la forma de verificar la existencia de algún registro específico en las tablas
$db = new connDb();
if ($db::buscaUsuario("sucribirse","whary11@hotmail.com","34")) {
	print("Si existe en sistema");
}else{
	print('No existe');
}*/
 ?>

