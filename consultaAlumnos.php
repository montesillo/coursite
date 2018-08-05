<?php 
	include('conexion.php');

	class Alumno{
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
			header('location: alumno.html');
			return $this->cerrar;
		}

		public function ListadoSQL(){
			$this->Consulta();
			while ($reg = mysqli_fetch_array($this->sql)) {
				 echo"<option>",$cursos = $reg['nombre'],"</option>";
			}
		}

		public function eleccionSQL(){
			$this->Consulta();
			echo '<table>';
			while ($reg = mysqli_fetch_array($this->sql)){
                echo '<tr><td align="center"><iframe width="500" height="250" src='.$reg['url'].' frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></td></tr>';
                echo '<tr bgcolor=white><td align="center"><p>'.$reg['texto'].'</p></td></tr><br>';
			}
			echo '</table>';
		}

		public function UsuariosSQL(){
        
        $cor = '';
        $pass = '';
        $intentos= '';
        $nom = '';
      $this->Consulta();

      while ($reg = mysqli_fetch_array($this->sql)) {
        $cor = $reg['correo'];
        $pass = $reg['password'];
        $intentos = $reg['intentos'];
        $nom = $reg['nombre'];
      }

      if ($cor == $_SESSION['email'] and $pass == $_SESSION['password'] and $intentos < 3) {
        header("location: inicio.php");
        
      }else if ($intentos >= 3) {
        header("location: erroractivate.php");
      }else if (empty($cor)) {
        echo "<link rel='stylesheet' type='text/css' href='estilos/estilo.css'>
        <body background='Imagenes/fondo.png'>
        <header>
			<div id='header'>
			<ul class='nav'>
				<li><a href='alumno.html'>Inicio</a></li>
			</ul>
		</div>
	</header><br><br><br><br><br><br>
        <h1 style='color: white' align='center'>NO EXISTE CORREO</h1></body>";
      }else{
        
        $intentos++;
        header("location: erroruser.php?intentos=$intentos"); 
      }
      return $this->cerrar;
    }

    public function Activar(){
      $this->Consulta();
      echo "<link rel='stylesheet' type='text/css' href='estilos/estilo.css'>
        <body background='Imagenes/fondo.png'>
        <header>
			<div id='header'>
			<ul class='nav'>
				<li><a href='alumno.html'>Inicio</a></li>
			</ul>
		</div>
	</header><br><br><br><br><br><br>
        <h1 style='color: white' align='center'>CUENTA REACTIVADA</h1></body>";
      return $this->cerrar;
    }

    public function ReacUser(){
        $intentos= '';
      $this->Consulta();

      while ($reg = mysqli_fetch_array($this->sql)) {
        $intentos = $reg['intentos'];
      }

      if ($intentos >= 3) {
        $intentos = 0;
        header("location: activar.php");
      }
      return $this->cerrar;
    }

    public function ErrorPassSQL(){
      $this->Consulta();
        echo "<link rel='stylesheet' type='text/css' href='estilos/estilo.css'>
        <body background='Imagenes/fondo.png'>
        <header>
			<div id='header'>
			<ul class='nav'>
				<li><a href='alumno.html'>Inicio</a></li>
			</ul>
		</div>
	</header><br><br><br><br><br><br>
        <h1 style='color: white' align='center'>ERROR EN LA CONTRASEÑA</h1></body>";
      return $this->cerrar;
    }

}
 ?>