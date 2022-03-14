<?php
    require("../modelo/Conect.php");
    require("../modelo/alumnos.php");
    if(isset($_POST['accion'])){
        $accion=$_POST['accion']; 
        
        if($accion=='cargar'){    

            include("../vistas/estudiantes.php");

        }elseif($accion == 'Eliminar'){   
            $alu = new Alumno();	
            $alu->CODEST = $_POST['codEst'];            
            $alu->eliminar();
            
        }elseif($accion=='Agregar'){ 
                
            $alu = new Alumno();	
            $alu->CODEST = $_POST['codEst'];
            $alu->GRADO = $_POST['grado'];
            $alu->GRUPO = $_POST['grupo'];
            $alu->APELLIDO1 = $_POST['apellido1'];
            $alu->APELLIDO2 = $_POST['apellido2'];
            $alu->NOMBRE1 = $_POST['nombre1'];
            $alu->NOMBRE2 = $_POST['nombre2'];
            $alu->SEXO = $_POST['sexo'];
            $alu->agregar();

        }elseif( $accion == "ventanaNuevo" || $accion == "ventanaEditar"){
            include("../vistas/formulario_estudiante.php");
           
        }
    }else{
        echo "No se recibe una accion para ejecutar";
        $accion='nada';
    }

    
?>