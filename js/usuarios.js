function mostrar_usuarios(){
    var accion = "Mostrar";
    $.ajax({
        type:"POST",
        url: "controlador/ctrlUsuarios.php",
        data:{accion:accion},
        success: function(response){
            $("#principal").html(response);
        },
        error: function(err){
            console.log("Error: "+err);
        }
    })
}

function listar_usuarios(){
    var accion = "Listar";
    $.ajax({
        type:"POST",
        url: "controlador/ctrlUsuarios.php",
        data:{accion:accion},
        success: function(response){
            $("#seccion_usuarios").html(response);
        },
        error: function(err){
            console.log("Error: "+err);
        }
    })
}