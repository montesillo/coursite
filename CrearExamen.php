<!DOCTYPE html>
<html>
<head>
	<title>Escuela On Line</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos/estilo.css">

</head>
<body background="Imagenes/fondo.png">
	<header>
			<div id="header">
			<ul class="nav">
				<li><a href="CerrarSesionMAestro.php">Cerrar Sesión</a></li>
				<li><a href="index.html">Inicio</a></li>
			</ul>
		</div>
	</header>

	<?php 
	include('consultaMaestros.php');
	if (!isset($_COOKIE['maestro'])) {
		header('location: maestro.html');
		exit();
	}


	$consulta = "select * from cursos";
		$base = new Maestro($consulta);
		$base->ListadoExamenSQL();

	 ?>

	<div class="botones">
		
	
	</div>

</body>
</html>