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
	 ?>

	<div class="examen">
	
	<form action="SubirExamen.php" method="post">
			<?php 


			echo "<input type=text name=id value=$_GET[id] style=visibility:hidden>";
			for ($i=1; $i < 11 ; $i++) { 
				echo '<p style=color:white>Pregunta ', $i ,':</p><input type=text name=pre',$i,' id=pre',$i,' size=40><br><br>';

				echo '<p style=color:white>Respuesta correcta:  <textarea name=correcta',$i,' id=correcta',$i,' cols=25 rows=5></textarea>';

				echo 'Respuesta Incorrecta:  <textarea name=error1',$i,' id=error1',$i,' cols=25 rows=5></textarea>';

				echo 'Respuesta Incorrecta:  <textarea name=error2',$i,' id=error2',$i,' cols=25 rows=5></textarea><br><br><br></p>';
				}	
				
			


			 ?>
				
		<input type="submit" value="Subir examen" name="examen" onmouseover="vacio();">
			
	
	</div>

</body>
</html>