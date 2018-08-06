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
        header("location: Alumnoerroractivate.php");
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
        header("location: Alumnoerroruser.php?intentos=$intentos"); 
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
        header("location: Alumnoactivar.php");
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

    public function ExamenSQL(){
      $this->Consulta();
      echo '<br><br><br><br><br>';
      $contador = 0;
      $rc[] = rand();
        $re1[] = rand();
        $re2[] = rand();
      while ($reg = mysqli_fetch_array($this->sql)) {
        $contador++;
        $correcta = $reg['rc'];
        $error1 = $reg['re1'];
        $error2 = $reg['re2'];
        $id = $reg['id_examen'];
        echo '<p style=color:white >',$contador,'. ', $reg['pregunta'],'<br></p>';
        $rc[] ="<p style=color:white><input type=radio name=$contador value=1 > $correcta   </p><br> ";
        $re1[] =  "<p style=color:white><input type=radio name=$contador value=0> $error1    </p> <br>";
        $re2[] = "<p style=color:white><input type=radio name=$contador value=0> $error2  </p><br>";

        if ($rc['0'] >= $re1['0']) {
          if ($rc['0'] >= $re2['0']) {
            echo $rc[$contador];

            if ($re1['0'] >= $re2['0']) {
            echo $re1[$contador];
            echo $re2[$contador];
          }else{
            echo $re2[$contador];
            echo $re1[$contador];
          }
          }else{
            echo $re2[$contador];
            echo $rc[$contador];
            echo $re1[$contador];
          }
        }else{
          if ($re1['0'] >= $re2['0']) {
            echo $re1[$contador];
            if ($rc['0'] >= $re2['0']) {
              echo $rc[$contador];
              echo $re2[$contador];
            }else{
              echo $re2[$contador];
              echo $rc[$contador];
            }
          }else{
            echo $re2[$contador];
            echo $re1[$contador];
            echo $rc[$contador];
          }
        }
        echo '<br>';
      }
      return $this->cerrar;
    }

}
 ?>