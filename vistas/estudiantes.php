<?php 
	$obj = new Alumno();
?>
<script src="complementos/DataTables/datatables.js"></script>
<script type="application/javascript">
    $(document).ready( function () {
        $('.dataTable').DataTable();
    } );
</script>
<h1>ALUMNOS REGISTRADOS</h1><a href='#' class='btn btn-primary' onclick='ventanaNuevoAlumno()'><i class='fa fa-plus-circle'> Agregar Alumno </i></a>
<table class='table table-striped tarjeton' style='width:70%;' id='tablaAlumnos'>
	<thead>    
        <tr class='TITULO' BGCOLOR='#00005B'>
            <th>Código</th>
            <th>Grado</th>
            <th>Nombre Completo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
    		foreach ($obj->listar() as $value) { ?>
    		<tr>
    			<td><?php echo $value['CODEST'] ?></td>
    			<td><?php echo $value['GRADO']."°" ?></td>
    			<td><?php echo $value['NOMBRE1']." ".$value['NOMBRE2']." ".$value['APELLIDO1']." ".$value['APELLIDO2'] ?></td>
    			<?php if ($value['EST'] == "Ya voto"){ ?>
    				<td><span class='btn btn-default'><?php echo $value['EST'] ?></span></td>
                	<td><a href='#' class='btn btn-default' title='Editar datos del alumno' style='color:#cecece;'><i class='fa fa-pencil'> </i></a></td>
                	<td><a href='#' class='btn btn-default' style='color:#cecece;' title='Elimina el registro del alumno de la base da datos'><i class='fa fa-trash-o'> </i></a></td>
                <?php }else{ ?>
                	<td>
                		<span class='btn btn-warning'><?php echo $value['EST'] ?></span>
                	</td>
                	<td>
                		<a href='#' class='btn btn-success' title='Editar datos del alumno' id='<?php echo $value['CODEST'] ?>' onclick='ventanaEditarAlumno(this.id)'>
                			<i class='fa fa-pencil'> </i>
                		</a>
                		|
                		<a href='#' class='btn btn-danger' id='<?php echo $value['EST'] ?>' onclick='eliminarAlumno(this.id)' title='Elimina el registro del alumno de la base da datos'>
                			<i class='fa fa-trash-o'> </i>
                		</a>
                	</td>
    			<?php } ?>
    						
    		</tr>	
    	<?php 
    		}
    	?>
    </tbody> 
</table>
<a href='#' class='btn btn-primary' onclick='ventanaNuevoAlumno()'><i class='fa fa-plus-circle'> Agregar Alumno </i></a>