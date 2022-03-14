<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>TARJETÓN ELECTORAL</title>
        <link rel='stylesheet' href='css/tarjeton.css' type='text/css' />

        <link rel="stylesheet" href="css/sweetalert.css">        
        <link rel="stylesheet" href="css/alertify.core.css" />
        <link rel="stylesheet" href="css/alertify.default.css" />  

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Roboto&display=swap" rel="stylesheet">  
        
    </head>
    <body>
        <header class="logo-sistema"><img src='IMG/Sisvot_P1.png'/></header>
        <a href='index.php'><div class='bloqueo' id='bloquear'></div></a>
        <div class="seccion-votante">
            Estudiante votando: 
            <b><?php echo $_SESSION['nombre'] ?></b>
            <span style='float: right;'>
                <a href='index.php' style='color: #fff; margin-right: 100px;'>Salir</a>
            </span>
        </div>

        <div class="principal">
        	<div class="container">
        	    <?php 
                    require("modelo/Conect.php");
                    require("modelo/candidato.php");
                    $idest = $_SESSION['idUsuario'];
                    $objCandidato = new Candidato();
                    $total_filas = ceil($objCandidato->contar()/2);
        		foreach ($objCandidato->listar() as $candidato) { ?>
	        	<div class="tarjeton"  onclick="VotoHecho('<?php echo $candidato['Id'] ?>','<?php echo $idest ?>')">
	        		<div class="foto">
	        			<img src="IMG/<?php echo $candidato['FOTO'] ?>"/>        			
	        		</div>
	        		<div class="datos" style="background-color: <?php echo $candidato['color']; ?>;">
			            <?php 
			                $color_fuente = "#fff";
                            if($candidato['Id'] == 0){
                                $color_fuente = "#000";
                            }
                        ?>
	        			<div class="nombre">
	        				<h3 style="color: <?php echo $color_fuente; ?>;">	
	        				    <?php 
	                                echo $candidato['NOMBRE1']." ".$candidato['NOMBRE2']." ".$candidato['APELLIDO1']." ".$candidato['APELLIDO2'];
	                            ?> 
	                        </h3>
	        			</div>
	        			<div class="numero">
	        				<?php 
                                if($candidato['Id']== 0){

                                }elseif ($candidato['Id']<=9){
                                    echo    "# 0".$candidato['Id'];
                                }else{
                                    echo    "# ".$candidato['Id'];
                                }
                    		?>
	        			</div>
	        			<div class="partido">
	        				<h3>Partido: <strong><?php echo    $candidato['partido'] ?></strong></h3>
	        			</div>
	        		</div>
	        	</div>
	        	<?php }	?>
	        </div>
        </div>
    <footer>
        <!--<p><font size="1">Copy Right&copy;: Ing. Jose Alfredo Tapia A.</font></p> -->
    </footer>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script type='text/javascript' src='js/rfuncioness.js'></script>
    <script type="text/javascript" src="js/alertify.js"></script>     
</body>
</html>
