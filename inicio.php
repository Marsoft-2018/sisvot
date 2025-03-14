<?php 
  session_start();
  if (!isset($_SESSION['id'])) {
    header("Location: /sisvot/index.php");
  }else{
    switch ($_SESSION['role']) {
      case 'Administrador':
        include("administrar.php");
        break;
      case 'Estudiante':
        include("vistas/votos/tarjetonPersoneros.php");
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