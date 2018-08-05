<?php 
	include('consultaMaestros.php');
if (isset($_POST['inicio'])) {
	
		$consulta = "insert into cursos(nombre) values('$_POST[curso]')";
		$base = new Maestro($consulta);
		$base->InsertarSQL();
}
if (isset($_POST['url'])) {
	
		$consulta = "insert into explicaciones(url, texto, id_curso) values('$_POST[url]', '$_POST[descript]', $_POST[id])";
		$base = new Maestro($consulta);
		$base->InsertarSQL();
}
 ?>