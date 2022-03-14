<?php 
	session_start();

	require_once ("../modelo/Conect.php");
	require_once ('../modelo/usuario.php');

	$usuario = $_POST['usuario'];
	$password = $_POST['contrasena'];

	// $usuario = $_GET['usuario'];
	// $password = $_GET['contrasena'];
 	
 	// echo "Datos: ".$usuario." - ".$password;
	$objUsu = new Usuario();
	$objUsu->nombre_usuario = $usuario;
	$objUsu->contrasena = $password;
	echo json_encode($objUsu->login());

?>