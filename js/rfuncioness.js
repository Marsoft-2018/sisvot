function VotoHecho(num,codest){
    var bloquea = document.getElementById("bloquear");
	bloquea.style.display='block';
        
    swal({ 
        title: "CONFIRMACION",
        text: "¿Está seguro de votar por este candidato?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#216F21",
        cancelButtonColor: "#DD6B55",
        confirmButtonText: "¡Claro!",
        cancelButtonText: "No", 
        closeOnConfirm: false,
        closeOnCancel: false },

        function(isConfirm){ 
            if (isConfirm) {
                swal({title:"¡Hecho!",
                text:'Su voto ha sido registrado gracias por usar SISVOT',
                timer: 3500,     
                type:'success'},function(){
                    $(location).attr('href','index.php');
                }); 
                
                $.ajax({
                    type:"POST",
                    url:"controlador/ctrlVotos.php",
                    data:{accion:"RegistrarVoto",idcandidato:num,idest:codest},
                    success: function(data){
                        alertify.success(data);
                    }
                });
            } else { 
                swal({title:"¡Voto Cancelado!",
                text:"Puede volver a elegir si lo desea...",
                timer: 2000},function(){
                    $("#bloquear").slideUp('fast');
                });   
            } 
        });
}
/*
function validar(){	
	var usu = document.getElementById('usu').value;
	var documento = document.getElementById('ident').value;
	var formulario = document.getElementById('login');
    if (usu=="" || documento==""){
		alert ("Por favor ingrese los datos completos");
	}else{
		var conexion;
		conexion = new XMLHttpRequest();
		if (window.XMLHttpRequest){
			conexion = new XMLHttpRequest();
		}else{
			conexion = new ActiveXObject("Microsoft.XMLHTTP");
		}
		conexion.onreadystatechange=function(){
		if (conexion.readyState==4 && conexion.status==200){					    
		  formulario.action=conexion.responseText;
		}
		}				
		conexion.open("GET","autenticacion.php?usu="+usu+"&ident="+documento,false);
		conexion.send();
		conexion.close;		
	}    
}
*/
function logear() {
    $.ajax({
        type:"POST",
        data:$('#frmLogin').serialize(),
        url:"controlador/ctrlValidacion.php",
        success:function(data){
            data = JSON.parse(data);
            
            console.log('Mensaje: '+data["estado"]);
            // respuesta = respuesta.trim();
            // console.log(respuesta);
            if(data["estado"] == 1) {
                window.location = "inicio.php";                      
            }else{
                 window.location = "No_auto.php"; 
                /*$("#respuesta").html("El Nombre de usuario o la contraseña no es correcto").addClass("animated zoomIn").show('fast',function(){
                    setTimeout(function(){ $("#respuesta").hide() }, 3000);
                });*/
            }
        }
    });
    return false;
}
/*
function administrar(pagina){
    document.getElementById("principal").innerHTML="";
	var accion = "cargar";
    //alert("si esta en esta funcion");
    $("#principal").load("controlador/ctrl"+pagina+".php",{accion:accion});    
	
}*/

function administrar(pagina){
    $("#principal").html("");
    var accion = 'cargar';

    $.ajax({
        type: "POST",
        url: "controlador/ctrl"+pagina+".php",
        data: {accion:accion},
        success:function(respuesta){
            $("#principal").html(respuesta);
            $(".dataTable").dataTable();
        },
        error: function(respuesta){
            console.log(respuesta);
        }
    });
}//ok

function cerrar(){
	var ventanac = document.getElementById("vent");
	ventanac.style.display="none";	
}

function abrir(){
	var ventanac = document.getElementById("vent");
	ventanac.style.display="block";	
}
function foto(archivo){
	alert ("La foto seleccionada es: "+archivo);	
}


function previsualizarFotoEst(input) {    
    var archivo = document.getElementById("imgProfe").files;
    var tamanho=archivo[0].size;
    var tipo=archivo[0].type;
    var nombre=archivo[0].name;
    if(tamanho>1024*1024){
        alertify.error("El archivo supera el limite del tamaño máximo permitido de 1Mb");
        $('#fotoUs').attr('src', 'IMAGENES/Usuarios/silueta.jpg');
        archivo.wrap('<form>').closest('formProfe').get(0).reset();
        archivo.unwrap();
    }else if(tipo!="image/jpg" && tipo!="image/jpeg" && tipo!="image/png" ){
        alertify.error("Este tipo de archivo no es permitido");
         archivo.wrap('<form>').closest('formProfe').get(0).reset();
         archivo.unwrap();
        $('#fotoUs').attr('src', 'IMAGENES/Usuarios/silueta.jpg');
    }else{
       if (input.files && input.files[0]) {
            var reader = new FileReader();            
            reader.onload = function (e) {
                $('#fotoUs').attr('src', e.target.result);
                $('#guardarIMG').fadeIn();
            }            
            reader.readAsDataURL(input.files[0]);
        } 
    }    
}

function cambiarFoto2(id){     
    var datosFormulario = new FormData(document.getElementById('cambioFoto'));
    datosFormulario.append('accion','cambiarFotoEstudiante');
    $.ajax({
        url:'Config/ajustesSedes.php',
        type:'post',
        data:datosFormulario,
        cahe:false,
        contentType:false,
        processData:false
    }).done(function(respuesta){
        alertify.error('La funcion cambio de foto falló por un error desconocido');
       $("#mostrarMensajeImagen").html(respuesta);
    });
}//No funciona problema con elevento onsubmit del formulario


function contarVotos(op){
    console.log("Opcion: "+op);
    $("#principal").html("");
    var accion = "contar";
    if (op == 2) {
        accion = "Abstencion";
    }
    
    if (op == 3) {
        accion = "Participacion";
    }
    
    $.ajax({
        type:"POST",
        url:"controlador/ctrlVotos.php",
        data:{accion:accion},
        success:function(data){
            $("#principal").html(data);   
        },
        error: function(err){
            console.log('test: '+err);
        }
    });   
}

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

function controlVotacion(estado){
    var accion = "controlVotacion";
    
    $.ajax({
        type:"POST",
        url:"controlador/ctrlVotos.php",
        data:{accion:accion,estado:estado},
        success:function(data){
            swal({title:"¡Hecho!",
                text:''+data,
                timer: 3500,     
                type:'success'}
            );   
        },
        error: function(err){
            console.log('test: '+err);
        }
    });
}