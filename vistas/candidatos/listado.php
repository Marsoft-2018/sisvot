<table class='table table-striped tarjeton' style='width:70%;'>   
    <thead>
        <tr><td colspan='4'><h1>CANDIDATOS REGISTRADOS</h1></td></tr>
        <tr class='TITULO' BGCOLOR='#00005B'><td>No.</td><td>NOMBRE COMPLETO</td><td colspan='3'>FOTO</td></tr>
    </thead>
    <tbody>
        <?php 
            foreach ($obj->listar() as $candidato) { 

            ?>
            <tr>
                <td ><?php echo $candidato['Id'] ?></td>
                <td>
                    <div id='".$candidato[1]."' >
                        <?php echo $candidato['NOMBRE1']." ".$candidato['APELLIDO1']." ".$candidato['APELLIDO2'] ?>
                    </div>
                </td>
                <td>
                    <img src='IMG/<?php echo $candidato['FOTO'] ?>' width='40' height='40' />                
                </td>
                <td>
                    <a href='#' class='btn btn-success' title='Editar datos del Candidato' id = "<?php echo $candidato['alumnos_CODEST'] ?>" onclick='ventanaEditarAlumno(this.id)'>
                        <i class='fa fa-pencil'> </i>
                    </a>
                </td>
                <td>
                    <a href='#' class='btn btn-danger' onclick ="eliminarCandidato('<?php echo $candidato['alumnos_CODEST'] ?>')" title='Elimina el registro del candidato de la base da datos'>
                        <i class='fa fa-trash-o'> </i>
                    </a>
                </td>
            </tr>
        <?php 
            }

         ?>
        <tr>
            <td colspan='4'>
                <a href='#' class='btn btn-primary' id='Candidatos' onclick='cargarNuevoCandidato()'>Nuevo Candidato</a>
            </td>
        </tr>
    </tbody>
</table>