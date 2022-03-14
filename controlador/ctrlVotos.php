<?php
    require("../modelo/Conect.php");
    require("../modelo/alumnos.php");
    require("../modelo/candidato.php");
    require("../modelo/voto.php");

    if(isset($_POST['accion'])){
        $accion=$_POST['accion']; 
    }

    switch ($accion) {
    	case 'RegistrarVoto':
    	    
    		$objVoto = new Voto();
    		$objVoto->candidato = $_POST['idcandidato'];
    		$objVoto->codEstudiante = $_POST['idest'];
    		$objVoto->agregar();
    		break;
    	case 'contar':
    	    
            $objCandidato = new Candidato();
            include("../vistas/votos/conteo.php");
            break;
        case 'Abstencion':
            
            $objConteo = new Voto();
            include("../vistas/votos/abstencion.php");
            break;
        case 'Participacion':
            
            $objConteo = new Alumno();
            include("../vistas/votos/participacion.php");
            break;
        case "controlVotacion":
            $estado = "No ha votado";
            if($_POST['estado'] == 2){
                $estado = "Inactivo";
            }
    		$objVoto = new Voto();
    		$objVoto->estado = $estado;
    		$objVoto->toggleVotacion();
            
            break;
    } 
