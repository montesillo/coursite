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

	<div class="botones">
		<form action="resultados.php" method="post">
			<?php 

			include('consultaAlumnos.php');
			
			$consulta = "select * from examenes INNER JOIN cursos ON cursos.nombre='$_POST[id]'";
			$base = new Alumno($consulta);
			$base->ExamenSQL();
		
			
	echo '<br>';
 			?>
 <input type=submit value= aceptar>

	</form>
		
	</div>
</body>
</html>