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

 <input type=submit value= Enviar>

	</form>
		

<?php  
	$r1 = $_POST['1'];
	$r2 = $_POST['2'];
	$r3 = $_POST['3'];
	$r4 = $_POST['4'];
	$r5 = $_POST['5'];
	$r6 = $_POST['6'];
	$r7 = $_POST['7'];
	$r8 = $_POST['8'];
	$r9 = $_POST['9'];
	$r10 = $_POST['10'];

	$resultado = $r1 +$r2 +$r3+$r4+$r5+$r6+$r7+$r8+$r9+$r10;

	if ($resultado > 5) {

	header('location: pdf.php');
	}else{
		echo '<br><br><br><br> Lo sentimos has reprobado';
		echo '<br>¿Quieres volver a intentarlo?';
		echo '<form <input action=examen.php method=POST><input type=submit value=SI></form>';
		echo '<form <input action=index.php><input type=submit value=NO></form>';
	}

?>

	</div>
</body>
</html>
