<?php 
  session_start();
  if (!isset($_SESSION['idUsuario'])) {
    header("Location: /sisvot/index.php");
  }else{
    switch ($_SESSION['rol']) {
      case 'Administrador':
        include("administrar.php");
        break;
      case 'Estudiante':
        include("tarjeton.php");
        break;
      case 'Jurado':
        include("vistas/jurados.php");
        break;
      default:
        include("No_auto.php");
        break;
    }
  }
 ?>