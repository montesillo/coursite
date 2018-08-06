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
	if (!isset($_COOKIE['maestro'])) {
		header('location: maestro.html');
		exit();
	}
	 ?>

	<div class="botones">
		<li><a  style="color: white" href="NuevoCurso.php">Nuevo Curso</a></li><br>
		<li><a  style="color: white" href="CursosExistentes.php">Curso existente</a></li><br>
		<li><a  style="color: white" href="CrearExamen.php">Crear Examen</a></li>
	
	</div>

</body>
</html>