<?php
	class Usuario extends ConectarPDO{
		public $idUsuario;
		public $usuario;
		public $password;
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
				$stm->bindparam(1, $this->usuario);
				$stm->bindparam(2, $this->password);
				$stm->execute();
				$num = $stm->fetchAll(PDO::FETCH_ASSOC);
				foreach ($num as $key => $value) {
					$_SESSION['institucion'] = $value['codInst'];
					$_SESSION['idUsuario'] = $value['CODEST'];
					$_SESSION['nombre'] = $value['NOMBRE1']." ".$value['NOMBRE2']." ".$value['APELLIDO1']." ".$value['APELLIDO2'];
					$_SESSION['rol'] = $value['ROL'];
            		$datos['estado'] = [1];
            		$con = 1;
				}

				if($con == 0){					
					$this->sql = "SELECT * FROM usuarios WHERE idUsuario = ? AND contrasena = ? AND ESTADO = 'Activo'";
					try {
						$stm = $this->Conexion->prepare($this->sql);
						$stm->bindParam(1, $this->usuario);
						$stm->bindParam(2,$this->password);
						$stm->execute();
						$num = $stm->fetchAll(PDO::FETCH_ASSOC);
						foreach ($num as $key => $value) {
							$_SESSION['institucion'] = $value['Institucion_idInstitucion'];
							$_SESSION['idUsuario'] = $value['idUsuario'];
							$_SESSION['nombre'] = $value['NOMBRE'];
							$_SESSION['rol'] = $value['ROL'];
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

		public function agregar(){
			$this->sql ="INSERT INTO t_users(usuario, password, rol, nombre, correo, direccion, telefono, cargo) VALUES(?,?,?,?,?,?,?,?)";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->usuario);
				$stm->bindParam(2,$this->password);
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
				$this->sql ="UPDATE profesores SET usuario=?, correo=?, direccion=?, telefono=? WHERE idUsuario = '".$this->idUsuario."' AND estado = 1";
			}elseif($this->rol == "Administrador"){
				$this->sql ="UPDATE t_users SET usuario=?, rol=?, nombre=?, correo=?, direccion=?, telefono=?, cargo=? WHERE id_usuario = '".$this->idUsuario."' AND estado = 1";		
			}

			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->usuario);
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
			$this->sql ="UPDATE t_users SET estado = 2 WHERE id_usuario = '".$this->idUsuario."' ";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->execute();
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function eliminar(){
			$this->sql ="DELETE FROM t_users WHERE idUsuario= ?";
			try {
				$stm = $this->Conexion->prepare($this->sql);
				$stm->bindParam(1,$this->idUsuario);
				$stm->execute();
			} catch (Exception $e) {
				echo "error al guardar los datos: ".$e;
			}
		}

		public function setDatos($us, $pass){
			$this->usuario = $us;
			$this->password = SED::encryption($pass);
		}

		public function validarActivacion(){
			require ("Institucion.php");
			$obj = new Institucion();
			return $obj->validarActivacion($_SESSION['rol']);
		}

	}
// 	include ("../Controladores/encript.php");	
// 	 $objUsu = new Usuario();
// 	 $objUsu->setDatos('Admin','123456');
// 	 $objUsu->login();

// 	$objUsu->validarActivacion();
// ?>