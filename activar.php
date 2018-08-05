<?php
session_start();
	$consulta = "UPDATE alumnos SET intentos = 0 WHERE alumnos.correo = '$_SESSION[email]'";
	include('consultaAlumnos.php');
	$base = new Alumno($consulta);
	$base->Activar();
?>