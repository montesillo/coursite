<?php 
	include('consultaMaestros.php');

for ($i=1; $i < 11; $i++) { 
	$pregunta = 'pre'.$i;
	$correcta = 'correcta'.$i;
	$error1 = 'error1'.$i;
	$error2 = 'error2'.$i;


	$pre = $_POST[$pregunta];
	$rc = $_POST[$correcta];
	$re1 = $_POST[$error1];
	$re2 = $_POST[$error2];
	$id = $_POST['id'];

	$consulta = "insert into examenes(pregunta, rc, re1, re2, id_curso ) values('$pre', '$rc', '$re1', '$re2', '$id')";
		$base = new Maestro($consulta);
		$base->InsertarSQL();
}
 ?>