<?php
    require("../modelo/Conect.php");
    require("../modelo/usuario.php");


    if(isset($_REQUEST['accion'])){
        $accion=$_REQUEST['accion']; 
    }
    
    switch ($accion) {
        case "Agregar":
            $objUsuario = new Usuario();
            
            $objUsuario->nombre_usuario = $_POST['nombre_usuario'];
            $objUsuario->contrasena = $_POST['contrasena'];
            $objUsuario->nombre = $_POST['nombre'];
            $objUsuario->rol = $_POST['rol'];
            $objUsuario->estado = $_POST['estado'];
            $objUsuario->institucion = $_POST['institucion'];
            
            $objUsuario->Agregar();
            
            break;
        case 'Mostrar':
            include("../vistas/usuarios/index.php");
            break;
        case 'Listar':
            $objUsuario = new Usuario();
            include("../vistas/usuarios/listar.php");
            break;
        case 'Cargar':   
            $objUsuario=new Usuario();
            $objUsuario->id = $_POST['id'];
            $objUsuario->Cargar();
            
            break;
        case 'Nuevo': case "Editar":
            
            break;
        case 'Modificar':
            
            break;
        case 'Eliminar':          
            $us=new Usuario();	
            $us->eliminar($_POST['idUsuario']);
            $us->Cargar();
            
            break;
        default:
        
            break;
    }
        
    
?>