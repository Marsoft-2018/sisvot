<?php
    class Candidato extends ConectarPDO{
        public $id;
        public $CODEST;
        public $GRADO;
        public $GRUPO;
        public $APELLIDO1;
        public $APELLIDO2;
        public $NOMBRE1;
        public $NOMBRE2;
        public $EST;
        public $codInst;
        public $SEXO;
        public $ROL;
        public $contrasena;

        public $sql;
        function agregar(){
            $this->sql = "INSERT INTO estudiantes (CODEST, GRADO, GRUPO, APELLIDO1, APELLIDO2, NOMBRE1, NOMBRE2, SEXO) VALUES (?,?,?,?,?,?,?,?)";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$this->CODEST);
                $stm->bindparam(2,$this->GRADO);
                $stm->bindparam(3,$this->GRUPO);
                $stm->bindparam(4,$this->APELLIDO1);
                $stm->bindparam(5,$this->APELLIDO2);
                $stm->bindparam(6,$this->NOMBRE1);
                $stm->bindparam(7,$this->NOMBRE2);
                $stm->bindparam(8,$this->SEXO);
                if ($stm->execute()) {
                   echo "Registro agregado con éxito";
                }
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }
        
        function Guardar($datos){
            $cara;            
            //var_dump($datos); 
            foreach($datos as $valores){ 
             
                $this->sql = "INSERT INTO `personeros`.`candidatos` (`FOTO`, `alumnos_CODEST`) VALUES (?, '$valores');";
                try {
                    $stm = $this->Conexion->prepare($this->sql);
                    $stm->bindparam(1,$cara);
                    if ($stm->execute()) {
                        echo '<div class="alert alert-success alert-dismissable" style="margin:0 auto;margin-top:20px;width:50%;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Se agregó con éxito los registros de los candidatos.
                    </div>';
                    }
                    return $datos;
                } catch (Exception $e) {
                    echo "Error: ".$e;
                }   
            }
        }//ok

        function listar(){
            $this->sql = "SELECT ca.Id,al.NOMBRE1,al.NOMBRE2,al.APELLIDO1,al.APELLIDO2,ca.FOTO,ca.alumnos_CODEST,ca.color,ca.partido FROM estudiantes al INNER JOIN candidatos ca ON al.CODEST = ca.alumnos_CODEST";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        function buscar(){
            $this->sql ="SELECT * FROM estudiantes WHERE CODEST = ? ORDER BY grado, grupo, APELLIDO1, APELLIDO2, NOMBRE1, NOMBRE2 DESC";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$this->CODEST);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        function eliminar(){
            $this->sql = "DELETE FROM candidatos WHERE alumnos_CODEST= ?";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->bindparam(1,$this->CODEST);
                if ($stm->execute()) {
                   echo "Registro eliminado con éxito";
                }
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        public function contar(){
            $total = 0;
            $this->sql = "SELECT COUNT(ca.alumnos_CODEST) AS total FROM candidatos ca";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                foreach ($datos as $value) {
                   $total = $value['total'];
                }
                return $total;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }
        
        function elegibles(){
            $this->sql = "SELECT e.*,c.`Id` FROM estudiantes e LEFT JOIN candidatos c ON c.`alumnos_CODEST` = e.`CODEST` WHERE grado='11' ORDER BY grado, grupo, APELLIDO1,APELLIDO2,NOMBRE1,NOMBRE2 DESC";
            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }

        function seleccionar(){

        }
        
    }
?>