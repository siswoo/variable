<?php
include('conexion.php');
$usuario = $_POST['usuario'];
$clave = md5($_POST["clave"]);
$pase = 0;

$sql1 = "SELECT * FROM usuarios WHERE usuario = '".$usuario."' and clave = '".$clave."' LIMIT 1";
$resultado1 = mysqli_query( $conexion, $sql1 );
$fila1 = mysqli_num_rows($resultado1);

if($fila1>=1){

	$datos = [

		"estatus" 	=> 'ok',

	];

}else{

	$datos = [

		"estatus" 	=> 'error',

	];

}

session_start();
$_SESSION["variable"] = 'conectado';
echo json_encode($datos);
?>