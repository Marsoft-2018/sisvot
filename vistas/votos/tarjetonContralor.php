<div class="container">
    <?php 
  session_start();
        require("../../modelo/Conect.php");
        require("../../modelo/candidato.php");
        $idest = $_SESSION['id'];
        $objCandidato = new Candidato();
        $total_filas = ceil($objCandidato->contar()/2);
    foreach ($objCandidato->listarContralores() as $candidato) { ?>
    <div class="tarjeton"  onclick="VotoHecho('<?php echo $candidato['id'] ?>','<?php echo $idest ?>')">
        <?php 
            if($candidato['id'] != 0 && $candidato['id'] != 99){ 
        ?>
                <div class="foto">
                    <img src="image/<?php echo $candidato['photo'] ?>"/>        			
                </div>
        <?php
            }
        ?>
        <div class="datos" style="background-color: <?php echo $candidato['color']; ?>;">
            <?php 
                $color_fuente = "#fff";
                if($candidato['id'] == 0 || $candidato['id'] == 99){
                    $color_fuente = "#000";
                }
            ?>
            <div class="nombre">
                <h3 style="color: <?php echo $color_fuente; ?>;">	
                    <?php 
                        echo $candidato['firstName']." ".$candidato['secondName']." ".$candidato['firstLastName']." ".$candidato['secondLastName'];
                    ?> 
                </h3>
            </div>
            <div class="numero">
                <?php 
                    if($candidato['id'] != 0 && $candidato['id'] != 99){ 
                            echo "# ".$candidato['numero']; 
                    }
                ?>
            </div>
            <div class="partido">
                <?php 
                    if($candidato['partido'] != null){ 
                ?>
                    <h3>Partido: <strong><?php echo    $candidato['partido'] ?></strong></h3>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php }	?>
</div>
        
