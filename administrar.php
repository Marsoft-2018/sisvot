<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SISVOT</title>
        <link rel='stylesheet' href='css/estilos.css' type='text/css'>
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/resultados_votacion.css">
        <!--<link rel="stylesheet" href="css/bootstrap.min.css" />-->
        <link rel="stylesheet" href="css/sweetalert2.css">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>

    <?php
        $Usuario_reg = $_SESSION['idUsuario'];
        
    ?>	
    <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"  style="background-color: #00005B;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src='IMG/Sisvot_P2.png'>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Inicio</a>
            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-macos mx-0 border-0 shadow" style="width: 220px;">
                <li><a class="dropdown-item" href="#" onclick='mostrar_usuarios()'>Usuarios</a></li>
                <li><a class="dropdown-item" href="#" onclick='administrar(this.id)' id='Candidatos'>Candidatos</a></li>
                <li><a class="dropdown-item" href="#" onclick='administrar(this.id)' id='Alumnos'>Alumnos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#" onclick='salir()' >Salir</a></li>
             </ul>
         </li>
        <li class="nav-item"><a href="#" class="nav-link">Administrar</a>
            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-macos mx-0 border-0 shadow" style="width: 220px;">
                <li><a class="dropdown-item" href="#"  onclick='controlVotacion(1)'>Iniciar Votación</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#" onclick='controlVotacion(2)'>Cerrar Votación</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="#" class="nav-link">Reportes</a>
            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-macos mx-0 border-0 shadow" style="width: 220px;">
                <li><a class="dropdown-item" href="#" onclick='contarVotos(1)' id='conteo'>Conteo de Votos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#" onclick='contarVotos(2)' id='Abstencionismo'>Abstencionismo</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="#" class="nav-link" onclick="alerta()">Acerca de</a></li>
      </ul>
      <div class='usuario'>Usuario: <?php echo $_SESSION['nombre'] ?>&nbsp;&nbsp;&nbsp;<a href='index.php'>(Salir)</a></div>
    </header>
  </div>


    <div class='principal' id='principal'>
        <div id="container">
            <div style="" id="girando"><h1>BIENVENIDO</h1></div>
        </div>
    </div>
    <span id='resultadoUsuario'></span>
    <script src="js/sweetalert2.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type='text/javascript' src='js/rfuncioness.js'></script>
    <script src="js/usuarios.js"></script>
    <script type="text/javascript">
        
        function alerta(){
            swal({
              title: ' ',
                html:   '<div style="text-align:left;font-size:1.5em;line-height: 3em;padding:10px;">'+
                        'Autor:<br>Ing. Jose Alfredo Tapia Arroyo.<br>' +
                        '</div>',
              imageUrl: 'IMG/Sisvot_P.png',
              imageWidth: 400,
              imageHeight: 200,
              animation: true
            })
        }
        
        function ventanaEditar(){
            swal({
              title: 'Edición',
                html: '<br>' +
                        '<div style="text-align:left;font-size:14px;line-height: 3em;padding:10px;">'+
                        '<label>Nombre:<input type="text" placeholder="Nombre" value="" class="form form-control"/></label></br>' +
                        '<label>Contraseña:<input type="text" placeholder="Contraseña" id="Contrasena" value="" onchange="prueba(this.id)" class="form form-control"/></label></br>' +
                        '</div>',
              imageUrl: 'IMG/Sisvot_P.png',
              imageWidth: 400,
              imageHeight: 200,
              animation: true
            })
        }
        
        function ventanaNuevo(tabla){
            
            swal({
              title: "Nuevo Registro de "+tabla,
              html: '<br>' +
                        '<div style="text-align:left;font-size:14px;line-height: 3em;padding:10px;width:95%;">'+
                        '<label>Nombres y Apellidos:</label><input type="text" placeholder="Nombre" id="nombreC" value="" class="form form-control ancho" /></br>' +
                        '<label>Usuario:</label><input type="text" placeholder="Nombre Usuario" value="" class="form form-control ancho" title="Este será el id de usuario con el cual  podrá ingresar al sistema" id="idUsuario"/></br>' +
                        '<label>Contraseña:</label><input type="password" placeholder="Contraseña" id="Contrasena" value="" onchange="prueba(this.id)" class="form form-control ancho"/></br>' +                
                        '<label>Rol:'+
                            '<select class="form form-control" name="rol" id="rol" required>'+
                                '<option value="">Seleccione..</option>'+
                                '<option value="ADMINISTRADOR">Administrador</option>'+
                                '<option value="JURADO">Jurado</option>'+
                            '</select></label></br>' +
                        '</div>',
              imageUrl: 'IMG/Sisvot_P.png',
              imageWidth: 400,
              imageHeight: 200,
              animation: true,
              showCloseButton: true,
              showCancelButton: true, 
              confirmButtonColor: "#216F21",
              cancelButtonColor: "#DD6B55",
              confirmButtonText: "Listo",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false,
              closeOnCancel: false
            }).then(function () {
                   agregarUsuario();
            }, function (dismiss) {
              
            });
                
        }
        
        function ventanaNuevoAlumno(){            
            var accion = "ventanaNuevo";
            ventanaModal();
            $("#datosModal").load("controlador/ctrlAlumnos.php",{accion:accion});
                
        }

        function ventanaEditarAlumno(cod){            
            var accion = "ventanaEditar";
            ventanaModal();
            $("#datosModal").load("controlador/ctrlAlumnos.php",{accion:accion,codigo:cod});                
        }
        
        
        function ventanaModal(){            
            swal({
              title: "Datos del Estudiante",
              html: '<div id="datosModal"></div>',
              imageUrl: 'IMG/Sisvot_P.png',
              imageWidth: 400,
              imageHeight: 200,
              animation: true,
              showCloseButton: true,
              showCancelButton: false, 
              showConfirmButton: false,
              confirmButtonColor: "#216F21",
              cancelButtonColor: "#DD6B55",
              confirmButtonText: "Listo",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false,
              closeOnCancel: false
            }).then(function () {
                   agregarAlumno();
            }, function (dismiss) {
              
            });               
        }

        function agregarUsuario(){
            document.getElementById("principal").innerHTML="";
            document.getElementById("resultadoUsuario").innerHTML="";
            var nombreC = document.getElementById("nombreC").value;
            var idUsuario = document.getElementById("idUsuario").value;
            var Contrasena = document.getElementById("Contrasena").value;
            var rol = document.getElementById("rol").value;
            $("#principal").load("controlador/ctrlUsuarios.php",{accion:"Agregar",idUsuario:idUsuario,contrasena:Contrasena,nombreC:nombreC,rol:rol,estado:"Activo",institucion:"1"},function(){
                swal({title:"¡Hecho!",
                    text:'El Usuario '+idUsuario+' se creó con éxito en la tabla: ',
                    timer: 2000,     
                    type:'success'},function(){                        
                });
            }); 
        }
        
        function agregarAlumno(){
            document.getElementById("principal").innerHTML="";
            document.getElementById("resultadoUsuario").innerHTML="";
            var codEst = document.getElementById("codEst").value;
            var nombre1 = document.getElementById("nombre1").value;
            var nombre2 = document.getElementById("nombre2").value;
            var apellido1 = document.getElementById("apellido1").value;
            var apellido2 = document.getElementById("apellido2").value;
            var grado = document.getElementById("grado").value;
            var grupo = document.getElementById("grupo").value;
            var sexo = document.getElementById("sexo").value;
            
            $("#principal").load("controlador/ctrlAlumnos.php",{accion:"Agregar",codEst:codEst,nombre1:nombre1,nombre2:nombre2,apellido1:apellido1,apellido2:apellido2,grado:grado,grupo:grupo,sexo:sexo,estado:"No ha votado",institucion:"1"},function(){
                swal({title:"¡Hecho!",
                    text:'El estudiante fue guardado con éxito',
                    timer: 2000,     
                    type:'success'},function(){                        
                });
            }); 
        }
        
        function eliminarUsu(cod){
            document.getElementById("principal").innerHTML="";
            document.getElementById("resultadoUsuario").innerHTML="";
            var accion="Eliminar";
            swal({ 
            title: "CONFIRMACION",
            text: "¿Está seguro de eliminar este Usuario?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#216F21",
            cancelButtonColor: "#DD6B55",
            confirmButtonText: "SI",
            cancelButtonText: "NO", 
            closeOnConfirm: false,
            closeOnCancel: false }).then(function () {  
                
                $("#principal").load("controlador/ctrlUsuarios.php",{accion:accion,idUsuario:cod},function(){
                    swal({title:"¡Hecho!",
                        text:'El Usuario ha sido Eliminado',
                        timer: 2000,     
                        type:'success'},function(){                        
                    });
                }); 
            }, function (dismiss) {
              $("#principal").load("controlador/ctrlUsuarios.php",{accion:"cargar"});
            });
        }
        
        function eliminarAlumno(cod){            
            var accion="Eliminar";
            swal({ 
            title: "CONFIRMACION",
            text: "¿Está seguro de eliminar este Estudiante?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#216F21",
            cancelButtonColor: "#DD6B55",
            confirmButtonText: "SI",
            cancelButtonText: "NO", 
            closeOnConfirm: false,
            closeOnCancel: false }).then(function () {  
                $.ajax({
                    type:"POST",
                    url:"controlador/ctrlAlumnos.php",
                    data:{accion:accion, codEst:cod},
                    success: function(data){
                        swal({title:"¡Hecho!",
                            text:''+data,
                            timer: 2000,     
                            type:'success'},function(){                        
                        });
                    }
                });
            }, function (dismiss) {
                $("#principal").load("controlador/ctrlAlumnos.php",{accion:"cargar"});  
            });
        }
        
        function cargarNuevoCandidato(){
            $("#principal").load("controlador/ctrlCandidatos.php",{accion:"cargarNuevo"}); 
        }
        
        function guardarSeleccionCandidatos(){
            var formData = new FormData(document.getElementById("formularioSeleccionCandidatos"));

            formData.append("accion", "guardarSeleccionCandidatos"); //Esta línea me sirve para agregar otra variable con su respectivo valor.

            $.ajax({
                    url: "controlador/ctrlCandidatos.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res){            
                    $("#principal").html(res);
            });
        }
        
        function eliminarCandidato(cod){
            document.getElementById("principal").innerHTML="";
            document.getElementById("resultadoUsuario").innerHTML="";
            var accion="Eliminar";
            swal({ 
            title: "CONFIRMACION",
            text: "¿Está seguro de eliminar este Candidato?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#216F21",
            cancelButtonColor: "#DD6B55",
            confirmButtonText: "SI",
            cancelButtonText: "NO", 
            closeOnConfirm: false,
            closeOnCancel: false }).then(function () {  
                
                $("#principal").load("controlador/ctrlCandidatos.php",{accion:accion,codEst:cod},function(){
                    
                }); 
            }, function (dismiss) {
                $("#principal").load("controlador/ctrlCandidatos.php",{accion:"cargar"});  
            });
        }
        
        function salir(){
             $(location).attr('href','index.php');
        }
    </script>
</body>
</html>
