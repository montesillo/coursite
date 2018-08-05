<?php
session_start();
	$consulta = "UPDATE maestros SET intentos = '$_GET[intentos]' WHERE maestros.correo = '$_SESSION[email]'";
	include('consultaMaestros.php');

	$base = new Maestro($consulta);
	$base->ErrorPassSQL();
?>