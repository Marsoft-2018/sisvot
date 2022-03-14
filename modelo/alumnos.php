<?php
    class Alumno extends ConectarPDO{
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

        function listar(){
            $this->sql = "SELECT * FROM estudiantes ORDER BY grado,grupo, APELLIDO1,APELLIDO2,NOMBRE1,NOMBRE2 DESC";
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
             $this->sql = "SELECT  `CODEST`, `GRADO`, `GRUPO`, `APELLIDO1`, `APELLIDO2`, `NOMBRE1`, `NOMBRE2`, `EST`, `codInst`, `SEXO`, `ROL`, `contrasena`  FROM estudiantes WHERE CODEST = '".$this->id."' ORDER BY GRADO,GRUPO, APELLIDO1,APELLIDO2,NOMBRE1,NOMBRE2 DESC ";

             try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }

        }

        function eliminar(){
            $this->sql = "DELETE FROM estudiantes WHERE CODEST= ?";
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
        
        function Actualizar(){
            
        }
        
        function fotoCandidato(){
            $this->sql = "SELECT FOTO FROM candidatos WHERE alumnos_CODEST= '".$this->id."'";

            try {
                $stm = $this->Conexion->prepare($this->sql);
                $stm->execute();
                $datos = $stm->fetchall(PDO::FETCH_ASSOC);
                return $datos;
            } catch (Exception $e) {
                echo "Error: ".$e;
            }
        }
        
    }
?>