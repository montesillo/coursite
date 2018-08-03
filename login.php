
<?php
session_start();

$_SESSION['email']= $_POST['email'];
$_SESSION['password']= $_POST['pass'];
$consulta = "select * from alumnos where correo= '$_POST[email]'";
include('consulta.php');
	$base = new Acceso($consulta);
	$base->UsuariosSQL();

?>
