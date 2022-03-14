<?PHP
	 include ("conexion.php");
	 
	 
	 $Candidato = $_POST["idcandidato"];
	 $votante = $_POST["idest"];
	 $busqueda;
	 //echo "la variable codest= ".$votante;
	 
	if (isset($votante)){
	 	$consulta = mysql_query("SELECT * FROM alumnos Where CODEST='".$votante."' AND EST='No ha votado'",$conexion);	 
	 	$busqueda = mysql_num_rows($consulta);
	}
	 
	 if (isset($Candidato)){
	 	$datos_cand = mysql_query("select * from candidatos where id = $Candidato");
	 		
	 		if ($busqueda>0){
	 			while ($reg=mysql_fetch_array($datos_cand)){
	 			 	  $voto_OK = mysql_query("INSERT INTO registrovotos VALUES('".$reg[0]."','".date("Y")."');");
	 					$votoest_ok=mysql_query("Update alumnos SET EST='Ya Voto' Where CODEST='".$votante."';",$conexion);
	 					echo "<img src='IMG/edit21.png' width='110' height='129' />";
	 			}
	 		}else{
	 			echo "<img src='img/negado.png' width='110' height='129' />";
	 		}
	 }	
?>
