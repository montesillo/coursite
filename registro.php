<?php 
include('consulta.php');
if (isset($_POST['enviar'])) {
	
		$consulta = "insert into alumnos(nombres, a_paterno, a_materno, correo, password) values('$_POST[nombre]', '$_POST[paterno]', '$_POST[materno]', '$_POST[email]', '$_POST[password]')";
		$base = new Acceso($consulta);
		$base->InsertarSQL();
}

 ?>