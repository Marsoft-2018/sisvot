<div class="container marco-reporte">
    <div class="resumen-votos">
        <h3>RESULTADOS DE LA VOTACIÓN</h3> 
    </div>
    <div class="contenedor-votos">
        <?php 
            $totalg = 0;
            foreach ($objCandidato->listar() as $candidato) { ?>
                <div class="tarjeta-candidato"  style="background-color: <?php echo $candidato['color']; ?>;">
                    <div class="can-partido">
                        <?php 
    			            $color_fuente = "#000";
                            
                            if($candidato['Id'] != 0){ 
                                $color_fuente = "#fff";
                            ?>
                                Partido:<br>
                                <strong><?php echo    $candidato['partido'] ?></strong>
                        <?php   } ?>
                    </div>
                    <div class="can-foto">
                        <img src='IMG/<?php echo $candidato['FOTO'] ?>' />
                            <?php 
                                if($candidato['Id'] == 0){
    
                                }elseif ($candidato['Id']<=9){ ?>
                                    <div class="can-numero">
                                        <?php echo "# 0".$candidato['Id']; ?>
                                    </div>
                                <?php }else{ ?>
                                    <div class="can-numero">
                                    <?php echo    "# ".$candidato['Id']; ?>
                                    </div>
                            <?php
                                }
                    		?>
                    </div>
                    <div class="can-votos">
                        <span class="label-votos">Total Votos:</span>
                        <?php 
                            $objVotos = new Voto();
                            $objVotos->id = $candidato['Id'];
                            $contVotos = 0;
                            foreach($objVotos->contar() as $votos){
                                $contVotos = $votos['Votos']; 
                            }
                            echo $contVotos; 
                        ?>
                    </div>
                    <div class="can-porcentaje">
                        <?php
                            $objTotalVotos = new Voto();
                            $porcentaje = round((100 * $contVotos) / $objTotalVotos->totalVotos(),2);
                        ?>
                        <div class="progreso" style="width: <?php echo $porcentaje; ?>%"></div><span><?php echo $porcentaje; ?>%</span>
                    </div>
                    <div class="can-nombre"  style="color: <?php echo $color_fuente; ?>;"><?php echo $candidato['NOMBRE1']." ".$candidato['NOMBRE2'] ?></div>
                    <div class="can-apellidos"  style="color: <?php echo $color_fuente; ?>;"><?php echo $candidato['APELLIDO1']." ".$candidato['APELLIDO2'] ?></div>
                </div>
        <?php
            } 
        ?>
    </div>
    <div class="container resumen-votos">
        <div class="resultados">
            <h3>Total Votantes Habilitados: 
                <span class="vot-total">
                    <?php 
                        $objTotalVotos = new Voto();
                        echo $objTotalVotos->totalVotantes(); 
                    ?>
                </span>
            </h3>
            <h3>
                Total votos registrados: 
                <span class="vot-total">
                <?php 
                    $objTotalVotos = new Voto();
                    echo $objTotalVotos->totalVotos(); 
                ?>
                </span>
            </h3>
            <h3>
                Porcentaje de votación: 
                <span class="vot-procentaje"> 
                    <?php 
                        $porcentajeVotacion = round(($objTotalVotos->totalVotos() * 100) / $objTotalVotos->totalVotantes(),2);
                        echo $porcentajeVotacion;
                    ?>%
                </span>
            </h3>
        </div>
        <div class="abstencion">
            <h3>Abstención</h3>
            <h3>Votos no realizados:  
                <span class="vot-total">
                    <?php 
                        $noVotacion = $objTotalVotos->totalVotantes() -  $objTotalVotos->totalVotos();
                        echo $noVotacion;
                    ?>
                </span>
            </h3>
            <h3>
                Porcentaje de abstención: 
                <span class="vot-procentaje"> 
                    <?php 
                        $porcentajeVotacion = round(($noVotacion * 100) / $objTotalVotos->totalVotantes(),2);
                        echo $porcentajeVotacion;
                    ?>%
                </span>
            </h3>
        </div>
    </div>   
</div>



