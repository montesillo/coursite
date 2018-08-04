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
				<li><a href="registro.html">Registro</a></li>
				<li><a href="index.html">Inicio</a></li>
			</ul>
		</div>
	</header>
	<?php 
		if (!empty($_COOKIE['maestro'])) {
		header('location: maestro.html');
	}
	 ?>

	<div class="botones">
		<li><a  style="color: white" href="NuevoCurso.php">Nuevo Curso</a></li><br>
		<li><a  style="color: white" href="CursosExistentes.php">Curso existente</a></li>
	
	</div>

</body>
</html>