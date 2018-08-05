<?php
  include ('consultaAlumnos.php');
  $consulta = "select url, texto from explicaciones, cursos where cursos.id_curso = explicaciones.id_curso and cursos.nombre like '$_POST[cur]'";
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
				<li><a href="index.html">Cerrar Sesion</a></li>
			</ul>
		</div>
	</header><br><br><br>
	<h1 style="color: white" align="center">CURSO DE <?php echo $_POST['cur']; ?></h1>
	<div class="centraTabla">
      <form action="examen.php" method="post">
      	<?php $base->eleccionSQL(); ?><br><br><br>
      	<input type="submit" name="examen" value="REALIZAR EVALUACIÓN">
      </form>
	</div>
</body>
</html>