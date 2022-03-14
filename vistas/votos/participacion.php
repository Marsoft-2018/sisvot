<?php 
	$obj = new Alumno();
?>
<script src="complementos/DataTables/datatables.js"></script>
<script type="application/javascript">
    $(document).ready( function () {
        $('.dataTable').DataTable();
    } );
</script>

<div class="row">
    <div class="col-md-12">
        <table class='table table-striped table-bordered dataTable' style='width:100%;' id='tablaAlumnos'>
    	<thead>    
            <tr><th colspan='5'><h1>ALUMNOS REGISTRADOS</h1></th></tr>
            <tr class='TITULO' BGCOLOR='#00005B'>
                <th>Código</th>
                <th>Grado</th>
                <th>Nombre Completo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
        		foreach ($obj->listar() as $value) { ?>
        		<tr>
        			<td><?php echo $value['CODEST'] ?></td>
        			<td>
        			    <?php 
        			        if($value['GRADO'] == -1){
        			            echo "Jardin A";
        		            }elseif($value['GRADO'] == 0){
        		                echo "Grado B";
        		            }elseif($value['GRADO'] == -2){
        		                echo "Párvulos";
        		            }else{
        		                echo $value['GRADO']."°";
        		            }
        			    ?>
        			</td>
        			<td><?php echo $value['NOMBRE1']." ".$value['NOMBRE2']." ".$value['APELLIDO1']." ".$value['APELLIDO2'] ?></td>
        			<?php if ($value['EST'] == "Ya Voto"){ ?>
        				<td>
                            <span class="badge rounded-pill bg-success" style="width: 100%;"><?php echo $value['EST'] ?></span>
                        </td>
                    <?php }elseif ($value['EST'] == "No ha votado"){ ?>
                    	<td>
                    		<span class="badge rounded-pill bg-warning text-dark" style="width: 100%;"><?php echo $value['EST'] ?></span>
                    	</td>
        			<?php }else{ ?>
                    	<td>
                    		<span class="badge rounded-pill bg-secondary" style="width: 100%;"><?php echo $value['EST'] ?></span>
                    	</td>
        			<?php } ?>
        						
        		</tr>	
        	<?php 
        		}
        	?>
        </tbody>
        <tfoot>
        </tfoot>    
    </table></div>
</div> 