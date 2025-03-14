<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>TARJETÓN ELECTORAL</title>
        <link rel='stylesheet' href='css/estilos.css' type='text/css' />
        <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">

        <link rel="stylesheet" href="css/sweetalert.css">        
        <link rel="stylesheet" href="css/alertify.core.css" />
        <link rel="stylesheet" href="css/alertify.default.css" />  
        <!-- estilos actualizados para el tarjeton -->
        <style type="text/css">
            body{
                /*background: url("IMG/marca_de_agua.png");*/
            }
            .marcoNuevo{
                margin: 10px;
                position: relative;
                width: 315px;
                height: 190px;
                background-color: #FFFFFF;
                border: 1px solid rgba(4, 129, 242,0.5);
                /*border: 1px solid #E6E6E6;*/
                border-radius: 5px 5px 0px 0px;
                box-shadow: 2px 5px 5px rgba(153,153,153,1);
                top: -3px;
            }
            
            .marcoNuevo:hover{
                background-color: rgba(255, 218, 115,0.3);
            }
            
            .marcoFotoNuevo{
                margin: 0 auto;
                margin-top: 10px;
                border: 0px;
                width: 108px;
                height: 108px;
                background-color: #FFFFFF;
                padding: 5px;
                z-index: 1;
                box-shadow: 0px 1px 5px rgba(153,153,153,1);
            }

            .marcoFotoNuevo img{
                width: 100%;
                height: 100%;
            }

            
            .marcoNumero{
                margin:0 auto;
                margin-top:10px;
                border:0px solid #000;
                border-radius:5px;
                text-align:center;
                font-size:100px;
                background-color: #ffe;
                text-shadow:5px 5px 10px rgba(20,20,20,0.5);
                box-shadow: 0px 1px 5px rgba(153,153,153,1);
                width:80%;
                padding:10px;
                height:70%;
                line-height:1em;
            }
            
            .marcoNumero h1{
                font-size: 95px; 
                margin-top: 25px; 
                text-shadow: 0px 1px 5px rgba(153,153,153,1);
                color:#000;
            }
            
            .marcoNumero:hover{
                border: 1px solid #27B457; 
                background-color: #CF3;
                color:#fff;
                cursor: pointer;
            }
            
            .marcoNumero h1:hover{
                text-shadow: 0px 2px 5px rgba(23,93,33,1);
                color:#fff;
            }
            
            .marcoNombre{
                height:10%;
                margin:0 auto;
                background-color: #ffe;
                box-shadow: 0px 1px 5px rgba(153,153,153,1);
                width:93%;
                float:left;
                padding: 5px;
                margin-left: 5px;
                text-align: center;
            }
            
            .cuadroFoto{
                height:75%;
                width:40%;
                float:left;
            }
            
            .datosCandidato{
                height:75%;
                width:58%;
                float:left;
            }
            .bandaColores{
                float: left;
                width: 99%;
                height: 10px;
                padding: 0px;
                margin: 5px;
            }
            .colores{
                margin: 0px;
                padding: 3px;
                float: left;                
            }
            .color1{
                /*background-color: #E38000;*/
                background-color: #FFA01D;
                width: 28%;
            }
            
            .color2{
                /* background-color: #5CCB00; */
                background-color: #15B952;
                width: 35%;
            }
            .color3{
                background-color: #E71A51;
                width: 28%;
            }
            
        </style>
    </head>
    <body>
        <header><img src='IMG/Sisvot_P1.png'/></header>
        <a href='index.php'><div class='bloqueo' id='bloquear'></div></a>
        <div style='width: 100%; background-color: #4455F9; color: #fff; padding: 10px; margin-bottom: 30px;'>
            Estudiante votando: 
            <b><?php echo $_SESSION['nombre'] ?></b>
            <span style='float: right;'>
                <a href='index.php' style='color: #fff; margin-right: 100px;'>Salir</a>
            </span>
        </div>

        <div class='principal container'>
        	<div class="row">
        	<?php 
                    require("modelo/Conect.php");
                    require("modelo/candidato.php");
                    $idest = $_SESSION['idUsuario'];
                    $objCandidato = new Candidato();
                    $total_filas = ceil($objCandidato->contar()/2);
        		foreach ($objCandidato->listar() as $candidato) { ?>
        				
        			<div class="col-md-6 " style="margin-bottom: 50px;">
	        			<div class="card mb-3 fichaCandidato" style="max-width: 100%; height: 225px;" onclick="VotoHecho('<?php echo $candidato['Id'] ?>','<?php echo $idest ?>')">
						  <div class="row no-gutters">
						    <div class="col-md-4">
						      <img src="IMG/<?php echo $candidato['FOTO'] ?>"  style="width: 100%; height: 225px; "/>

						    </div>
						    <div class="col-md-8">
						      <div class="card-body" style="background-color: <?php echo $candidato['color']; ?>;height: 100%; color:#fff; padding:5px; ">
						            <?php 
						                $color_fuente = "#fff";
	                                    if($candidato['Id'] == 0){
	                                        $color_fuente = "#000";
	                                    }
	                                ?>
						        <h5 class="card-title" style="color: <?php echo $color_fuente; ?>;" >
						             
						        	<?php 
	                                    echo $candidato['NOMBRE1']." ".$candidato['secondName']." ".$candidato['APELLIDO1']." ".$candidato['APELLIDO2'];
	                                ?> 
                                </h5>
                                <hr> 
						        <p class="card-text">
						        	<div >
						        		<h1>
						        			<?php 
	                                            if($candidato['Id']== 0){

	                                            }elseif ($candidato['Id']<=9){
	                                                echo    "# 0".$candidato['Id'];
	                                            }else{
	                                                echo    "# ".$candidato['Id'];
	                                            }
	                                		?>
	                                    </h1>
	                                </div>
						        </p>
						        <hr>
						        <!--
						        <div class='card-text bandaColores'>
	                                <div class='colores color1'></div>
	                                <div class='colores color2'></div>
	                                <div class='colores color3'></div>
	                            </div>-->
	                                <?php 
                                        if($candidato['Id'] != 0){ ?>
    	                                <label>Partido:   
    	                                <strong><?php echo    $candidato['partido'] ?></strong>  </label>
                                    <?php
                                        }
                            		?>
						        <!-- <p class=""><small class="text-muted">Last updated 3 mins ago</small></p> -->
						      </div>
						    </div>
						  </div>
						</div>   
					</div>                   	
                   <?php 
            }
                

        	?>
        	</div>
            <!-- <table class='tarjeton'>
                <?php

                    $cont = 0;

                            
                    for ($f=1;$f<=$total_filas;$f++ ){
                        
                        echo "<tr> ";
                        foreach ($objCandidato->listar() as $candidato) {
                        	
                                //Nuevo tarjeton
                                echo "<td>";								
                                        echo    "<div class='marcoNuevo'>";
                                        echo            "<div class='cuadroFoto' id='foto0'>";
                                        echo                "<div class='marcoFotoNuevo' id='foto".$candidato['Id']."'>
                                                                <img src='IMG/".$candidato['FOTO']."' width='100' height='105' />
                                                            </div>";
                                        echo            "</div>";
                                        echo        "<div class='datosCandidato' id='votoh".$candidato['Id']."'>";	
                                        echo            "<div class='marcoNumero' onclick='VotoHecho(this.id,this.title)' title='".$idest."' id='".$candidato['Id']."'><div id='num".$candidato['Id']."'><h1>";
                                                    if($candidato['Id']== 0){

                                                    }elseif ($candidato['Id']<=9){
                                                        echo    "0".$candidato['Id'];
                                                    }else{
                                                        echo    $candidato['Id'];
                                                    }
                                
                                        echo            "</h1></div></div>";
                                        echo        "</div>";
                                        echo        "<div class='marcoNombre' >";
                                        echo            "<div class=''>".$candidato['NOMBRE1']." ".$candidato['secondName']." ".$candidato['APELLIDO1']." ".$candidato['APELLIDO2']."</div>";
                                        echo        "</div>";
                                        echo        "<div class='bandaColores'>";
                                        echo            "<div class='colores color1'></div>";
                                        echo            "<div class='colores color2'></div>";
                                        echo            "<div class='colores color3'></div>";
                                        echo        "</div>";
                                        /*
                                        echo        "<div class='votoshechos' >";
                                        echo            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo        "</div>";
                                        */
                                        echo     "</div>";		            
                                        echo "</td>";
                                $cont=$cont+1;
                        }
                            
                                                                				
                        echo "</tr>";		 
                    }
                
            ?>
	        </table> -->
	    </div>
    <footer>
        <!--<p><font size="1">Copy Right&copy;: Ing. Jose Alfredo Tapia A.</font></p> -->
    </footer>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
    <script type='text/javascript' src='js/main.js'></script>
    <script type="text/javascript" src="js/alertify.js"></script>     
</body>
</html>
