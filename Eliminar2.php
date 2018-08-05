<?php
   $consulta = "select * from cursos where nombre = '$_REQUEST[nombre]'";
   include('consultaMaestros.php');
   $base = new Maestro($consulta);
   $retorno = $base->ConfirmarEliminarSQL();
   if($retorno == '1'){
   	  $consulta = "delete from cursos where nombre = '$_REQUEST[nombre]'";
   	  $base->EliminarSQL($consulta);
   }
?>