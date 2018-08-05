
<?php
session_start();
$_SESSION['email']= $_POST['email'];
$_SESSION['password']= $_POST['pass'];
$consulta = "select * from maestros where correo= '$_POST[email]'";
include('consultaMaestros.php');
	$base = new Maestro($consulta);
	$base->UsuariosSQL();

?>
