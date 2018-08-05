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
			header('location: CursosExistentes.php');
			return $this->cerrar;
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
        header("location: CrearCurso.php");
        
      }else if ($intentos >= 3) {
        header("location: Maestroerroractivate.php");
      }else if (empty($cor)) {
        echo "<link rel='stylesheet' type='text/css' href='estilos/estilo.css'>
        <body background='Imagenes/fondo.png'>
        <header>
			<div id='header'>
			<ul class='nav'>
				<li><a href='maestro.html'>Inicio</a></li>
			</ul>
		</div>
	</header><br><br><br><br><br><br>
        <h1 style='color: white' align='center'>NO EXISTE CORREO</h1></body>";
      }else{
        
        $intentos++;
        header("location: Maestroerroruser.php?intentos=$intentos"); 
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
				<li><a href='maestro.html'>Inicio</a></li>
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
        header("location: Maestroactivar.php");
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
				<li><a href='maestro.html'>Inicio</a></li>
			</ul>
		</div>
	</header><br><br><br><br><br><br>
        <h1 style='color: white' align='center'>ERROR EN LA CONTRASEÑA</h1></body>";
      return $this->cerrar;
    }

		public function ListadoSQL(){
			$this->Consulta();
			echo '<br><br><br>';
			while ($reg = mysqli_fetch_array($this->sql)) {
				$id = $reg['id_curso'];
			/*	$nombre = $reg['nombre'];
				$url = str_replace(' ', '', $nombre);
				$url = $url.'.php';
			*/	echo "<table border=1><tr bgcolor=black><td align=center width=200><p><a style=color:white href=IngresarUrl.php?id=$id>",$reg['nombre'],'<a></p></td><td><p><a style=color:white href=Eliminar2.php?nombre=',$reg['nombre'],'>ELIMINAR</a></p></td></tr></table><br>';
			}
			return $this->cerrar;

		}

    public function EliminarCorreo(){
       $this->Consulta();
      echo "
    <table border = 1 cellspacing = 1 cellpadding = 1><br>
        <tr>
            <th>Email</th>
            <th>Delete</th>
        </tr>";
    while($row = mysqli_fetch_array($this->sql)){
          echo "
            <tr bgcolor='red'>
                <td>",$row['email'],"</td>
                <td><a href=Eliminar2.php?email=$row[email]>Eliminar</td>
            </tr>";
        
    }
  }

   public function EliminarSQL($c){
        $this->consulta = $c;
        $this->Consulta();
        echo "<link rel='stylesheet' type='text/css' href='estilos/estilo.css'>
        <body background='Imagenes/fondo.png'>
        <header>
      <div id='header'>
      <ul class='nav'>
        <li><a href='CursosExistentes.php'>Regresar</a></li>
      </ul>
    </div>
  </header><br><br><br><br><br><br>
        <h1 style='color: white' align='center'>EL CUROS SE A ELIMINADO</h1></body>";
        return $this->cerrar;
    }

    public function ConfirmarEliminarSQL(){
        $this->Consulta();
        if(mysqli_num_rows($this->sql)){
            return 1;
        }else{
            echo "<link rel='stylesheet' type='text/css' href='estilos/estilo.css'>
        <body background='Imagenes/fondo.png'>
        <header>
      <div id='header'>
      <ul class='nav'>
        <li><a href='CursosExistentes.php'>Regresar</a></li>
      </ul>
    </div>
  </header><br><br><br><br><br><br>
        <h1 style='color: white' align='center'>NO EXISTE CURSO</h1></body>";
            return $this->cerrar;
        }
    }

	}
 ?>