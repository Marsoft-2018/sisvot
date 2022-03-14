<?php
	class Usuario extends ConectarPDO{
		public $id;
		public $nombre_usuario;
		public $contrasena;
		public $nombre;
		public $correo;
		public $direccion;
		public $telefono;
		public $cargo;
		public $rol;
		public $estado;
		
		private $sql;

		public function login() {
			$con = 0;
			$this->sql = "SELECT * FROM estudiantes Where CODEST= ? AND contrasena = ? AND EST='No ha votado'";
			$datos = array();
            $datos['estado'] = [0];

			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindparam(1, $this->nombre_usuario);
				$stm->bindparam(2, $this->contrasena);
				$stm->execute();
				$num = $stm->fetchAll(PDO::FETCH_ASSOC);
				foreach ($num as $key => $value) {
					$_SESSION['institucion'] = $value['codInst'];
					$_SESSION['id'] = $value['CODEST'];
					$_SESSION['nombre'] = $value['NOMBRE1']." ".$value['NOMBRE2']." ".$value['APELLIDO1']." ".$value['APELLIDO2'];
					$_SESSION['rol'] = $value['ROL'];
            		$datos['estado'] = [1];
            		$con = 1;
				}

				if($con == 0){					
					$this->sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contrasena = ? AND ESTADO = 'Activo'";
					try {
						$stm = $this->Conexion->prepare($this->sql);
						$stm->bindParam(1, $this->nombre_usuario);
						$stm->bindParam(2,$this->contrasena);
						$stm->execute();
						$num = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($num as $key => $value) {
							$_SESSION['institucion'] = $value['Institucion_idInstitucion'];
							$_SESSION['id'] = $value['id'];
							$_SESSION['nombre'] = $value['nombre'];
							$_SESSION['rol'] = $value['rol'];
            				$datos['estado'] = [1];
						}
					} catch (Exception $e) {
						echo "Error en la validacion. ".$e;
					}
				}
				return $datos;
			} catch (Exception $e) {
				echo "Error en la validacion. ".$e;
			}

			if($con == 0){
				return false;
			}
		}

		public function listar(){
			$this->sql ="SELECT * FROM usuarios ORDER BY id";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->execute();				
				$datos = $stm->fetchAll(PDO::FETCH_ASSOC);
				return $datos;

			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function agregar(){
			$this->sql ="INSERT INTO t_users(nombre_usuario, contrasena, rol, nombre, correo, direccion, telefono, cargo) VALUES(?,?,?,?,?,?,?,?)";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->nombre_usuario);
				$stm->bindParam(2,$this->contrasena);
				$stm->bindParam(3,$this->rol);
				$stm->bindParam(4,$this->nombre);
				$stm->bindParam(5,$this->correo);
				$stm->bindParam(6,$this->direccion);
				$stm->bindParam(7,$this->telefono);
				$stm->bindParam(8,$this->cargo);
				$stm->execute();
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function actualizar(){
			if ($this->rol == "Profesor") {
				$this->sql ="UPDATE profesores SET nombre_usuario=?, correo=?, direccion=?, telefono=? WHERE id = '".$this->id."' AND estado = 1";
			}elseif($this->rol == "Administrador"){
				$this->sql ="UPDATE t_users SET nombre_usuario=?, rol=?, nombre=?, correo=?, direccion=?, telefono=?, cargo=? WHERE id_nombre_usuario = '".$this->id."' AND estado = 1";		
			}

			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->nombre_usuario);
				$stm->bindParam(2,$this->rol);
				$stm->bindParam(3,$this->nombre);
				$stm->bindParam(4,$this->correo);
				$stm->bindParam(5,$this->direccion);
				$stm->bindParam(6,$this->telefono);
				$stm->bindParam(7,$this->cargo);
				$stm->execute();
				echo "Se guardaron los datos con éxito, debe reiniciar la sesión para que tengan efecto";
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function desactivar(){
			$this->sql ="UPDATE t_users SET estado = 2 WHERE id_nombre_usuario = '".$this->id."' ";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->execute();
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function eliminar(){
			$this->sql ="DELETE FROM t_users WHERE id= ?";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->id);
				$stm->execute();
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function setDatos($us, $pass){
			$this->nombre_usuario = $us;
			$this->contrasena = SED::encryption($pass);
		}

		public function validarActivacion(){
			require ("Institucion.php");
			$obj = new Institucion();
			return $obj->validarActivacion($_SESSION['rol']);
		}

	}
// 	include ("../Controladores/encript.php");	
// 	 $objUsu = new nombre_Usuario();
// 	 $objUsu->setDatos('Admin','123456');
// 	 $objUsu->login();

// 	$objUsu->validarActivacion();
// ?>