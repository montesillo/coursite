<?php 
	//Hiram Montesillo
	include('conexion.php');

	class Maestro{
		private $consulta;
		private $sql;
		private $abrir;
		private $cerrar;

		public function __construct($c){
			$this->consulta = $c;
		}
		
		public function Consulta(){
			$db = new Conexion();
			$this->sql = $db->Ejecutar($this->consulta);
			$this->cerrar = $db->Desconectar();
		}

		public function InsertarSQL(){
			$this->Consulta();
			header('location: sesion.html');
			return $this->cerrar;
		}
		public function UsuariosSQL(){
			$email = '';
			$pass = '';
			$name = '';
			$this->Consulta();
			while ($reg = mysqli_fetch_array($this->sql)) {
				$email=$reg['correo'];
				$pass=$reg['password'];
				$name=$reg['nombre'];
			}
			if($email == $_SESSION['email'] && $pass == $_SESSION['password']){
				setcookie("maestro", $name, time()+3600);
				 header("location: CrearCurso.php");
			}
			

		}
	}
 ?>