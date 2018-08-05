<?php
session_start();
	$consulta = "UPDATE maestros SET intentos = 0 WHERE maestros.correo = '$_SESSION[email]'";
	include('consultaMaestros.php');
	$base = new Maestro($consulta);
	$base->Activar();
?>