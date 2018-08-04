<?php 
	include('consultaMaestros.php');
if (isset($_POST['inicio'])) {
	
		$consulta = "insert into cursos(nombre) values('$_POST[curso]')";
		$base = new Maestro($consulta);
		$base->InsertarSQL();
}

 ?>