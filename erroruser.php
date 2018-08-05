<?php
session_start();
	$consulta = "UPDATE alumnos SET intentos = '$_GET[intentos]' WHERE alumnos.correo = '$_SESSION[email]'";
	include('consultaAlumnos.php');

	$base = new Alumno($consulta);
	$base->ErrorPassSQL();
?>