<!DOCTYPE html>
<html>
<head>
	<title>Escuela On Line</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos/estilo.css">

</head>
<body>
	<header>
			<div class="ancho">
				<nav>
				<ul>
					<li><a href="index.html">Inicio</a></li>
					
					<li><a href="index.html">Cerrar Sesión</a></li>

				</ul>
			</nav>
		</div>

		
	</header>
	<div class="formulario">
		<form action=".php" method="post">
			<p>Registrate</p>
			<p>Nombre: </p>
			<input type="text" name="nombre" maxlength="35" id="nombre" >
			<p>Apellido Paterno:</p>
			<input type="text" name="paterno" maxlength="35" id="paterno">
			<p>Apellido Materno:</p>
			<input type="text" name="materno" maxlength="35" id="materno">
			<p>Correo: </p>
			<input type="mail" name="email" maxlength="35" id="email">
			<p>Contraseña: </p>
			<input type="password" name="password" maxlength="35" id="password">
			<p>Repita su contraseña: </p>
			<input type="password" name="password2" maxlength="35" id="password2"><br><br>
			<input type="submit" name="enviar" onMouseOver="pass();">

			<script type="text/javascript">
				function pass(){
					var name= document.getElementById('nombre').value;
					var paterno= document.getElementById('paterno').value;
					var materno= document.getElementById('materno').value;
					var email= document.getElementById('email').value;			
					var password = document.getElementById('password').value;
					var password2 = document.getElementById('password2').value;
					if (nombre =="" || paterno =="" || materno =="" || email =="" || password =="" || password2 =="") {
						alert('Uno o más campos estan vacios');

					}else if (password != password2) {
						alert('Contraseñas diferentes');
					}
					
				}

			</script>

		</form>		

	</div>



</body>
</html>