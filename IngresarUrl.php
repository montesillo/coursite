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
		
	
	
		$_SESSION['id'] = $_GET['id'];
		
	 ?>

	<div class="botones">
		<form action="SubirCurso.php" method="post">
			<?php echo "<input type=text name=id value=$_GET[id] style=visibility:hidden>"; ?>
			<p style="color: white">Url: </p><input type="text" name="url" id="url">	<br><br>

			<p style="color: white">Descripción: </p><textarea name="descript" id="descript" cols="40" rows="5"></textarea>	<br><br>
			<input type="submit" value="Subir Curso" name="subir" onmouseover="vacio();">
	
	</div>
	<script type="text/javascript">
				function vacio(){
					var subir = document.getElementById('url').value;
					var descript = document.getElementById('descript').value;
					if (subir == "" || descript == "") {
						alert('Uno o más campos estan vacios');
					}
				}
			</script>

</body>
</html>

