<?php 
session_start();
if(empty($_POST['mail'] && $_POST['numero'])){
  echo "UNO O MAS CAMPOS ESTAN VACIOS";
}else{
if($_SESSION['numero'] == $_POST['numero']){
	echo "<link rel='stylesheet' type='text/css' href='estilos/estilo.css'>
        <body background='Imagenes/fondo.png'>
        <header>
			<div id='header'>
			<ul class='nav'>
				<li><a href='validarcapcha.html'>Regresar</a></li>
			</ul>
		</div>
	</header><br><br><br><br><br><br>
        <h1 style='color: white' align='center'>NUMERO CORRECTO</h1></body>";
	$_SESSION['mail']= $_POST['mail'];
    $consulta = "select * from alumnos where correo= '$_POST[mail]'";
    include('consultaAlumnos.php');
	$base = new Alumno($consulta);
	$base->ReacUser();
}else{
	echo "<link rel='stylesheet' type='text/css' href='estilos/estilo.css'>
        <body background='Imagenes/fondo.png'>
        <header>
			<div id='header'>
			<ul class='nav'>
				<li><a href='validarcapcha.html'>Regresar</a></li>
			</ul>
		</div>
	</header><br><br><br><br><br><br>
        <h1 style='color: white' align='center'>NUMERO INCORRECTO</h1></body>";
	session_destroy();	
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
	<br>
<form action="validarcapcha.html">
	<input type="submit" value="Regresar">
</form>
</html>