<?PHP
	 include ("conexion.php");
	 
	 
	 $usuario=$_GET["usu"];
	 $codigo=$_GET["ident"];
	 //$codigo="S180116";
	 $busquedaE;
	 $busquedaUS;
	 
	// echo "las variables recibisdas son: Usuario: $usuario, Contraseña: $codigo <br>";
	 
	if (isset($codigo)){
	 	$consulta=Mysql_query("SELECT * FROM alumnos Where CODEST='".$codigo."' AND EST='No ha votado'",$conexion);	 
	 	$busquedaE=Mysql_num_rows($consulta);
			if ($busquedaE>0){
				echo "tarjeton.php";
	 		}else{
	 			$consulta2=Mysql_query("SELECT ROL FROM usuarios WHERE idUsuario='".$usuario."' AND contrasena='".$codigo."' AND ESTADO='Activo'",$conexion);	 
	 			$busquedaUS=Mysql_num_rows($consulta2);
	 			if ($busquedaUS>0){
	 				while($reg=Mysql_fetch_array($consulta2)){
	 					if ($reg[0]=="JURADO"){
	 						echo "Jurados.php";	 						
	 						//echo "Tarjeton.php";
	 					}else if($reg[0]=="ADMINISTRADOR"){
	 						echo "Administrar.php";
	 					}
	 				}
	 			}else{
	 				echo "No_auto.php";	 				
	 			}	 			
	 		}
	 }	
?>
