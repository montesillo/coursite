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
				<li><a href="index.html">Cerrar Sesion</a></li>
				<li><a href="inicio.php">Cursos</a></li>
				<li><a href="CrearCurso.php">Regresar</a></li>
			</ul>
		</div>
	</header>
	<?php 
		if (!empty($_COOKIE['maestro'])) {
		header('location: maestro.html');
	}
	 ?>

	<div class="botones">
		<form action="SubirCurso.php" method="post">
			<p style="color: white">Nombre del Curso: </p><input type="text" name="curso" id="curso">	<br><br>
		
			<input type="submit" value="Subir Curso" name="inicio" onmouseover="vacio();">
	
	</div>
	<script type="text/javascript">
				function vacio(){
					var curso = document.getElementById('curso').value;

					if (curso == "" ) {
						alert('Coloca el nombre del curso');
					}
				}
			</script>

</body>
</html>

