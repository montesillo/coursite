<?php
	include('conexion.php');
	/**
	* 
	*/
	class Acceso{
		private $consulta;
		private $sql;
		private $abrir;
		private $cerrar;

		public function __construct($c){
			$this->consulta = $c;
		}
		#Mando el codigo sql a consulta.php
		public function Consulta(){
			$db = new Conexion();
			$this->sql = $db->Ejecutar($this->consulta);
			$this->cerrar = $db->Desconectar();
		}
		#En este se puede usar tanto para insertar registros como para borrar
		#Solo envio el codigo sql que necesite utilizar
		public function InsertarSQL(){
			$this->Consulta();
			header('location: sesion.html');
			return $this->cerrar;
		}
		public function ListadoSQL(){
			$this->Consulta();
			while ($reg = mysqli_fetch_array($this->sql)) {
				#Aqui ponglo lo que quiero imprimir en pantalla
				#Tambien puedo obtener datos espesificos de la db
			}


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
				setcookie("sesion", $name, time()+3600);
				 header("location: inicio.php");
			}
			

		}



	}
?>