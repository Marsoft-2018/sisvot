<?php
    abstract class ConectarPDO{
        private $host = "localhost";
        private $bdt = "colegio7_personeros";
        private $usuario= "colegio7_root";
        private $password = "Sigest2021**";

        private $link;
        protected $Conexion;
        public function __construct(){
            $this->link  = "mysql:host=".$this->host;
            $this->link .= ";dbname=".$this->bdt;
            try{
                $this->Conexion = new PDO($this->link, $this->usuario, $this->password);
                $this->Conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->Conexion->query("SET NAMES 'utf8';");
            }catch(PDOException $e){
                echo "error al tratar de conectarse: ".$e;
            }
            return $this->Conexion;
        }

        public function cerrarConexion(){
            $this->Conexion = null;
        }
    }
?>