<?php
include ('consultaAlumnos.php');
$consulta = "select nombre from cursos";
$base = new Alumno($consulta);
?>
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
				<li><a href="index.html">Cerrar Sesión</a></li>
			</ul>
		</div>
	</header><br><br><br>
	<h1 style="color: white" align="center">Elige tu Curso</h1><br><br>
	<div class="centraTabla">
      <form action="eleccion.php" method="post">
      	<select name="cur">
      	<?php $base->ListadoSQL(); ?>
      	</select>
      	<input type="submit" name="elegir" value="ELEGIR">
      </form>
	</div>
</body>
</html>